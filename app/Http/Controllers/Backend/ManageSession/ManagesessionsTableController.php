<?php

namespace App\Http\Controllers\Backend\ManageSession;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ManageSession\ManageManagesessionRequest;
use App\Repositories\Backend\ManageSession\ManagesessionRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ManagesessionsTableController.
 */

class ManagesessionsTableController extends Controller {
	/**
	 * variable to store the repository object
	 * @var ManagesessionRepository
	 */
	protected $managesession;

	/**
	 * contructor to initialize repository object
	 * @param ManagesessionRepository $managesession;
	 */
	public function __construct(ManagesessionRepository $managesession) {
		$this->managesession = $managesession;
	}

	/**
	 * This method return the data of the model
	 * @param ManageManagesessionRequest $request
	 *
	 * @return mixed
	 */
	public function __invoke(ManageManagesessionRequest $request) {
		return Datatables::of($this->managesession->getForDataTable())
			->escapeColumns(['name'])
			->addColumn('custom_question_id', function ($managesession) {

				if ($managesession->custom_question_id == 0) {
					return "<label class='label label-warning'>".'Objective'.'</label>';
				} else if ($managesession->custom_question_id == 2) {
					return "<label class='label label-primary'>".'No Questions'.'</label>';
				} else {
					return "<label class='label label-info'>".'Subjective'.'</label>';
				}
			})
			->addColumn('session_date', function ($managesession) {
				return Carbon::parse($managesession->session_date)->format('d-m-Y');
			})
			->addColumn('interventionsName', function ($managesession) {
				return "<label class='label label-info'>".$managesession->interventionsName.'</label>';

			})
			->addColumn('session_visit', function ($managesession) {
				if ($managesession->session_visit == 0) {
					return "<label class='label label-danger'>".'No'.'</label>';
				} else {
					return "<label class='label label-success'>".'Yes'.'</label>';
				}
			})
			->addColumn('status', function ($managesession) {
				return $managesession->status_label;
			})
			->addColumn('created_at', function ($managesession) {
				return Carbon::parse($managesession->created_at)->format('d-m-Y');
			})
			->addColumn('actions', function ($managesession) {
				return $managesession->action_buttons;
			})
			->make(true);
	}
}
