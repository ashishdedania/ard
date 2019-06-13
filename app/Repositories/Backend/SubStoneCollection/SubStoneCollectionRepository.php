<?php

namespace App\Repositories\Backend\SubStoneCollection;

use App\Exceptions\GeneralException;
use App\Models\SubStoneCollection\SubStoneCollection;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use File;

/**
 * Class KnowledgebaseRepository.
 */

class SubStoneCollectionRepository extends BaseRepository {

	/**
	 * Associated Repository Model.
	 */
	const MODEL = SubStoneCollection::class ;

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
		            ->select([
				config('module.substonecollection.table').'.id',
				config('module.substonecollection.table').'.title',
				config('module.substonecollection.table').'.description',
				config('module.substonecollection.table').'.image1',
				
				config('module.substonecollection.table').'.created_at',
				config('module.substonecollection.table').'.created_by',
				config('module.substonecollection.table').'.updated_at',
				
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
		$stonecollection->collection_id = $input['collection_id'];
		$stonecollection->created_by  = access()->user()->id;
		
		if ($stonecollection->save()) {
			$stonecollectionId = $stonecollection->id;
			


			if (!empty($image1)) {
				$filesNames = $this->fileUpload($image1, $stonecollectionId);
				//update filepath from datatabe.
				SubStoneCollection::where('id', $stonecollectionId)->update(['image1' => $filesNames]);
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

		$stonecollection = SubStoneCollection::where('id', $id)->first();

		$input = $request->except(['_token']); 
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
		$stonecollection = SubStoneCollection::where('id', $id)->first();
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
		return SubStoneCollection::where('id', $id)->first();
	}

	
	public function removeImage($image)
	{

		$image_path = public_path("/images/".$image);
		if(File::exists($image_path)) {
		    File::delete($image_path);
		}

		
	}
	
}
