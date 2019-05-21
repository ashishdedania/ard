<?php

namespace App\Http\Controllers\Backend\KnowledgeBase;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\KnowledgeBase\ManageKnowledgebaseRequest;
use App\Repositories\Backend\KnowledgeBase\KnowledgebaseRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class KnowledgebasesTableController.
 */

class KnowledgebasesTableController extends Controller {

	/**
	 * variable to store the repository object
	 * @var KnowledgebaseRepository
	 */
	protected $knowledgebase;

	/**
	 * contructor to initialize repository object
	 * @param KnowledgebaseRepository $knowledgebase;
	 */
	public function __construct(KnowledgebaseRepository $knowledgebase) {
		$this->knowledgebase = $knowledgebase;
	}

	/**
	 * This method return the data of the model
	 * @param ManageKnowledgebaseRequest $request
	 *
	 * @return mixed
	 */
	public function __invoke(ManageKnowledgebaseRequest $request) {
		return Datatables::of($this->knowledgebase->getForDataTable())
			->escapeColumns(['id'])
			->addColumn('status', function ($knowledgebase) {
				return $knowledgebase->status_label;
			})
			->addColumn('average_rating', function ($knowledgebase) {
				if (empty($knowledgebase->average_rating)) {
					return '<a href="#" class="ratings" data-toggle="modal" data-id="'.$knowledgebase->id.'" data-target="#knowledgebasesFiles"><label class="label label-success">0</label></a>';
				} else {
					return '<a href="#" class="ratings" data-toggle="modal" style="cursor: pointer;" data-id="'.$knowledgebase->id.'" data-target="#knowledgebasesFiles"><label class="label label-success">'.$knowledgebase->average_rating.'</label></a></i>';
					// return '<input  type="text" class="rating" name="average_rating" value="'.$knowledgebase->average_rating.'" dir="rtl" data-size="xs" data="" data-id="" title=""> <a href="#" class="ratings" data-toggle="modal" data-id="'.$knowledgebase->id.'" data-target="#knowledgebasesFiles"><label class="label label-success">0</label></a>';

				}
			})
			->addColumn('created_at', function ($knowledgebase) {
				return Carbon::parse($knowledgebase->created_at)->format('d-m-Y');
			})
			->addColumn('actions', function ($knowledgebase) {
				return $knowledgebase->action_buttons;
			})
			->make(true);
	}

}
