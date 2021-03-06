<?php

namespace App\Repositories\Backend\StoneProduct;

use App\Exceptions\GeneralException;
use App\Models\StoneProduct\StoneProduct;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use File;

/**
 * Class KnowledgebaseRepository.
 */

class StoneProductRepository extends BaseRepository {

	/**
	 * Associated Repository Model.
	 */
	const MODEL = StoneProduct::class ;

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
				config('module.stoneproduct.table').'.id',
				config('module.stoneproduct.table').'.title',
				config('module.stoneproduct.table').'.description',
				config('module.stoneproduct.table').'.image1',
				
				config('module.stoneproduct.table').'.created_at',
				config('module.stoneproduct.table').'.created_by',
				config('module.stoneproduct.table').'.updated_at',
				
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
		$image4 = $request->file('image4');

		$stonecollection              = self::MODEL;
		$stonecollection              = new $stonecollection();
		$stonecollection->title       = $input['title'];
		$stonecollection->description       = $input['description'];
		$stonecollection->collection_id = $input['collection_id'];


		$stonecollection->product_carousel_area       = $input['product_carousel_area'];
		$stonecollection->versitility_of_application       = $input['versitility_of_application'];
		$stonecollection->technical_info_section       = $input['technical_info_section'];
		$stonecollection->quote_selection       = $input['quote_selection'];

		$stonecollection->edging_option       = $input['edging_option'];
		$stonecollection->maintainance_section       = $input['maintainance_section'];
		$stonecollection->section_seven       = $input['section_seven'];


		$stonecollection->meta_title   = $input['meta_title'];
		$stonecollection->meta_description   = $input['meta_description'];


		$stonecollection->head_tags   = $input['head_tags'];
		$stonecollection->body_tags   = $input['body_tags'];


		$stonecollection->image_alt_text   = $input['image_alt_text'];
		$stonecollection->image_title_text   = $input['image_title_text'];


		$stonecollection->slug_id   = $this->clean($input['slug_id']);
		$stonecollection->canonical_link   = $input['canonical_link'];
		


		$stonecollection->created_by  = access()->user()->id;
		
		if ($stonecollection->save()) {
			$stonecollectionId = $stonecollection->id;


			if (!empty($image4)) {
				$filesNames = $this->fileUpload($image4, $stonecollectionId);
				//update filepath from datatabe.
				StoneProduct::where('id', $stonecollectionId)->update(['image4' => $filesNames]);
			}
			
			


			if(isset($input['del_image1'])) // if delete come then only delete
			{
				

			}
			else
			{

				if (!empty($image1)) {
					$filesNames = $this->fileUpload($image1, $stonecollectionId);
					//update filepath from datatabe.
					StoneProduct::where('id', $stonecollectionId)->update(['image1' => $filesNames]);
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
					StoneProduct::where('id', $stonecollectionId)->update(['image2' => $filesNames]);
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
					StoneProduct::where('id', $stonecollectionId)->update(['image3' => $filesNames]);
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


    function clean($string) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		$string = strtolower($string); // Convert to lowercase
 
		return $string;
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

		$stonecollection = StoneProduct::where('id', $id)->first();

		$input = $request->except(['_token']); 

		$input['slug_id'] = $this->clean($input['slug_id']);

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
		$stonecollection = StoneProduct::where('id', $id)->first();
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
		return StoneProduct::where('id', $id)->first();
	}

	
	public function removeImage($image)
	{

		$image_path = public_path("/images/".$image);
		if(File::exists($image_path)) {
		    File::delete($image_path);
		}

		
	}
	
}
