<?php

namespace App\Http\Controllers\Backend\IndoorImages;

use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\IndoorImages\IndoorImages;
use App\Repositories\Backend\IndoorImages\IndoorImagesRepository;
use Illuminate\Http\Request;
use DB;


/**
 * StonecollectionController
 */

class indoorimagesController extends Controller {

	/**
	 * variable to store the repository object
	 * @var StoneCollectionRepository
	 */
	protected $repository;


	/**
	 * contructor to initialize repository object
	 * @param StoneCollectionRepository $repository;
	 */
	public function __construct(IndoorImagesRepository $repository) {
		$this->repository       = $repository;
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param   Request  $request
	 * @return \App\Http\Responses\ViewResponse
	 */
	public function index(Request $request) {
		
		return new ViewResponse('backend.indoorimages.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  Request  $request
	 * @return \App\Http\Responses\Backend\KnowledgeBase\CreateResponse
	 */
	public function create() {
		$collection1 = DB::table('indoor_outdoor')->where('is_indoor',1)->pluck('title', 'id');
		$collections = DB::table('indoor_outdoor')->where('is_indoor',0)->pluck('title', 'id');
		
		return view('backend.indoorimages.create',['collections' => $collections, 'collection1'=>$collection1]);
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
			'sr_no' => 'required',
			
		];
		$message = [
			'title.required'       => 'The Title filed is required.',
			'description.required' => 'The Description field is required.',
			'image1.required' => 'The Image-1 field is required.',
			'sr_no.required' => 'The Order No field is required.',
			
		];
		$this->validate($request, $rules, $message);
		

		//Input received from the request
		$input = $request->except(['_token']);
		//Create the model using repository create method
		$this->repository->create($request);
		//return with successfull message
		return new RedirectResponse(route('admin.indoorimages.index'), ['flash_success' => 'image created']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  $id
	 * @param   Request  $request
	 * @return \App\Http\Responses\Backend\KnowledgeBase\EditResponse
	 */
	public function edit($id) {
		$stonecollection = IndoorImages::where('id', $id)->first();
		

$collection1 = DB::table('indoor_outdoor')->where('is_indoor',1)->pluck('title', 'id');
		$collections = DB::table('indoor_outdoor')->where('is_indoor',0)->pluck('title', 'id');


		return view('backend.indoorimages.edit', ['stonecollection' => $stonecollection,'collections' => $collections,'collection1' => $collection1]);
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
			'image1' => 'required',
			'sr_no' => 'required',
			
		];
		$message = [
			'title.required'       => 'The Title filed is required.',
			'description.required' => 'The Description field is required.',
			'image1.required' => 'The Image-1 field is required.',
			'sr_no.required' => 'The Order No field is required.',
			
		];
		$this->validate($request, $rules, $message);
		//Update the model using repository update method
		$this->repository->update($id, $request);
		//return with successfull message
		return new RedirectResponse(route('admin.indoorimages.index'), ['flash_success' => 'image updated']);
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
		return new RedirectResponse(route('admin.indoorimages.index'), ['flash_success' => trans('image Deleted')]);
	}
}
