<?php

namespace App\Http\Controllers\Backend\Report;

use App\Exceptions\GeneralException;
use App\Exports\Report\Progress\Export;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Report\ProgressReportRequest;
use App\Repositories\Backend\Report\ReportRepository;

/**
 * ReportsController
 */
class ProgressController extends Controller {

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
     * @param ProgressReportRequest $request
     * @return type
     */
    public function index(ProgressReportRequest $request) {
        $client = getClients();
        return view('backend.reports.progress.index', compact('client'));
    }

    /**
     * Export to excel for client weekly progress reports
     * @param ProgressReportRequest $request
     * @return type
     */
    public function generateExcel(ProgressReportRequest $request) {
        // get client name
        $goalProgress = $this->repository->goalProgress($request->client_id);
        $arrHeader = $goalProgress['arrHeader'];
        $arrReport = $goalProgress['arrReport'];
        $clientName = $goalProgress['clientName'];
        if (!empty($arrReport) && !empty($arrHeader)) {
            // prepare collection array
            $intRow = 0;
            foreach ($arrReport as $dataKey => $dataRow) {
                $arrCollection[$dataKey][$intRow++] = explode('~', $dataKey)[1];
                foreach ($dataRow as $weekAvg) {
                    $arrCollection[$dataKey][$intRow++] = (string) $weekAvg;
                }
            }

            ob_end_clean();
            return \Excel::download(new Export($arrHeader, $arrCollection), 'Goal Progress-' . $clientName . '.xlsx');
        }
        throw new GeneralException(trans('exceptions.backend.reports.not_found'));
    }

    /**
     * Generate graph for Goal Progress
     * @param ProgressReportRequest $request
     * @return type
     */
    public function goalReport(ProgressReportRequest $request) {
        $goalProgress = $this->repository->goalProgress($request->clientId);
        $arrHeader = $goalProgress['arrHeader'];
        $arrReport = $goalProgress['arrReport'];
        // prepare collection array
        $intRow = 0;
        $dataSet = [];
        $name = [];
        $data = [];
        $seriesArr = [];
        if ($arrReport != "" && $arrHeader != "") {
            foreach ($arrReport as $dataKey => $dataRow) {
                $name = explode('~', $dataKey)[1];
                $data = array_values($dataRow);
                $seriesArr[] = [
                    'name' => $name,
                    'data' => $data,
                ];
            }
            $weeks = $arrHeader;
            unset($weeks[0]);
            $weeksArr = [];
            for ($i = 1; $i <= count($weeks); $i++) {
                $weeksArr[] = 'Week-' . $i;
            }
            $chart = ['type' => 'line', 'renderTo' => 'chart2'];
            $title = ['text' => 'Goal Progress Graph'];
            $xAxis = ['lineWidth' => 0, 'categories' => $weeksArr];
            $yaxis = ['min' => -10, 'max' => 10, 'title' => ['text' => 'Score'], 'tickInterval' => 1];
            $legend = ['layout' => 'vertical', 'align' => 'right', 'verticalAlign' => 'middle'];
            $plotOptions = ['line' => ['dataLabels' => ['enabled' => true,], 'enableMouseTracking' => 'false',], 'series' => ['label' => ['connectorAllowed' => false]]];
            $series = $seriesArr;
            $attachmentData = ',tooltip: {pointFormat: "Value: {point.y:.2f} mm",backgroundColor: "#FCFFC5",borderColor: "black",borderRadius: 10,borderWidth: 3,crosshairs: [true,true],formatter: function(){return "<b>Behaviour:</b>"+this.series.name+"<br/>"+"<b>Score:</b>"+this.y;}},exporting:{buttons:{contextButton:{menuItems:Highcharts.getOptions().exporting.buttons.contextButton.menuItems.slice(0,5)}}},';
            $chartResult = generateChart($chart, $title, $xAxis, $yaxis, $legend, $plotOptions, $series, $attachmentData);
        } else {
            $chartResult = "";
        }
        return response()->json($chartResult);
    }

}
