<?php

namespace App\Http\Controllers\Backend\IndoorCollectionimage;

use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Backend\StoneCollection\StoneCollectionRepository;
use Illuminate\Http\Request;
use DB;



/**
 * IndoorcollectionController
 */

class IndoorcollectionimageController extends Controller {

	/**
	 * variable to store the repository object
	 * @var StoneCollectionRepository
	 */
	protected $repository;


	/**
	 * contructor to initialize repository object
	 * @param StoneCollectionRepository $repository;
	 */
	public function __construct(StoneCollectionRepository $repository) {
		$this->repository       = $repository;
		
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param   Request  $request
	 * @return \App\Http\Responses\ViewResponse
	 */
	public function index(Request $request) {
		
		
		$stonecollection = DB::table('indoor_collection_image')->where('id', 1)->first(); 

		return view('backend.indoorcollectionimage.edit', compact('stonecollection'));

		
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
		
		/*$rules = [
			
			'image1' => 'required',
			'image2' => 'required',
			'image3' => 'required',
			
		];
		$message = [
			
			'image1.required' => 'The Image-1 field is required.',
			'image2.required' => 'The Image-2 field is required.',
			'image3.required' => 'The Image-3 field is required.',
			
		];
		$this->validate($request, $rules, $message);*/
		//Update the model using repository update method
		$this->repository->updateimageindoor($id, $request);
		//return with successfull message
		return new RedirectResponse(route('admin.indoorcollectionimage.index'), ['flash_success' => 'Data updated']);
	}

	
}
