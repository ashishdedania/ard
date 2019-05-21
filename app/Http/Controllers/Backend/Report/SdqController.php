<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Report\SdqReportRequest;
use App\Repositories\Backend\Report\ReportRepository;
use App\Exports\Report\Sdq\Export;
use App\Exports\InvoicesExport;

/**
 * ReportsController
 */
class SdqController extends Controller {

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
        $this->questionTypeId = 3;
    }

    /**
     * Display a listing of the resource.
     * @param SdqReportRequest $request
     * @return type
     */
    public function index(SdqReportRequest $request) {
        $client = getClients();
        return view('backend.reports.sdq.index', compact('client'));
    }

    /**
     * get session list
     * @param SdqReportRequest $request
     * @return type
     */
    public function getSession(SdqReportRequest $request) {
        $getClientSession = $this->repository->getClientSession($request->clientId, $this->questionTypeId);
        $returnHTML = view('backend.reports.sdq.session')
                ->with(['sessionDetails' => $getClientSession])
                ->render();
        return response()->json(array($returnHTML));
    }

    /**
     * get file name
     * @param type $param
     * @return type
     */
    public function fileName($clientId) {
        $client = getClients();
        $clientName = collect($client)->where('id', $clientId)->collapse()->get('first_name');
        return 'SDQ-' . $clientName . '.xlsx';
    }

    /**
     * Export to excel for SDQ reports
     * @param SdqReportRequest $request
     * @return type
     */
    public function generateExcel(SdqReportRequest $request) {
        $session = $this->repository->getObjectiveReport($request->client_id, $request->session_selected, $this->questionTypeId);

        // get export file name
        $fileName = $this->fileName($request->client_id);

        // get master sheet data
        $masterScale = $this->masterSheet($this->questionTypeId);

        // get master sheet data
        $finalScore = $this->finalScoreSheet($request->client_id, $request->session_selected, $this->questionTypeId);

        /* prepare raw data sheet starts */

        // modify array as per requirement
        $arrHeader[] = 'Question';
        foreach ($session as $rowdata) {
            $arrReport[$rowdata['question_id'] . '~' . $rowdata['question']][$rowdata['session_id']][] = (string) $rowdata['marks'];
            $arrHeader[] = $rowdata['title'];
            $arrRowData[$rowdata['question']][] = (string) $rowdata['marks'];
        }

        // prepare headers
        $arrHeader = array_unique($arrHeader);

        // prepare row data
        $intKey = 0;
        foreach ($arrRowData as $questionLabel => $questionMarks) {
            $arrData[$intKey++] = collect($questionMarks)->prepend($questionLabel)->all();
        }
        /* prepare raw data sheet ends */

        ob_end_clean();
        return (new Export($arrHeader, $arrData, $finalScore, $masterScale))->download($fileName);
    }

    /**
     * Export to excel for final score sheet
     * @param type $clientId
     * @param type $arrSessionId
     * @param type $questionType
     * @return type
     */
    public function finalScoreSheet($clientId, $arrSessionId, $questionType) {
        $totalBehaviourId = $this->repository->totalBehaviourIdByType($questionType);
        $finalScore = $this->repository->getBehaviourScore($clientId, $arrSessionId, $questionType);
        $totalScore = $this->repository->getTotalScore($clientId, $arrSessionId, $questionType);

        // prepare main table
        $scoreHeading[] = 'Behaviour';
        foreach ($finalScore as $scoreData) {
            // prepare heading
            if (!in_array($scoreData['title'], $scoreHeading)) {
                $scoreHeading[] = $scoreData['title'];
                $scoreHeading[] = 'Description';
            }

            // prepare behaviour score
            $behaviourScore[$scoreData['behaviour']][] = (string) $scoreData['marksTotal'];
            $scaleName = $this->repository->getScoreByBehaviour($scoreData['behaviour_id'], $scoreData['marksTotal']);
            $behaviourScore[$scoreData['behaviour']][] = $scaleName;
        }

        // prepare total difficulties line
        foreach ($arrSessionId as $sessionId) {
            $behaviourScore['Total Difficulies'][] = (string) $totalScore[$sessionId];
            $scaleName = $this->repository->getScoreByBehaviour($totalBehaviourId, $totalScore[$sessionId]);
            $behaviourScore['Total Difficulies'][] = $scaleName;
        }

        // prepare behaviour row data
        $counterKey = 0;
        foreach ($behaviourScore as $behaviourName => $behaviourData) {
            $behaviour[$counterKey++] = collect($behaviourData)->prepend($behaviourName)->all();
        }

        $behaviourTotScore = collect($behaviour)->prepend($scoreHeading);

        return $behaviourTotScore;
    }

    /**
     * Export to excel for master scale sheet
     * @param type $questionType
     * @return type
     */
    public function masterSheet($questionType) {
        $scaleMaster = $this->repository->getScaleMaster($questionType);

        // scale heading
        $scaleHeading = $scaleMaster->pluck('scale')->prepend('Behaviour')->unique()->all();

        // prepare behavior - scale array
        foreach ($scaleMaster as $rowdata) {
            $arrScale[$rowdata->behaviour][$rowdata->scale]['from'] = $rowdata->scale_from;
            $arrScale[$rowdata->behaviour][$rowdata->scale]['to'] = $rowdata->scale_to;
        }

        $intKey = 0;
        foreach ($arrScale as $behaviour => $scaleData) {
            foreach ($scaleHeading as $scaleName) {
                if ($scaleName == 'Behaviour')
                    $arrScaleRow[$intKey][$scaleName] = $behaviour;
                else if (isset($arrScale[$behaviour][$scaleName]))
                    $arrScaleRow[$intKey][$scaleName] = $scaleData[$scaleName]['from'] . ' - ' . $scaleData[$scaleName]['to'];
                else
                    $arrScaleRow[$intKey][$scaleName] = '';
            }
            $intKey++;
        }

        return collect($arrScaleRow)->prepend($scaleHeading);
    }

}
