<?php

namespace App\Repositories\Backend\Client;

use App\Exceptions\GeneralException;
use App\Models\Access\User\User;
use App\Models\Client\Client;
use App\Repositories\BaseRepository;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientRepository.
 */

class ClientRepository extends BaseRepository {

	/**
	 * Associated Repository Model.
	 */
	const MODEL = Client::class ;

	/**
	 * This method is used by Table Controller
	 * For getting the table data to show in
	 * the grid
	 * @return mixed
	 */
	public function getForDataTable() {
		$query = $this->query()
		              ->leftjoin("client_intervention", "clients.id", "=", "client_intervention.client_id")
		              ->leftJoin('interventions_type', function ($join) {
				$join->on('client_intervention.intervention_type', '=', 'interventions_type.id');
			})
			->leftjoin("clinicalservices_details", "clients.id", "=", "clinicalservices_details.client_id")
			->leftJoin('services', function ($join) {
				$join->on('clinicalservices_details.clinical_service_id', '=', 'services.id');
			})
			->leftjoin("managesessions", "clients.id", "=", "managesessions.client_id")

			->leftjoin(config('access.users_table'), config('module.clients.table').'.user_id', '=', config('access.users_table').'.id')
			->leftjoin('users as myuser2', config('module.clients.table').'.created_by', '=', 'myuser2.id')
			->select([
				config('module.clients.table').'.*',
				\DB::raw('group_concat(distinct interventions_type.name separator ", ") AS interventionName'),
				"interventions_type.name",
				\DB::raw('count(managesessions.session_visit) AS session'),
				"managesessions.session_visit",
				config('access.users_table').'.first_name',
				config('access.users_table').'.last_name',
				config('access.users_table').'.email',
				\DB::raw('group_concat(distinct services.name separator ", ") AS services'),
				'myuser2.first_name as createdBy',
			])	->groupBy(config('module.clients.table').'.id');

		return $query;
	}

	/**
	 * For Creating the respective model in storage
	 *
	 * @param array $input
	 * @throws GeneralException
	 * @return bool
	 */
	public function create(array $input) {

		$client = self::MODEL;
		$client = new $client();
		//user save
		$clientSave             = new User();
		$clientSave->first_name = $input['first_name'];
		$clientSave->last_name  = $input['last_name'];
		$clientSave->email      = $input['email'];
		$input['password']      = $this->RandomString();
		$clientSave->password   = bcrypt($input['password']);
		$clientSave->status     = isset($input['status'])?$input['status']:0;
		$clientSave->confirmed  = 1;
		$clientSave->created_by = access()->user()->id;
		$clientSave->save();
		if ($clientSave) {
			//client detail save.
			$client->client_code           = $input['client_code'];
			$client->age                   = $input['age'];
			$client->dob                   = date('Y-m-d', strtotime($input['dob']));
			$client->user_id               = $clientSave->id;
			$client->psycological_types_id = isset($input['psycological_types_id'])?implode(",", $input['psycological_types_id']):NULL;
			$client->status                = isset($input['status'])?$input['status']:0;
			$client->created_by            = access()->user()->id;
			$client->save();

			//intervention_type store
			if (isset($input['intervention_type'])) {
				$interventionData = [];
				foreach ($input['intervention_type'] as $key => $value) {

					$interventionData[] = [
						'client_id'         => $client->id,
						'intervention_type' => $value
					];
				}
				$insertClientInter = \DB::table(config('module.client_intervention.table'))->insert($interventionData);
			}
			//clinical service details store.
			if (isset($input['clinical_service_id'])) {
				$clinicalData = [];
				foreach ($input['clinical_service_id'] as $clinicalId) {
					$clientId       = $client->id;
					$clinicalData[] = [
						'clinical_service_id' => $clinicalId,
						'client_id'           => $clientId,
						'created_by'          => access()->user()->id,
					];
				}
				$clinicalDetail = \DB::table(config('module.clinicalservices_details.table'))->insert($clinicalData);
			}
			//set client permission role.
			$lastUser   = User::orderBy('id', 'desc')->first();
			$user_model = config('auth.providers.users.model');
			$user_model = new $user_model();
			$user_model::find($lastUser['id'])->attachRole(4);
			$permissions = \DB::table('permission_role')->where('role_id', env('CLIENT_ROLE_ID'))->pluck('permission_id');
			foreach ($permissions as $key => $value) {
				//set view backend permission for client.
				$setpermission = \DB::table('permission_user')->insert(['permission_id' => $value, 'user_id' => $lastUser['id']]);
			}
			//send email for password.
			$url                 = \URL::to('/login');
			$input['login_link'] = '<a href='.$url.'>Login</a>';
			$options             = [
				'data'                => $input,
				'email_template_type' => 5,
			];
			createNotification('', $clientSave->id, 5, $options);
		}
		return true;
	}

	/**
	 * For updating the respective Model in storage
	 *
	 * @param Client $client
	 * @param  $input
	 * @throws GeneralException
	 * return bool
	 */
	public function update(Client $client, array $input) {
		// interventions master
		$interventionsType = \DB::table(config('module.interventions_type.table'))->pluck('name', 'id')->toArray();
		//user detail update
		$clientSave = User::where('id', $client->user_id)->update(['first_name' => $input['first_name'], 'last_name' => $input['last_name'], 'email' => $input['email'], 'status' => isset($input['status'])?$input['status']:0]);
		//client detail update
		$clientUpdate = Client::where('id', $client->id)->update(['age' => $input['age'], 'client_code' => $input['client_code'], 'dob' => date('Y-m-d', strtotime($input['dob'])), 'updated_by' => access()->user()->id, 'status' => isset($input['status'])?$input['status']:0, 'psycological_types_id' => isset($input['psycological_types_id'])?implode(",", $input['psycological_types_id']):NULL]);

		// intervention status update
		foreach ($input as $interventionType => $interventionStatus) {
			if (strstr($interventionType, 'intervention_status~')) {
				$interventionId    = str_replace('intervention_status~', '', $interventionType);
				$flagServiceUpdate = \DB::table(config('module.client_intervention.table'))->where('intervention_type', $interventionId)->where('client_id', $client->id)->update(['status' => $interventionStatus]);

				// send mail to client if intervention marked as completed
				if ($interventionStatus == 1 && $flagServiceUpdate) {
					//send email for intervention completion
					$mailData['intervention_service'] = isset($interventionsType[$interventionId])?$interventionsType[$interventionId]:'';
					$mailData['client']               = $input['first_name'];
					$mailData['feedback_link']        = '<a href='.\URL::to('/admin/feedback').'>Click here to submit.</a>';
					$mailData['testimonial_link']     = '<a href='.\URL::to('/admin/testimonials').'>Click here to submit.</a>';
					$mailData['to']                   = $input['email'];
					$options                          = [
						'data'                => $mailData,
						'email_template_type' => 9,
					];
					createNotification('', '', 9, $options);
				}
			}
		}

		/* clinical service update */
		if (isset($input['clinical_service_id'])) {
			$clinicalServiceDel = \DB::table(config('module.clinicalservices_details.table'))->where('client_id', $client->id)->delete();
			foreach ($input['clinical_service_id'] as $key                                                             => $value) {
				$clinicalServiceInsert = \DB::table(config('module.clinicalservices_details.table'))->insert(['client_id' => $client->id, 'clinical_service_id' => $value, 'created_by' => access()->user()->id]);
			}
		} else {
			$clinicalServiceDel = \DB::table(config('module.clinicalservices_details.table'))->where('client_id', $client->id)->delete();
		}
		return true;
	}

	/**
	 * For deleting the respective model from storage
	 *
	 * @param Client $client
	 * @throws GeneralException
	 * @return bool
	 */
	public function delete(Client $client) {
		//user delete
		$delUser = User::where('id', $client->user_id)->update(['deleted_at' => Carbon::now()]);
		//clinicalservices_details delete
		$delClinicalSer = \DB::table(config('module.clinicalservices_details.table'))->where('client_id', $client->id)->delete();
		if ($client->delete()) {
			return true;
		}
		throw new GeneralException(trans('exceptions.backend.clients.delete_error'));
	}

	function RandomString($length = 7) {
		$randstr = "";
		srand((double) microtime(TRUE)*1000000);
		//our array add all letters and numbers if you wish
		$chars = array(
			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p',
			'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5',
			'6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
			'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

		for ($rand = 0; $rand <= $length; $rand++) {
			$random = rand(0, count($chars)-1);
			$randstr .= $chars[$random];
		}
		return $randstr;
	}
}
