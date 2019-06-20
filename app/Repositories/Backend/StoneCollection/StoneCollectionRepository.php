<?php

namespace App\Repositories\Backend\StoneCollection;

use App\Exceptions\GeneralException;
use App\Models\StoneCollection\StoneCollection;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use File;
use DB;

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
				config('module.stonecollection.table').'.image1',
				
				config('module.stonecollection.table').'.created_at',
				config('module.stonecollection.table').'.created_by',
				config('module.stonecollection.table').'.updated_at',
				
			])->orderBy('id', 'desc');
	}

	

	/**
	 * For Creating the respective model in storage
	 *
	 * @param array $input
	 * @throws GeneralException
	 * @return bool
	 */
	public function create($request) {

		

		$input  = $request->except(['_token']);
		$image1 = $request->file('image1');
		$image2 = $request->file('image2');
		$image3 = $request->file('image3');
		$image4 = $request->file('image4');

		$stonecollection              = self::MODEL;
		$stonecollection              = new $stonecollection();
		$stonecollection->title       = $input['title'];
		$stonecollection->description       = $input['description'];


		$stonecollection->meta_title   = $input['meta_title'];
		$stonecollection->meta_description   = $input['meta_description'];
		
		$stonecollection->created_by  = access()->user()->id;
		
		if ($stonecollection->save()) {
			$stonecollectionId = $stonecollection->id;


			if (!empty($image4)) {
				$filesNames = $this->fileUpload($image4, $stonecollectionId);
				//update filepath from datatabe.
				SubStoneCollection::where('id', $stonecollectionId)->update(['image4' => $filesNames]);
			}
			


			if(isset($input['del_image1'])) // if delete come then only delete
			{
				

			}
			else
			{

				if (!empty($image1)) {
					$filesNames = $this->fileUpload($image1, $stonecollectionId);
					//update filepath from datatabe.
					StoneCollection::where('id', $stonecollectionId)->update(['image1' => $filesNames]);
				}
			}


			if(isset($input['del_image2'])) // if delete come then only delete
			{
				

			}
			else
			{

				if (!empty($image2)) {
					$filesNames = $this->fileUpload($image2, $stonecollectionId);
					//update filepath from datatabe.
					StoneCollection::where('id', $stonecollectionId)->update(['image2' => $filesNames]);
				}
			}



			if(isset($input['del_image3'])) // if delete come then only delete
			{
				

			}
			else
			{

				if (!empty($image3)) {
					$filesNames = $this->fileUpload($image3, $stonecollectionId);
					//update filepath from datatabe.
					StoneCollection::where('id', $stonecollectionId)->update(['image3' => $filesNames]);
				}
			}

			

			

			


		}
		return true;
		// throw new GeneralException(trans('exceptions.backend.knowledgebases.create_error'));
	}



	public function fileUpload($image,$id)
    {
               
        $input['imagename'] = mt_rand(1,99999).time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);


        return $input['imagename'];
    }


	/**
	 * For updating the respective Model in storage
	 *
	 * @param $id
	 * @param  $request
	 * @throws GeneralException
	 * return bool
	 */
	public function update($id, $request) {

		$stonecollection = StoneCollection::where('id', $id)->first();

		$input = $request->except(['_token']); 



		$image4 = $request->file('image4');

		if (!empty($image4)) {

			$filesNames = $this->fileUpload($image4, $stonecollection->id);
			//update filepath from datatabe.
			$input['image4'] = $filesNames;
			$this->removeImage($stonecollection->image4);

		}


		$image1 = $request->file('image1');


		if(isset($input['del_image1'])) // if delete come then only delete
		{
			$input['image1'] = '';
			$this->removeImage($stonecollection->image1);
			unset($input['del_image1']);
		}
		else
		{

			if (!empty($image1)) {

				$filesNames = $this->fileUpload($image1, $stonecollection->id);
				//update filepath from datatabe.
				$input['image1'] = $filesNames;
				$this->removeImage($stonecollection->image1);

			}
		}






		

		$image2 = $request->file('image2');


		if(isset($input['del_image2'])) // if delete come then only delete
		{
			$input['image2'] = '';
			$this->removeImage($stonecollection->image2);unset($input['del_image2']);
		}
		else
		{
			if (!empty($image2)) {

				$filesNames = $this->fileUpload($image2, $stonecollection->id);
				//update filepath from datatabe.
				$input['image2'] = $filesNames;
				$this->removeImage($stonecollection->image2);

			}

		}


		

		$image3 = $request->file('image3');

		if(isset($input['del_image3'])) // if delete come then only delete
		{
			$input['image3'] = '';
			$this->removeImage($stonecollection->image3);unset($input['del_image3']);
		}
		else
		{
		
			if (!empty($image3)) {

				$filesNames = $this->fileUpload($image3, $stonecollection->id);
				//update filepath from datatabe.
				$input['image3'] = $filesNames;
				$this->removeImage($stonecollection->image3);

			}
		}


		

		//update records.
		if ($stonecollection->update($input)) {
			return true;
		}

		throw new GeneralException(trans('error in stone collection update'));
	}

	/**
	 * For deleting the respective model from storage
	 *
	 * @param $id
	 * @throws GeneralException
	 * @return bool
	 */
	public function delete($id) {

		$child = DB::table('sub_stone_collection')->where('collection_id', $id)->count();

		if($child > 0)
		{
			throw new GeneralException(trans("can not delete record it's child exist"));
			return false ;

		}


		$child = DB::table('stone_product')->where('collection_id', $id)->count();

		if($child > 0)
		{
			throw new GeneralException(trans("can not delete record it's child exist"));
			return false ;

		}


		$stonecollection = StoneCollection::where('id', $id)->first();
		$this->removeImage($stonecollection->image1);
		$this->removeImage($stonecollection->image2);
		$this->removeImage($stonecollection->image3);
		if ($stonecollection->delete()) {
			return true;
		}

		throw new GeneralException(trans('error in stone collection delete'));
	}

	public function getDetail($id)
	{
		return StoneCollection::where('id', $id)->first();
	}

	
	public function removeImage($image)
	{

		$image_path = public_path("/images/".$image);
		if(File::exists($image_path)) {
		    File::delete($image_path);
		}

		
	}


	/**
	 * For updating the respective Model in storage
	 *
	 * @param $id
	 * @param  $request
	 * @throws GeneralException
	 * return bool
	 */
	public function updateimage($id, $request) {

		$stonecollection = DB::table('stone_collection_image')->where('id', 1)->first();
		
		$input = $request->except(['_token']); 
		
		$image1 = $request->file('image1');


		if(isset($input['del_image1'])) // if delete come then only delete
		{
			
			if($stonecollection->image1){ $input['image1'] = '';
			$this->removeImage($stonecollection->image1);}
			unset($input['del_image1']);
		}
		else
		{
			
			if (!empty($image1)) {

				$filesNames = $this->fileUpload($image1, $stonecollection->id);
				//update filepath from datatabe.
				$input['image1'] = $filesNames;
				$this->removeImage($stonecollection->image1);

			}
		}






		

		$image2 = $request->file('image2');


		if(isset($input['del_image2'])) // if delete come then only delete
		{
			if($stonecollection->image2){ $input['image2'] = '';
			$this->removeImage($stonecollection->image2);}
			unset($input['del_image2']);
		}
		else
		{
			
			if (!empty($image2)) {

				$filesNames = $this->fileUpload($image2, $stonecollection->id);
				//update filepath from datatabe.
				$input['image2'] = $filesNames;
				$this->removeImage($stonecollection->image2);

			}

		}


		

		$image3 = $request->file('image3');

		if(isset($input['del_image3'])) // if delete come then only delete
		{
			if($stonecollection->image3){ $input['image3'] = '';
			$this->removeImage($stonecollection->image3);}
			unset($input['del_image3']);
		}
		else
		{
		
			
			if (!empty($image3)) {

				$filesNames = $this->fileUpload($image3, $stonecollection->id);
				//update filepath from datatabe.
				$input['image3'] = $filesNames;
				$this->removeImage($stonecollection->image3);

			}
		}
		unset($input['_method']);

		if(count($input) == 0)
		{
			return true;

		} 
		$response = DB::table('stone_collection_image')->where('id', 1)->update($input);

		//update records.
		if ($response) {
			return true;
		}

		throw new GeneralException(trans('error in stone collection image update'));
	}




	/**
	 * For updating the respective Model in storage
	 *
	 * @param $id
	 * @param  $request
	 * @throws GeneralException
	 * return bool
	 */
	public function updateimageindoor($id, $request) {

		$stonecollection = DB::table('indoor_collection_image')->where('id', 1)->first();
		
		$input = $request->except(['_token']); 
		
		$image1 = $request->file('image1');


		if(isset($input['del_image1'])) // if delete come then only delete
		{
			
			if($stonecollection->image1){ $input['image1'] = '';
			$this->removeImage($stonecollection->image1);}
			unset($input['del_image1']);
		}
		else
		{
			
			if (!empty($image1)) {

				$filesNames = $this->fileUpload($image1, $stonecollection->id);
				//update filepath from datatabe.
				$input['image1'] = $filesNames;
				$this->removeImage($stonecollection->image1);

			}
		}






		

		$image2 = $request->file('image2');


		if(isset($input['del_image2'])) // if delete come then only delete
		{
			if($stonecollection->image2){ $input['image2'] = '';
			$this->removeImage($stonecollection->image2);}
			unset($input['del_image2']);
		}
		else
		{
			
			if (!empty($image2)) {

				$filesNames = $this->fileUpload($image2, $stonecollection->id);
				//update filepath from datatabe.
				$input['image2'] = $filesNames;
				$this->removeImage($stonecollection->image2);

			}

		}


		

		$image3 = $request->file('image3');

		if(isset($input['del_image3'])) // if delete come then only delete
		{
			if($stonecollection->image3){ $input['image3'] = '';
			$this->removeImage($stonecollection->image3);}
			unset($input['del_image3']);
		}
		else
		{
		
			
			if (!empty($image3)) {

				$filesNames = $this->fileUpload($image3, $stonecollection->id);
				//update filepath from datatabe.
				$input['image3'] = $filesNames;
				$this->removeImage($stonecollection->image3);

			}
		}
		unset($input['_method']);

		if(count($input) == 0)
		{
			return true;

		} 
		  

		$response = DB::table('indoor_collection_image')->where('id', 1)->update($input); 

		//update records.
		if ($response) {
			return true;
		}

		throw new GeneralException(trans('error in stone collection image update'));
	}



	/**
	 * For updating the respective Model in storage
	 *
	 * @param $id
	 * @param  $request
	 * @throws GeneralException
	 * return bool
	 */
	public function updateimageoutdoor($id, $request) {

		$stonecollection = DB::table('outdoor_collection_image')->where('id', 1)->first();
		
		$input = $request->except(['_token']); 
		
		$image1 = $request->file('image1');


		if(isset($input['del_image1'])) // if delete come then only delete
		{
			
			if($stonecollection->image1){ $input['image1'] = '';
			$this->removeImage($stonecollection->image1);}
			unset($input['del_image1']);
		}
		else
		{
			
			if (!empty($image1)) {

				$filesNames = $this->fileUpload($image1, $stonecollection->id);
				//update filepath from datatabe.
				$input['image1'] = $filesNames;
				$this->removeImage($stonecollection->image1);

			}
		}






		

		$image2 = $request->file('image2');


		if(isset($input['del_image2'])) // if delete come then only delete
		{
			if($stonecollection->image2){ $input['image2'] = '';
			$this->removeImage($stonecollection->image2);}
			unset($input['del_image2']);
		}
		else
		{
			
			if (!empty($image2)) {

				$filesNames = $this->fileUpload($image2, $stonecollection->id);
				//update filepath from datatabe.
				$input['image2'] = $filesNames;
				$this->removeImage($stonecollection->image2);

			}

		}


		

		$image3 = $request->file('image3');

		if(isset($input['del_image3'])) // if delete come then only delete
		{
			if($stonecollection->image3){ $input['image3'] = '';
			$this->removeImage($stonecollection->image3);}
			unset($input['del_image3']);
		}
		else
		{
		
			
			if (!empty($image3)) {

				$filesNames = $this->fileUpload($image3, $stonecollection->id);
				//update filepath from datatabe.
				$input['image3'] = $filesNames;
				$this->removeImage($stonecollection->image3);

			}
		}
		unset($input['_method']);

		if(count($input) == 0)
		{
			return true;

		} 
		$response = DB::table('outdoor_collection_image')->where('id', 1)->update($input);

		//update records.
		if ($response) {
			return true;
		}

		throw new GeneralException(trans('error in stone collection image update'));
	}



	/**
	 * For updating the respective Model in storage
	 *
	 * @param $id
	 * @param  $request
	 * @throws GeneralException
	 * return bool
	 */
	public function updategeneralsetting($id, $request) {

		$stonecollection = DB::table('general_setting')->where('id', 1)->first();
		
		$input = $request->except(['_token']); unset($input['_method']);
		
		
 
		$response = DB::table('general_setting')->where('id', 1)->update($input);

		//update records.
		if ($response) {
			return true;
		}

		throw new GeneralException(trans('error in general settings update'));
	}

	public function getData()
	{
		

		return $stonecollections = StoneCollection::all();

		

		
	}

	
}
