<?php

namespace App\Http\Controllers\Backend\KnowledgeBase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\KnowledgeBase\CreateKnowledgebaseRequest;
use App\Http\Requests\Backend\KnowledgeBase\DeleteKnowledgebaseRequest;
use App\Http\Requests\Backend\KnowledgeBase\EditKnowledgebaseRequest;
use App\Http\Requests\Backend\KnowledgeBase\ManageKnowledgebaseRequest;
use App\Http\Requests\Backend\KnowledgeBase\SendKnowledgebaseRequest;
use App\Http\Requests\Backend\KnowledgeBase\StoreKnowledgebaseRequest;
use App\Http\Requests\Backend\KnowledgeBase\UpdateKnowledgebaseRequest;
use App\Http\Responses\Backend\KnowledgeBase\CreateResponse;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Clientknowledgebase\Clientknowledgebase;
use App\Models\Client\Client;
use App\Models\ClinicalService\Clinicalservice;
use App\Models\KnowledgeBase\Knowledgebase;
use App\Models\PsycologicalConditionType\Psycologicalconditiontype;
use App\Repositories\Backend\Client\ClientRepository;
use App\Repositories\Backend\KnowledgeBase\KnowledgebaseRepository;
use Illuminate\Support\Facades\Storage;

/**
 * KnowledgebasesController
 */

class KnowledgebasesController extends Controller {

	/**
	 * variable to store the repository object
	 * @var KnowledgebaseRepository
	 */
	protected $repository;
	protected $clientRepository;

	/**
	 * contructor to initialize repository object
	 * @param KnowledgebaseRepository $repository;
	 */
	public function __construct(KnowledgebaseRepository $repository, ClientRepository $clientRepository) {
		$this->repository       = $repository;
		$this->clientRepository = $clientRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  App\Http\Requests\Backend\KnowledgeBase\ManageKnowledgebaseRequest  $request
	 * @return \App\Http\Responses\ViewResponse
	 */
	public function index(ManageKnowledgebaseRequest $request) {
		/* Front End client wise knowledgebase. */
		if (access()->user()->roles()->first()->id == env('CLIENT_ROLE_ID')) {
			$knowledgebase = $this->repository->getClientKnowledgeBase();
			return view('backend.knowledgebases.app.index', compact('knowledgebase'));
		}
		return new ViewResponse('backend.knowledgebases.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  CreateKnowledgebaseRequestNamespace  $request
	 * @return \App\Http\Responses\Backend\KnowledgeBase\CreateResponse
	 */
	public function create(CreateKnowledgebaseRequest $request) {
		return new CreateResponse('backend.knowledgebases.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  StoreKnowledgebaseRequestNamespace  $request
	 * @return \App\Http\Responses\RedirectResponse
	 */
	public function store(StoreKnowledgebaseRequest $request) {
		//Input received from the request
		$input = $request->except(['_token']);
		//Create the model using repository create method
		$this->repository->create($input);
		//return with successfull message
		return new RedirectResponse(route('admin.knowledgebases.index'), ['flash_success' => trans('alerts.backend.knowledgebases.created')]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  App\Models\KnowledgeBase\Knowledgebase  $knowledgebase
	 * @param  EditKnowledgebaseRequestNamespace  $request
	 * @return \App\Http\Responses\Backend\KnowledgeBase\EditResponse
	 */
	public function edit(Knowledgebase $knowledgebase, EditKnowledgebaseRequest $request) {
		return view('backend.knowledgebases.edit', compact('knowledgebase'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  UpdateKnowledgebaseRequestNamespace  $request
	 * @param  App\Models\KnowledgeBase\Knowledgebase  $knowledgebase
	 * @return \App\Http\Responses\RedirectResponse
	 */
	public function update(UpdateKnowledgebaseRequest $request, Knowledgebase $knowledgebase) {
		//Input received from the request
		$input = $request->except(['_token']);
		if ($knowledgebase['file'] != "[]") {
			$rules = [
				'title'       => 'required',
				'description' => 'required',
			];
			$message = [
				'title.required'       => 'The Title filed is required.',
				'description.required' => 'The Description field is required.',
			];
		} else {
			$rules = [
				'title'       => 'required',
				'description' => 'required',
				'file.0'      => 'required',
			];
			$message = [
				'title.required'       => 'The Title filed is required.',
				'description.required' => 'The Description field is required.',
				'file.0.required'      => 'The Upload field is required.',
			];
		}
		$this->validate($request, $rules, $message);
		//Update the model using repository update method
		$this->repository->update($knowledgebase, $input);
		//return with successfull message
		return new RedirectResponse(route('admin.knowledgebases.index'), ['flash_success' => trans('alerts.backend.knowledgebases.updated')]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  DeleteKnowledgebaseRequestNamespace  $request
	 * @param  App\Models\KnowledgeBase\Knowledgebase  $knowledgebase
	 * @return \App\Http\Responses\RedirectResponse
	 */
	public function destroy(Knowledgebase $knowledgebase, DeleteKnowledgebaseRequest $request) {
		//Calling the delete method on repository
		$this->repository->delete($knowledgebase);
		//returning with successfull message
		return new RedirectResponse(route('admin.knowledgebases.index'), ['flash_success' => trans('alerts.backend.knowledgebases.deleted')]);
	}

	/**
	 *
	 * Download files.
	 * @param $path.
	 * @return \App\Http\Responses\RedirectResponse.
	 */
	public function DownloadFiles($id, $fileName) {

		$path    = 'public/Knowledgebase/'.$id.'/'.$fileName;
		$headers = array(
			'Content-type'        => 'application/force-download',
			'Content-Disposition' => 'attachment; filename='.$fileName,
		);
		return \Storage::download($path, $fileName, $headers);
	}

	/**
	 *
	 * Knowledgebase send to customer
	 * @param $id.
	 * @return $result.
	 */
	public function sendKnowledgebase($id, ManageKnowledgebaseRequest $request) {
		$knowledgebases       = Knowledgebase::find($id);
		$clientknowledgebases = \DB::table(config('module.client_knowledge.table'))->where('knowledge_bases_id', $id)->get()->toArray();
		//check assing client knowledgebase.
		$clientId     = array_column($clientknowledgebases, 'client_id');
		$assingClient = Client::with('users')->where('status', 1)->whereIn('id', $clientId)->get()->toArray();
		// if (!empty($clientknowledgebases)) {
		// 	$client = Client::with('users')->where('status', 1)->whereNotIn('id', $clientId)->get()->toArray();
		// } else {
		// 	$client = Client::with('users')->where('status', 1)->get()->toArray();
		// }
		$client = Client::with('users')->where('status', 1)->get()->toArray();
		//clinical service wise client.
		$clinicalService = Clinicalservice::select('id', 'name', 'status')->get()->toArray();
		//psychological type wise client.
		$psychologicalType = Psycologicalconditiontype::select('id', 'name', 'status')->get()->toArray();
		return view('backend.knowledgebases.send', compact('knowledgebases', 'client', 'assingClient', 'clinicalService', 'psychologicalType'));
	}
	/**
	 *
	 * service client.
	 * @param $request.
	 */
	public function serviceClient(ManageKnowledgebaseRequest $request) {
		//knowledgebase with client.
		$clientknowledgebases = \DB::table(config('module.client_knowledge.table'))->where('knowledge_bases_id', $request['knowledge_bases_id'])->get()->toArray();
		$clientId             = array_column($clientknowledgebases, 'client_id');
		if ($request['client']) {
			if (!empty($clientknowledgebases)) {
				$client = Client::with('users')->whereNotIn('id', $clientId)->where('status', 1)->get()->toArray();
			} else {
				$client = Client::with('users')->where('status', 1)->get()->toArray();
			}
			return response()->json($client);
		}
		//clinical service based on client
		if ($request['clinical_service']) {
			$clientGet = \DB::table(config('module.clinicalservices_details.table'))->where('clinical_service_id', $request['clinicalServiceId'])->whereNotIn('client_id', $clientId)->get()->toArray();
			$clientId  = array_column($clientGet, 'client_id');
			if (!empty($clientknowledgebases)) {
				$clientData = Client::with('users')->where('status', 1)->whereIn('id', $clientId)->get()->toArray();
			} else {
				$clientData = Client::with('users')->where('status', 1)->get()->toArray();
			}
		}
		//psychological service based on client
		if ($request['psychological_service']) {
			if (!empty($clientknowledgebases)) {
				$clientData = Client::with('users')->whereNotIn('id', $clientId)
				                                   ->whereRaw("find_in_set(".$request['psychologicalId'].",psycological_types_id)")
				                                   ->get()
				                                   ->toArray();
			} else {
				$clientData = Client::with('users')
					->whereRaw("find_in_set(".$request['psychologicalId'].",psycological_types_id)")
					->get()	->toArray();
			}
		}
		return response()->json($clientData);
	}

	/**
	 *
	 * send Knowledgebase for customer
	 * @param $id.
	 * @param $request.
	 * @return $result.
	 */
	public function sendCustomer($id, SendKnowledgebaseRequest $request) {
		$input             = $request->except('_token', '_method');
		$sendKnowledgebase = $this->repository->sendKnowledgeBase($input, $id);
		return new RedirectResponse(route('admin.knowledgebases.index'), ['flash_success' => trans('labels.backend.knowledgebases.send_msg')]);
	}

	/**
	 *
	 * customer wise ratings
	 * @param $request.
	 * @return $response.
	 */
	public function customerRatings(ManageKnowledgebaseRequest $request) {
		$id   = $request['knowledgebaseId'];
		$data = Knowledgebase::where('knowledge_bases.id', $id)
			->leftjoin("client_knowledge", "knowledge_bases.id", "=", "client_knowledge.knowledge_bases_id")
			->leftjoin("clients", "client_knowledge.client_id", "=", "clients.id")
			->leftjoin("users", "clients.user_id", "=", "users.id")
			->select(
			"knowledge_bases.id as knowledgebasesId", "client_knowledge.knowledge_bases_id as clientKnowledgeBaseId", "client_knowledge.ratings", "clients.id as clientId", "clients.user_id", "users.id as UserId", "users.first_name", "users.last_name"
		)	->get()	->toArray();
		$returnHTML = view('backend.knowledgebases.customermodal')
			->with(['clientDetails' => $data])
			->render();
		return response()->json(array($returnHTML));
	}

	/**
	 *
	 * Front-End Attachment knowledgebase.
	 * @param $request.
	 */
	public function attachments(ManageKnowledgebaseRequest $request) {

		$attachments = Knowledgebase::where('id', $request['knowledgebaseId'])->first();
		$type        = 'frontEnd';
		$returnHTML  = view('backend.knowledgebases.files')
			->with(['knowledgebase' => $attachments, 'type' => $type])
			->render();

		return response()->json(array($returnHTML));
	}

	/**
	 *
	 * update Front-End rating by customer.
	 * @param $request.
	 * @return $response.
	 */
	public function updateRatings(ManageKnowledgebaseRequest $request) {

		$ratings = $request['ratingVal'][0];
		if (!empty($ratings)) {
			$updateRatings = Clientknowledgebase::where('id', $request['id'])->update(['ratings' => $ratings]);
			$ratings       = Clientknowledgebase::where('id', $request['id'])->first();
			/* count average rating of particular knowledge base. */
			$ratingsArr       = Clientknowledgebase::where('knowledge_bases_id', $ratings['knowledge_bases_id'])->get()->toArray();
			$ratinsVal        = array_column($ratingsArr, 'ratings');
			$total            = array_sum(array_filter($ratinsVal));
			$avgRate          = $total/count(array_filter($ratinsVal));
			$updateAvgRatings = Knowledgebase::where('id', $ratings['knowledge_bases_id'])->update(['average_rating' => $avgRate]);
			return response()->json($ratings);
			/* End average rating count of particular knowledge base. */
		}
		return response()->json(true);
	}

	/**
	 *
	 * Delete Attachments Backend
	 * @param $id.
	 * @param $response.
	 */
	public function deleteAttachments(ManageKnowledgebaseRequest $request) {

		$knowledgebaseId = $request['knowId'];
		$files           = $request['files'];
		$path            = 'public/Knowledgebase/'.$knowledgebaseId.'/'.$files;
		$deleteFiles     = Storage::delete($path);
		$dbDel           = Knowledgebase::where('id', $knowledgebaseId)->first();
		$filesArr        = json_decode($dbDel['file'], true);
		$results         = array_filter($filesArr, function ($people) use ($files) {
				return $people == $files;
			});
		$keys = array_keys($results);
		unset($filesArr[$keys[0]]);
		$updateFiles = Knowledgebase::where('id', $knowledgebaseId)->update(['file' => json_encode($filesArr)]);
		$attachments = Knowledgebase::where('id', $knowledgebaseId)->first();
		$returnHTML  = view('backend.knowledgebases.files')
			->with(['knowledgebase' => $attachments])
			->render();
		return response()->json(array($returnHTML));
	}

}
