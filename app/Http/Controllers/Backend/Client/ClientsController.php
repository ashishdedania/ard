<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Client\CreateClientRequest;
use App\Http\Requests\Backend\Client\DeleteClientRequest;
use App\Http\Requests\Backend\Client\EditClientRequest;
use App\Http\Requests\Backend\Client\ManageClientRequest;
use App\Http\Requests\Backend\Client\StoreClientRequest;
use App\Http\Requests\Backend\Client\UpdateClientRequest;
use App\Models\Access\User\User;
use App\Models\Client\Client;
use App\Models\ClinicalDetail\ClinicalDetail;
use App\Models\ClinicalService\Clinicalservice;
use App\Models\CustomQuestion\CustomQuestion;
use App\Models\InterventionType\InterventionType;
use App\Models\PsycologicalConditionType\Psycologicalconditiontype;
use App\Repositories\Backend\Client\ClientRepository;
use Illuminate\Http\Request;

/**
 * ClientsController
 */

class ClientsController extends Controller {

	/**
	 * variable to store the repository object
	 * @var ClientRepository
	 */
	protected $repository;

	/**
	 * contructor to initialize repository object
	 * @param ClientRepository $repository;
	 */
	public function __construct(ClientRepository $repository) {
		$this->repository = $repository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  App\Http\Requests\Backend\Client\ManageClientRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(ManageClientRequest $request) {
		return view('backend.clients.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  CreateClientRequestNamespace  $request
	 * @return \Illuminate\Http\Response
	 */
	public function create(CreateClientRequest $request) {
		$psycologicalData  = Psycologicalconditiontype::select('id', 'name', 'status')->get()->toArray();
		$clinicalService   = Clinicalservice::select('id', 'name', 'status')->get()->toArray();
		$interventionsType = InterventionType::select('name', 'id', 'status')->get()->toArray();
		return view('backend.clients.create', compact('psycologicalData', 'clinicalService', 'interventionsType'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  StoreClientRequestNamespace  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreClientRequest $request) {
		//Input received from the request
		$input = $request->except(['_token']);
		//Create the model using repository create method
		$this->repository->create($input);
		//return with successfull message
		return redirect()->route('admin.clients.index')->withFlashSuccess(trans('alerts.backend.clients.created'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  App\Models\Client\Client  $client
	 * @param  EditClientRequestNamespace  $request
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Client $client, EditClientRequest $request) {

		$getUser           = User::where('id', '=', $client->user_id)->first();
		$psycologicalData  = Psycologicalconditiontype::select('id', 'name', 'status')->get()->toArray();
		$clientData        = ClinicalDetail::where('client_id', $client->id)->pluck('clinical_service_id')->toArray();
		$clinicalService   = Clinicalservice::select('id', 'name', 'status')->get()->toArray();
		$psycologicalId    = isset($client)?explode(",", $client->psycological_types_id):0;
		$interventionsType = \DB::table(config('module.interventions_type.table'))->pluck('name', 'id');

		$clientIntervention = \DB::table(config('module.client_intervention.table'))->where('client_id', $client->id)->get()->toArray();

		return view('backend.clients.edit', compact('client', 'clientData', 'getUser', 'psycologicalData', 'clinicalService', 'psycologicalId', 'interventionsType', 'clientIntervention'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  UpdateClientRequestNamespace  $request
	 * @param  App\Models\Client\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateClientRequest $request, Client $client) {
		//Input received from the request
		$input = $request->except(['_token']);
		//Update the model using repository update method
		$this->repository->update($client, $input);
		//return with successfull message
		return redirect()->route('admin.clients.index')->withFlashSuccess(trans('alerts.backend.clients.updated'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  DeleteClientRequestNamespace  $request
	 * @param  App\Models\Client\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Client $client, DeleteClientRequest $request) {
		//Calling the delete method on repository
		$this->repository->delete($client);
		//returning with successfull message
		return redirect()->route('admin.clients.index')->withFlashSuccess(trans('alerts.backend.clients.deleted'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  App\Models\Client\Client  $client
	 * @param  EditClientRequestNamespace  $request
	 * @return \Illuminate\Http\Response
	 */
	public function addCustomQuestion(Client $client, Request $request) {
		$customquestion = \DB::table(config('module.custom_question.table'))->where('client_id', $client->id)->get()->toArray();
		$question       = $client->subjectiveQuestion;
		return view('backend.clients.customquestion', compact('client', 'customquestion', 'question'));
	}

	/**
	 * Show the form for save question the specified resource.
	 *
	 * @param  App\Models\Client\Client  $client
	 * @param  Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function storeQuestion(Request $request, Client $clients) {
		/* When client submit subjective questions request */
		if (getRoles()->id == env("CLIENT_ROLE_ID")) {
			$input    = $request->all();
			$queId    = array_column($clients->subjectiveQuestion->toArray(), 'id');
			$isSubmit = 1;
		} else {
			$input    = $request->except(['_token', '_method']);
			$queId    = array_filter($input['queId']);
			$isSubmit = NULL;
		}
		$input['question_name'] = array_filter(($input['question_name']));
		foreach ($input['question_name'] as $key => $question) {
			if (isset($queId[$key])) {
				if (getRoles()->id == env("CLIENT_ROLE_ID")) {
					$checkExist  = CustomQuestion::where('id', $queId[$key])->where('is_submited_by', 1)->exists();
					$addQuestion = CustomQuestion::where('id', $queId[$key])->where('is_submited_by', '!=', NULL)->update([
							'client_id'      => $clients->id,
							'question_name'  => $question,
							'is_submited_by' => $isSubmit,
							'created_by'     => access()->user()->id
						]);
				} else {
					$checkExist = CustomQuestion::where('id', $queId[$key])->where('is_submited_by', 1)->exists();
					if ($checkExist) {
						$isSubmit = 1;
					} else {
						$isSubmit = NULL;
					}
					$addQuestion = CustomQuestion::where('id', $queId[$key])->update([
							'client_id'      => $clients->id,
							'question_name'  => $question,
							'is_submited_by' => $isSubmit,
							'created_by'     => access()->user()->id
						]);

				}

			} else {
				$addQuestion = CustomQuestion::insert([
						'client_id'      => $clients->id,
						'question_name'  => $question,
						'is_submited_by' => $isSubmit,
						'created_by'     => access()->user()->id
					]);
			}
		}
		/* When client submit subjective questions redirect with other location methods */
		if (getRoles()    ->id != env("CLIENT_ROLE_ID")) {
			return redirect()->route('admin.clients.index')->withFlashSuccess('The Questions was successfully added.');
		} else {
			$customquestion = \DB::table(config('module.custom_question.table'))->select('question_name')->where('client_id', $clients->id)->get()->toArray();
			//Send Mail
			$getClient = $clients::with('users')->where('id', $clients->id)->first();
			$url       = \URL::to('admin/clients/custom/question/'.$getClient['id']);
			$dataArr   = [
				'client_id' => $getClient['client_code'],
				'link'      => '<a href='.$url.'>Click here</a>'
			];
			$options = [
				'data'                => $dataArr,
				'email_template_type' => 11,
			];
			$sendMail = createNotification('', $getClient['id'], 11, $options);
			return response()->json($customquestion);
		}
	}
}
