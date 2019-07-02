<?php

namespace App\Repositories\Backend\OutdoorCollection;

use App\Exceptions\GeneralException;
use App\Models\OutdoorCollection\OutdoorCollection;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use File;
use DB;

/**
 * Class KnowledgebaseRepository.
 */

class OutdoorCollectionRepository extends BaseRepository {

	/**
	 * Associated Repository Model.
	 */
	const MODEL = OutdoorCollection::class ;

	/**
	 * This method is used by Table Controller
	 * For getting the table data to show in
	 * the grid
	 * @return mixed
	 */
	public function getForDataTable() {
		return $this->query()
		            ->select([
				config('module.outdoorcollection.table').'.id',
				config('module.outdoorcollection.table').'.title',
				config('module.outdoorcollection.table').'.description',
				config('module.outdoorcollection.table').'.is_indoor',
				\DB::raw('IF(is_indoor = 1, "indoor","outdoor") as type'),
				config('module.outdoorcollection.table').'.created_at',
				config('module.outdoorcollection.table').'.created_by',
				config('module.outdoorcollection.table').'.updated_at',
				
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

		

		$input = $request->except(['_token']);
		$image1 = $request->file('image1');
		$image2 = $request->file('image2');
		$image3 = $request->file('image3');

		$stonecollection              = self::MODEL;
		$stonecollection              = new $stonecollection();
		$stonecollection->title       = $input['title'];
		$stonecollection->description = $input['description'];
		$stonecollection->is_indoor   = $input['is_indoor'];

		$stonecollection->meta_title   = $input['meta_title'];
		$stonecollection->meta_description   = $input['meta_description'];



		$stonecollection->image_alt_text   = $input['image_alt_text'];
		$stonecollection->image_title_text   = $input['image_title_text'];


		$stonecollection->created_by  = access()->user()->id;
		
		if ($stonecollection->save()) {
			$stonecollectionId = $stonecollection->id;
			


			if (!empty($image1)) {
				$filesNames = $this->fileUpload($image1, $stonecollectionId);
				//update filepath from datatabe.
				OutdoorCollection::where('id', $stonecollectionId)->update(['image1' => $filesNames]);
			}

			if (!empty($image2)) {
				$filesNames = $this->fileUpload($image2, $stonecollectionId);
				//update filepath from datatabe.
				OutdoorCollection::where('id', $stonecollectionId)->update(['image2' => $filesNames]);
			}

			if (!empty($image3)) {
				$filesNames = $this->fileUpload($image3, $stonecollectionId);
				//update filepath from datatabe.
				OutdoorCollection::where('id', $stonecollectionId)->update(['image3' => $filesNames]);
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

		$stonecollection = OutdoorCollection::where('id', $id)->first();

		$input = $request->except(['_token']); 
		$image1 = $request->file('image1');

		if (!empty($image1)) {

			$filesNames = $this->fileUpload($image1, $stonecollection->id);
			//update filepath from datatabe.
			$input['image1'] = $filesNames;
			$this->removeImage($stonecollection->image1);

		}

		$image2 = $request->file('image2');

		if (!empty($image2)) {

			$filesNames = $this->fileUpload($image2, $stonecollection->id);
			//update filepath from datatabe.
			$input['image2'] = $filesNames;
			$this->removeImage($stonecollection->image2);

		}

		$image3 = $request->file('image3');

		if (!empty($image3)) {

			$filesNames = $this->fileUpload($image3, $stonecollection->id);
			//update filepath from datatabe.
			$input['image3'] = $filesNames;
			$this->removeImage($stonecollection->image3);

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

		$child = DB::table('indoor_images')->where('collection_id', $id)->count();

		if($child > 0)
		{
			throw new GeneralException(trans("can not delete record it's child exist"));
			return false ;

		}


		$stonecollection = OutdoorCollection::where('id', $id)->first();
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
		return OutdoorCollection::where('id', $id)->first();
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
		
		$input = []; 
		
		$image1 = $request->file('image1');

		if (!empty($image1)) {

			$filesNames = $this->fileUpload($image1, $stonecollection->id);
			//update filepath from datatabe.
			$input['image1'] = $filesNames;
			$this->removeImage($stonecollection->image1);

		}

		$image2 = $request->file('image2');

		if (!empty($image2)) {

			$filesNames = $this->fileUpload($image2, $stonecollection->id);
			//update filepath from datatabe.
			$input['image2'] = $filesNames;
			$this->removeImage($stonecollection->image2);

		}

		$image3 = $request->file('image3');

		if (!empty($image3)) {

			$filesNames = $this->fileUpload($image3, $stonecollection->id);
			//update filepath from datatabe.
			$input['image3'] = $filesNames;
			$this->removeImage($stonecollection->image3);

		}


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

	public function getData()
	{
		

		return $stonecollections = OutdoorCollection::all();
		
	}

	
}
