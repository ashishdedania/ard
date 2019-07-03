<?php

namespace App\Http\Controllers\Backend\SubStoneCollection;

use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\SubStoneCollection\SubStoneCollection;
use App\Repositories\Backend\SubStoneCollection\SubStoneCollectionRepository;
use Illuminate\Http\Request;
use DB;


/**
 * StonecollectionController
 */

class SubStonecollectionController extends Controller {

	/**
	 * variable to store the repository object
	 * @var StoneCollectionRepository
	 */
	protected $repository;


	/**
	 * contructor to initialize repository object
	 * @param StoneCollectionRepository $repository;
	 */
	public function __construct(SubStoneCollectionRepository $repository) {
		$this->repository       = $repository;
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param   Request  $request
	 * @return \App\Http\Responses\ViewResponse
	 */
	public function index(Request $request) {
		
		return new ViewResponse('backend.substonecollection.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  Request  $request
	 * @return \App\Http\Responses\Backend\KnowledgeBase\CreateResponse
	 */
	public function create() {
		$collections = DB::table('stone_collection')->pluck('title', 'id');
		return view('backend.substonecollection.create',compact('collections'));
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
			'image1' => 'required',
			'slug_id' => 'required'
			
		];
		$message = [
			'title.required'       => 'The Title filed is required.',
			'description.required' => 'The Description field is required.',
			'image1.required' => 'The Image-1 field is required.',
			'slug_id.required' => 'The SEO Id field is required.',
			
		];
		$this->validate($request, $rules, $message);
		

		//Input received from the request
		$input = $request->except(['_token']);
		//Create the model using repository create method
		$this->repository->create($request);
		//return with successfull message
		return new RedirectResponse(route('admin.substonecollection.index'), ['flash_success' => 'Sub Stone Collection created']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  $id
	 * @param   Request  $request
	 * @return \App\Http\Responses\Backend\KnowledgeBase\EditResponse
	 */
	public function edit($id) {
		$stonecollection = SubStoneCollection::where('id', $id)->first();
		$collections = DB::table('stone_collection')->pluck('title', 'id');
		return view('backend.substonecollection.edit', ['stonecollection' => $stonecollection,'collections' => $collections]);
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
			'slug_id' => 'required'
			
		];
		$message = [
			'title.required'       => 'The Title filed is required.',
			'description.required' => 'The Description field is required.',
			'slug_id.required' => 'The SEO Id field is required.',
			
		];
		$this->validate($request, $rules, $message);
		//Update the model using repository update method
		$this->repository->update($id, $request);
		//return with successfull message
		return new RedirectResponse(route('admin.substonecollection.index'), ['flash_success' => 'Sub Stone Collection updated']);
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
		return new RedirectResponse(route('admin.substonecollection.index'), ['flash_success' => trans('Sub Stone Collection Deleted')]);
	}
}
