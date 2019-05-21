<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Report\ThresholdReportRequest;
use App\Models\ManageSession\Managesession;
use App\Models\Report\Report;
use App\Repositories\Backend\Report\ReportRepository;

//use Maatwebsite\Excel\Facades\Excel;

/**
 * ReportsController
 */

class ThresholdController extends Controller {

	/**
	 * variable to store the repository object
	 * @var ReportRepository
	 */
	protected $repository;

	/**
	 * contructor to initialize repository object
	 * @param ReportRepository $repository;
	 */
	public function __construct(ReportRepository $repository) {
		$this->repository = $repository;
	}

	/**
	 * Display a listing of the resource.
	 * @param ThresholdReportRequest $request
	 * @return view
	 */
	public function index(ThresholdReportRequest $request) {
		$getClient = getClients();
		return view('backend.reports.threshold.index', compact('getClient'));
	}

	/**
	 *
	 * getSession
	 * @param ThresholdReportRequest $request.
	 * @param $response.
	 */
	public function getSession(ThresholdReportRequest $request) {

		$getClientSession = $this->repository->getClientSession($request['clientId']);
		$returnHTML       = view('backend.reports.threshold.session')
			->with(['sessionDetails' => $getClientSession])
			->render();
		return response()->json(array($returnHTML));
	}
	/**
	 *
	 * staffThresholdGraph
	 * @param ThresholdReportRequest $request.
	 * @param $response.
	 */
	public function staffThresholdGraph(ThresholdReportRequest $request) {
		/* New code */
		if (!empty($request['thresholdStart']) && !empty($request['thresholdEnd'])) {
			$thStart = [];
			$thEnd   = [];
			foreach ($request['thresholdStart'] as $key => $threshold) {
				/* New Code for threshold start and End value update */
				$checkExist = ManageSession::where('id', $request['sessionId'][$key])->where('client_id', $request['clientId'])->where('threshold_start', $threshold)->exists();
				if (!$checkExist) {

					$thStart[]       = $threshold;
					$updateThreshold = Managesession::where('id', $request['sessionId'][$key])->where('client_id', $request['clientId'])->update(['threshold_start' => $threshold]);
				} else {
					$thStart[] = $threshold;
				}
				$checkThresholdEndExist = ManageSession::where('id', $request['sessionId'][$key])->where('client_id', $request['clientId'])->where('threshold_end', $request['thresholdEnd'][$key])->exists();
				if (!$checkThresholdEndExist) {
					$thEnd[]         = $request['thresholdEnd'][$key];
					$updateThreshold = Managesession::where('id', $request['sessionId'][$key])->where('client_id', $request['clientId'])->update(['threshold_end' => $request['thresholdEnd'][$key]]);
				} else {
					$thEnd[] = $request['thresholdEnd'][$key];
				}
				//updateNotes
				Managesession::where('id', $request['sessionId'][$key])->where('client_id', $request['clientId'])->update(['description' => $request['insertNotes'][$key]]);
			}

		}
		//chart
		$getThreshold = Managesession::with('sessionClient', 'sessionClient.users')
			->where('client_id', $request['clientId'])
		/* new condtion added for nurology intervention type only and session visit for 1 */
			->where("managesessions.intervention_type", "=", 1)
			->where("managesessions.session_visit", "=", 1)
			->where('managesessions.custom_question_id', "=", 2)
			->orderBy('session_date', 'ASC')
			->get()
			->toArray();

		if (!empty($getThreshold)) {
			$dataSet = [];
			/* New code for threshold start and threshold end */
			$thresholdGet      = max(array_column($getThreshold, 'threshold_start'));
			$thresholdValue    = array_column($getThreshold, 'threshold_start');
			$thresholdEndMax   = max(array_column($getThreshold, 'threshold_end'));
			$thresholdEndValue = array_column($getThreshold, 'threshold_end');
			//total session
			$totalSession    = count($getThreshold);
			$dataVal         = array(join(",", $thresholdValue));
			$thresholdEndVal = array(join(",", $thresholdEndValue));
			$sessions        = [];

			/**
			 *
			 * Check 4 Same Threshold AND Send Mail
			 */
			$thresholdStartVal = $thresholdValue;
			$thresholdEndVal   = array_column($getThreshold, 'threshold_end');
			$count             = [];
			foreach ($thresholdStartVal as $key => $startTh) {
				$count[] = ($startTh == $thresholdEndVal[$key])?1:0;
			}
			$counts = array_count_values($count);
			/**
			 *
			 * Send Mail if 4 same Threshold
			 */
			if (isset($counts['1'])) {
				if ($counts['1'] == 2 || $counts['1'] == 3) {
					$inputData['users']     = access()->user()->first_name;
					$inputData['client_id'] = $getThreshold[0]['session_client']['client_code'];
					$options                = [
						'data'                => $inputData,
						'email_template_type' => 13,
					];
					createNotification('', access()->user()->id, 13, $options);
					$alert = 1;
				} else {
					$alert = 0;
				}
			} else {
				$alert = 0;
			}

			foreach ($thresholdValue as $key => $value) {
				$data[]     = floatval($value);
				$data[]     = floatval($thresholdEndValue[$key]);
				$sessions[] = 'S'.++$key.'S';
				$sessions[] = 'S'.$key.'E';
			}
			//chart series
			$dataset = [
				'name' => $getThreshold[0]['session_client']['client_code'],
				'data' => $data
			];
			$sessionGet = range(1, $thresholdGet);
			//generate chart
			$chart          = ['type'      => 'line', 'renderTo'      => 'chart2'];
			$title          = ['text'      => 'Client NFT Thresholds'];
			$xAxis          = ['lineWidth' => 0, 'categories' => $sessions];
			$yaxis          = ['min'       => 0, 'max'       => 10, 'title'       => ['text'       => 'Threshold Values'], 'tickInterval'       => 1];
			$legend         = ['layout'    => 'vertical', 'align'    => 'right', 'verticalAlign'    => 'middle'];
			$plotOptions    = ['line'      => ['dataLabels'      => ['enabled'      => true, ], 'enableMouseTracking'      => 'false', ], 'series'      => ['label'      => ['connectorAllowed'      => false]]];
			$series         = [$dataset];
			$path           = \URL::to('js/highchart/highcharts.js');
			$attachmentData = ',tooltip: {pointFormat: "Value: {point.y:.2f} mm",backgroundColor: "#FCFFC5",borderColor: "black",borderRadius: 10,borderWidth: 3,crosshairs: [true,true],formatter: function(){return "<b>Client:</b>"+this.series.name+"<br/>"+"<b>Threshold Value:</b>"+this.y;}},exporting:{buttons:{contextButton:{menuItems:Highcharts.getOptions().exporting.buttons.contextButton.menuItems.slice(0,5)}}},';
			$chartResult    = generateChart($chart, $title, $xAxis, $yaxis, $legend, $plotOptions, $series, $attachmentData);
		} else {
			$chartResult = "";
		}
		return response()->json([$chartResult, $alert]);
	}

}
