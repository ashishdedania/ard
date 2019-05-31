<?php

namespace App\Http\Controllers\Backend\StoneCollection;

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
use App\Repositories\Backend\StoneCollection\StoneCollectionRepository;
use Illuminate\Support\Facades\Storage;

/**
 * StonecollectionController
 */

class StonecollectionController extends Controller {

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
	public function __construct(StoneCollectionRepository $repository, ClientRepository $clientRepository) {
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
		
		return new ViewResponse('backend.stonecollection.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  CreateKnowledgebaseRequestNamespace  $request
	 * @return \App\Http\Responses\Backend\KnowledgeBase\CreateResponse
	 */
	public function create(CreateKnowledgebaseRequest $request) {
		return view('backend.stonecollection.create');
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
		return new RedirectResponse(route('admin.stonecollection.index'), ['flash_success' => trans('alerts.backend.stonecollection.created')]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  App\Models\KnowledgeBase\Knowledgebase  $knowledgebase
	 * @param  EditKnowledgebaseRequestNamespace  $request
	 * @return \App\Http\Responses\Backend\KnowledgeBase\EditResponse
	 */
	public function edit(Knowledgebase $knowledgebase, EditKnowledgebaseRequest $request) {
		return view('backend.stonecollection.edit', compact('knowledgebase'));
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
		return new RedirectResponse(route('admin.stonecollection.index'), ['flash_success' => trans('alerts.backend.stonecollection.updated')]);
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
		return new RedirectResponse(route('admin.stonecollection.index'), ['flash_success' => trans('alerts.backend.stonecollection.deleted')]);
	}
}
