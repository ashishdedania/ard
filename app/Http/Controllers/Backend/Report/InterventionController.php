<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Report\InterventionReportRequest;
use App\Http\Responses\ViewResponse;
use App\Models\ManageSession\Managesession;
use App\Models\InterventionType\InterventionType;
use App\Repositories\Backend\ManageSession\ManagesessionRepository;
use App\Models\Report\Report;
use App\Repositories\Backend\Report\ReportRepository;

/**
 * ReportsController
 */

class InterventionController extends Controller {

	/**
	 * variable to store the repository object
	 * @var ReportRepository
	 */
	protected $repository;
	protected $managesession;

	/**
	 * contructor to initialize repository object
	 * @param ReportRepository $repository;
	 */
	public function __construct(ReportRepository $repository,ManagesessionRepository $managesession) {
		$this->repository   = $repository;
		$this->managesession = $managesession;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  App\Http\Requests\Backend\Report\InterventionReportRequest  $request
	 * @return \App\Http\Responses\ViewResponse
	 */
	public function index(InterventionReportRequest $request) {
		return new ViewResponse('backend.reports.index');
	}

	/**
	 *
	 * Intervention Charts.
	 */
	public function interventionChart(InterventionReportRequest $request) {
		$interventionType = InterventionType::pluck('name', 'id')->toArray();
		$chart2           = '';
		return view('backend.reports.intervention.interventionchart', compact('interventionType', 'chart2'));
	}

	/**
	 *
	 * interventionchartData
	 * @param $request.
	 * @return $result.
	 */
	public function interventionchartData(InterventionReportRequest $request) {
		$interventionType = InterventionType::pluck('name', 'id')->toArray();
		return view('backend.reports.intervention.interventionchart', compact('interventionType'));
	}

	/**
	 *
	 * Interventin Chart Data
	 * @param InterventionReportRequest $request.
	 * @return $response.
	 */
	public function create_array($num_elements) {
		$j = 1;
		for ($i = 0; $i < $num_elements; $i++) {
			$data[] = [
				'S-'.$j,
				$j
			];
			$j++;
		}
		return $data;
	}
	public function interventionReport(InterventionReportRequest $request) {
		$interventionData = $this->repository->clientInterventionData($request['intervention_type']);
		if (!empty($interventionData)) {
			$clientArr = [];
			foreach ($interventionData as $key => $interventionVal) {
				$clientArr[$interventionVal['client_code']][] = $interventionVal['session_id'];
			}
			$drilldownArr = [];
			$seriesArr    = [];
			$maxSession   = [];
			foreach ($clientArr as $clientKey => $clientVal) {
				$maxSession[] = count($clientVal);
				$data         = $this->create_array(count($clientVal));
				rsort($data);
				$seriesArr[] = [
					"name"      => $clientKey,
					"y"         => count($clientVal),
					"drilldown" => $clientKey
				];
				$drilldownArr[] = [
					"name"   => $clientKey,
					"id"     => $clientKey,
					"mydata" => $clientArr[$clientKey],
					"data"   => $data
				];
			}
			//session Number arr
			$sessionNumArr = [];
			$j             = 1;
			for ($i = 0; $i < max($maxSession); $i++) {
				$sessionNumArr[] = 'S-'.$j;
				$j++;
			}
			array_unshift($sessionNumArr, "S-0");
			//generate chart
			$script = interventionChartScript(trans("labels.backend.reports.intervention"), max($maxSession), json_encode($seriesArr), json_encode($drilldownArr), json_encode($sessionNumArr));
		} else {
			$script = [];
		}
		return response($script);
	}

	/**
	 *
	 * viewSessionChartModal Data.
	 * @param $request.
	 * @return $response.
	 */
	public function viewSessionChartModal(InterventionReportRequest $request) {
		$managesession = Managesession::with('sessionClient', 'sessionClient.users', 'sessionIntervention')->where('id', $request['sessionId'])->get()->first();		
		$sessionType   = trans('strings.backend.session_type');		
		$type          = array_search($managesession['custom_question_id'], $sessionType);		
		$questionAns   = $this->managesession->viewQuestionAnswer($type, $managesession['id']);
		$returnHTML    = view('backend.managesessions.view_form')
			       ->with(['chart' => 'chart','managesession' => $managesession, 'questionAns' => $questionAns, 'type' => $type])
			       ->render();
		return response()->json($returnHTML);
	}
}
