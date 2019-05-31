<?php

namespace App\Repositories\Backend\StoneCollection;

use App\Exceptions\GeneralException;
use App\Models\Clientknowledgebase\Clientknowledgebase;
use App\Models\Client\Client;
use App\Models\StoneCollection\StoneCollection;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class KnowledgebaseRepository.
 */

class StoneCollectionRepository extends BaseRepository {

	/**
	 * Associated Repository Model.
	 */
	const MODEL = StoneCollection::class ;

	/**
	 * This method is used by Table Controller
	 * For getting the table data to show in
	 * the grid
	 * @return mixed
	 */
	public function getForDataTable() {
		return $this->query()
		            ->select([
				config('module.stonecollection.table').'.id',
				config('module.stonecollection.table').'.title',
				config('module.stonecollection.table').'.description',
				config('module.stonecollection.table').'.file',
				config('module.stonecollection.table').'.rating',
				config('module.stonecollection.table').'.average_rating',
				config('module.stonecollection.table').'.status',
				config('module.stonecollection.table').'.created_at',
				config('module.stonecollection.table').'.created_by',
				config('module.stonecollection.table').'.updated_at',
				
			]);
	}

	/*public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.email_templates.table').'.id',
                config('module.email_templates.table').'.title',
                config('module.email_templates.table').'.subject',
                config('module.email_templates.table').'.status',
                config('module.email_templates.table').'.created_at',
                config('module.email_templates.table').'.updated_at',
            ]);
    }*/

	/**
	 * For Creating the respective model in storage
	 *
	 * @param array $input
	 * @throws GeneralException
	 * @return bool
	 */
	public function create(array $input) {

		$knowledgebases              = self::MODEL;
		$knowledgebases              = new $knowledgebases();
		$knowledgebases->title       = $input['title'];
		$knowledgebases->description = $input['description'];
		$knowledgebases->status      = isset($input['status'])?$input['status']:0;
		$knowledgebases->created_by  = access()->user()->id;
		if ($knowledgebases->save()) {
			$knowledgebasesId = $knowledgebases->id;
			if (!empty($input['file'])) {
				$filesNames = $this->uploadFiles($input['file'], $knowledgebasesId);
				//update filepath from datatabe.
				StoneCollection::where('id', $knowledgebasesId)->update(['file' => $filesNames]);
			}
		}
		return true;
		// throw new GeneralException(trans('exceptions.backend.knowledgebases.create_error'));
	}

	/**
	 *
	 * upload files.
	 * @param $filepath,$fileObj.
	 */
	public function uploadFiles($fileObj, $knowledgebasesId) {

		foreach ($fileObj as $key => $fileVal) {
			$filesName     = $fileVal->getClientOriginalName();
			$existFileName = $fileVal->getClientOriginalName();
			$path          = 'public/Knowledgebase/'.$knowledgebasesId.'/'.$filesName;
			$existPath     = 'public/Knowledgebase/'.$knowledgebasesId.'/'.$existFileName;
			$move          = Storage::disk('local')->put($path, \File::get($fileVal));
			$filesNames[]  = $filesName;
		}
		return json_encode($filesNames);
	}

	/**
	 * For updating the respective Model in storage
	 *
	 * @param Knowledgebase $knowledgebase
	 * @param  $input
	 * @throws GeneralException
	 * return bool
	 */
	public function update(Knowledgebase $knowledgebase, array $input) {

		//upload files.
		$oldFiles = json_decode($knowledgebase['file'], true);

		if (!empty($input['file'])) {
			$uploadFile    = $this->uploadFiles($input['file'], $knowledgebase['id']);
			$uploadedFiles = json_decode($uploadFile);
			$mergeFiles    = (!empty($oldFiles))?json_encode(array_merge($oldFiles, $uploadedFiles), true):json_encode($uploadedFiles, true);
			$input['file'] = $mergeFiles;
		}
		$input['status'] = isset($input['status'])?$input['status']:0;

		//update records.
		if ($knowledgebase->update($input)) {
			return true;
		}

		throw new GeneralException(trans('exceptions.backend.knowledgebases.update_error'));
	}

	/**
	 * For deleting the respective model from storage
	 *
	 * @param Knowledgebase $knowledgebase
	 * @throws GeneralException
	 * @return bool
	 */
	public function delete(StoneCollection $knowledgebase) { dd($knowledgebase);
		if ($knowledgebase->delete()) {
			return true;
		}

		throw new GeneralException(trans('exceptions.backend.knowledgebases.delete_error'));
	}

	/**
	 *
	 * Send Knowlegebase to Customer.
	 * @param $input.
	 * @param $id.
	 * @return $result.
	 */
	public function sendKnowledgeBase($input, $id) {

		$clientDetails = Client::with('users', 'getknowledgeBase', 'getknowledgeBase.knowledgebase')
			->whereIn(config('module.clients.table').'.id', $input['client'])
			->get()	->toArray();
		$knowledgebase = Knowledgebase::where('id', $id)->first();
		$knowledgeData = [];
		foreach ($clientDetails as $key => $clientData) {
			$clientData['knowledgebase_title'] = $knowledgebase['title'];
			$resourceLink                      = \URL::to('/admin/knowledgebases');
			$clientData['link']                = '<a href='.$resourceLink.'>Click here</a>';
			//Exist check for resend knowledgebase.
			$checkExist = Clientknowledgebase::where('client_id', $clientData['id'])->where('knowledge_bases_id', '=', $id)->exists();

			if ($checkExist == true) {
				$options = [
					'data'                => $clientData,
					'email_template_type' => 10,
				];
				$mailSend = createNotification('', $id, 10, $options);
			}
			if ($checkExist == false) {
				//send emails to customer for send knowledgebase.
				$options = [
					'data'                => $clientData,
					'email_template_type' => 7,
				];
				$mailSend      = createNotification('', $id, 7, $options);
				$knowledgeData = [
					'client_id'          => $clientData['id'],
					'knowledge_bases_id' => $id
				];
				$saveClientKnowledge = \DB::table(config('module.client_knowledge.table'))->insert($knowledgeData);
			}
		}
		return true;
	}

	/**
	 *
	 * Front End Client Knowledgebase.
	 * @return $result.
	 */
	public function getClientKnowledgeBase() {
		$clients          = Client::where('user_id', access()->user()->id)->first();
		$getknowledgebase = Knowledgebase::
		leftjoin(config('module.client_knowledge.table'), config('module.knowledgebases.table').'.id', "=", config('module.client_knowledge.table').'.knowledge_bases_id')
			->leftjoin("clients", config('module.client_knowledge.table').'.client_id', "=", "clients.id")
			->where("clients.id", "=", $clients['id'])
			->where(config('module.knowledgebases.table').'.status', 1)
			->select(
			config('module.knowledgebases.table').'.id as knowledgebaseId',
			config('module.knowledgebases.table').'.title',
			config('module.knowledgebases.table').'.description',
			config('module.knowledgebases.table').'.file',
			config('module.knowledgebases.table').'.average_rating',
			config('module.knowledgebases.table').'.status',
			config('module.client_knowledge.table').'.id as client_knowledge_id',
			config('module.client_knowledge.table').'.client_id',
			config('module.client_knowledge.table').'.ratings'
		)
			->groupBy(config('module.knowledgebases.table').'.id')
			->paginate(8);
		return $getknowledgebase;
	}

}
