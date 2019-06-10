<?php

namespace App\Repositories\Backend\IndoorImages;

use App\Exceptions\GeneralException;
use App\Models\IndoorImages\IndoorImages;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use File;

/**
 * Class KnowledgebaseRepository.
 */

class IndoorImagesRepository extends BaseRepository {

	/**
	 * Associated Repository Model.
	 */
	const MODEL = IndoorImages::class ;

	/**
	 * This method is used by Table Controller
	 * For getting the table data to show in
	 * the grid
	 * @return mixed
	 */
	/*public function getForDataTable() {
		return $this->query()
		            ->select([
				'sub_stone_collection.id',
				'sub_stone_collection.title',
				'sub_stone_collection.description',
				'sub_stone_collection.image1',
				'sub_stone_collection.created_at',
				'sub_stone_collection.created_by',
				'sub_stone_collection.updated_at',
				
			]);
	}*/

	public function getForDataTable() {
		return $this->query()
		->leftjoin('indoor_outdoor', 'indoor_outdoor.id', '=', config('module.indoorimages.table').'.collection_id')
		            ->select([
				config('module.indoorimages.table').'.id',
				config('module.indoorimages.table').'.title',
				config('module.indoorimages.table').'.description',
				config('module.indoorimages.table').'.image1',
				'indoor_outdoor.title as category',
				config('module.indoorimages.table').'.created_at',
				config('module.indoorimages.table').'.created_by',
				config('module.indoorimages.table').'.updated_at',
				
			]);
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
		$stonecollection->collection_id = $input['is_indoor'] == 1 ? $input['collection_id_1'] : $input['collection_id'];
		$stonecollection->created_by  = access()->user()->id;
		$stonecollection->sr_no = $input['sr_no'];
		
		if ($stonecollection->save()) {
			$stonecollectionId = $stonecollection->id;
			


			if (!empty($image1)) {
				$filesNames = $this->fileUpload($image1, $stonecollectionId);
				//update filepath from datatabe.
				IndoorImages::where('id', $stonecollectionId)->update(['image1' => $filesNames]);
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

		$stonecollection = IndoorImages::where('id', $id)->first();

		$input = $request->except(['_token']);

		$val  = $input['is_indoor'] == 1 ? $input['collection_id_1'] : $input['collection_id'];
		unset($input['is_indoor']);
		unset($input['collection_id_1']); 

		$input['collection_id'] = $val;

		$image1 = $request->file('image1');

		if (!empty($image1)) {

			$filesNames = $this->fileUpload($image1, $stonecollection->id);
			//update filepath from datatabe.
			$input['image1'] = $filesNames;
			$this->removeImage($stonecollection->image1);

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
		$stonecollection = IndoorImages::where('id', $id)->first();
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
		return IndoorImages::where('id', $id)->first();
	}

	
	public function removeImage($image)
	{

		$image_path = public_path("/images/".$image);
		if(File::exists($image_path)) {
		    File::delete($image_path);
		}

		
	}
	
}
