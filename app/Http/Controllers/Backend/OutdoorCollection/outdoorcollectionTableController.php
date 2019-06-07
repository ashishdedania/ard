<?php

namespace App\Http\Controllers\Backend\OutdoorCollection;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\KnowledgeBase\ManageKnowledgebaseRequest;
use App\Repositories\Backend\OutdoorCollection\OutdoorCollectionRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class KnowledgebasesTableController.
 */

class outdoorcollectionTableController extends Controller {

	/**
	 * variable to store the repository object
	 * @var KnowledgebaseRepository
	 */
	protected $knowledgebase;

	/**
	 * contructor to initialize repository object
	 * @param KnowledgebaseRepository $knowledgebase;
	 */
	public function __construct(OutdoorCollectionRepository $knowledgebase) {
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
				
			->addColumn('created_at', function ($knowledgebase) {
				return Carbon::parse($knowledgebase->created_at)->format('d-m-Y');
			})
			->addColumn('actions', function ($knowledgebase) {
				return $knowledgebase->action_buttons;
			})
			->make(true);
	}

}
