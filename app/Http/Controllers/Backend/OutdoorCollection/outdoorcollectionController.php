<?php

namespace App\Http\Controllers\Backend\OutdoorCollection;

use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\OutdoorCollection\OutdoorCollection;
use App\Repositories\Backend\OutdoorCollection\OutdoorCollectionRepository;
use Illuminate\Http\Request;



/**
 * OutdoorcollectionController
 */

class OutdoorcollectionController extends Controller {

	/**
	 * variable to store the repository object
	 * @var OutdoorCollectionRepository
	 */
	protected $repository;


	/**
	 * contructor to initialize repository object
	 * @param OutdoorCollectionRepository $repository;
	 */
	public function __construct(OutdoorCollectionRepository $repository) {
		$this->repository       = $repository;
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param   Request  $request
	 * @return \App\Http\Responses\ViewResponse
	 */
	public function index(Request $request) {
		
		return new ViewResponse('backend.outdoorcollection.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  Request  $request
	 * @return \App\Http\Responses\Backend\KnowledgeBase\CreateResponse
	 */
	public function create() {

		

        
		return view('backend.outdoorcollection.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param   Request  $request
	 * @return \App\Http\Responses\RedirectResponse
	 */
	public function store(Request $request) {

		$rules = [
			'title'       => 'required',
			'description' => 'required',
			
			
		];
		$message = [
			'title.required'       => 'The Title filed is required.',
			'description.required' => 'The Description field is required.',
			
			
		];
		$this->validate($request, $rules, $message);
		

		//Input received from the request
		$input = $request->except(['_token']);
		//Create the model using repository create method
		$this->repository->create($request);
		//return with successfull message
		return new RedirectResponse(route('admin.outdoorcollection.index'), ['flash_success' => 'Indoor/Outdoor Application created']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  $id
	 * @param   Request  $request
	 * @return \App\Http\Responses\Backend\KnowledgeBase\EditResponse
	 */
	public function edit($id) {
		$stonecollection = OutdoorCollection::where('id', $id)->first();
		return view('backend.outdoorcollection.edit', compact('stonecollection'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  $id
	 * @param  $request
	 * @return \App\Http\Responses\RedirectResponse
	 */
	public function update($id,Request $request) {
		//Input received from the request
		
		$rules = [
			'title'       => 'required',
			'description' => 'required',
			
		];
		$message = [
			'title.required'       => 'The Title filed is required.',
			'description.required' => 'The Description field is required.',
			
		];
		$this->validate($request, $rules, $message);
		//Update the model using repository update method
		$this->repository->update($id, $request);
		//return with successfull message
		return new RedirectResponse(route('admin.outdoorcollection.index'), ['flash_success' => 'Indoor/Outdoor Application updated']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  $id
	 * @param  $request
	 * @return \App\Http\Responses\RedirectResponse
	 */
	public function destroy($id, Request $request) {
		//Calling the delete method on repository
		$this->repository->delete($id);
		//returning with successfull message
		return new RedirectResponse(route('admin.outdoorcollection.index'), ['flash_success' => trans('Indoor/Outdoor Application Deleted')]);
	}
}
