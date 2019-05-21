<?php

namespace App\Http\Controllers\Backend\ManageSession;

use App\Exports\Report\Question\ExportQuestion;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ManageSession\CreateManagesessionRequest;
use App\Http\Requests\Backend\ManageSession\DeleteManagesessionRequest;
use App\Http\Requests\Backend\ManageSession\EditManagesessionRequest;
use App\Http\Requests\Backend\ManageSession\ManageManagesessionRequest;
use App\Http\Requests\Backend\ManageSession\StoreManagesessionRequest;
use App\Http\Requests\Backend\ManageSession\UpdateManagesessionRequest;
use App\Models\Client\Client;
use App\Models\ManageSession\Managesession;
use App\Models\QuestionBank\Questionbank;
use App\Models\QuestionSubmit\QuestionSubmit;
use App\Models\SubjectiveQuestionSave\SubjectiveQuestionSave;
use App\Models\SubjectiveQuestion\SubjectiveQuestion;
use App\Repositories\Backend\ManageSession\ManagesessionRepository;
use Illuminate\Http\Request;

/**
 * ManagesessionsController
 */

class ManagesessionsController extends Controller {

	/**
	 * variable to store the repository object
	 * @var ManagesessionRepository
	 */
	protected $repository;

	/**
	 * contructor to initialize repository object
	 * @param ManagesessionRepository $repository;
	 */
	public function __construct(ManagesessionRepository $repository) {
		$this->repository = $repository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  App\Http\Requests\Backend\ManageSession\ManageManagesessionRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(ManageManagesessionRequest $request) {

		//client manage session front-end
		if (access()->user()->roles()->first()->id == env('CLIENT_ROLE_ID')) {
			$interventionTypeId = $request['intervention_type'];
			$clientSessionData  = $this->repository->clientSessionData($request['intervention_type']);
			$clientId           = Client::where('user_id', access()->user()->id)->first();
			$customQuestion     = \DB::table(config('module.custom_question.table'))->where('client_id', $clientId['id'])->get()->toArray();
			$submitedQue        = QuestionSubmit::get()->toArray();
			$clientIntervention = \DB::table(config('module.client_intervention.table'))->where('client_id', $clientId['id'])->get()->toArray();
			$interventionsId    = array_column($clientIntervention, 'intervention_type');
			if (!empty($interventionsId)) {
				$interventionType = \DB::table(config('module.interventions_type.table'))->whereIn('id', $interventionsId)->get()->toArray();
			} else {
				$interventionType = '';
			}
			return view('backend.managesessions.app.clientindex', compact('clientSessionData', 'customQuestion', 'submitedQue', 'interventionType', 'interventionTypeId'));
		}
		//admin manage sessiion
		return view('backend.managesessions.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  CreateManagesessionRequestNamespace  $request
	 * @return \Illuminate\Http\Response
	 */
	public function create(CreateManagesessionRequest $request) {
		$client        = getClients();
		$questionsType = \DB::table(config('module.question_type.table'))->get()->toArray();
		return view('backend.managesessions.create', compact('client', 'questionsType'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  StoreManagesessionRequestNamespace  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreManagesessionRequest $request) {
		//Input received from the request
		$input = $request->except(['_token']);
		//Create the model using repository create method
		$this->repository->create($input);
		//return with successfull message
		return redirect()->route('admin.managesessions.index')->withFlashSuccess(trans('alerts.backend.managesessions.created'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  App\Models\ManageSession\Managesession  $managesession
	 * @param  EditManagesessionRequestNamespace  $request
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Managesession $managesession, EditManagesessionRequest $request) {
		$client           = getClients();
		$questionsType    = \DB::table(config('module.question_type.table'))->get()->toArray();
		$interventionType = \DB::table(config('module.interventions_type.table'))->where('id', $managesession['intervention_type'])->first();
		return view('backend.managesessions.edit', compact('managesession', 'client', 'questionsType', 'interventionType'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  UpdateManagesessionRequestNamespace  $request
	 * @param  App\Models\ManageSession\Managesession  $managesession
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateManagesessionRequest $request, Managesession $managesession) {
		//Input received from the request
		$input = $request->except(['_token']);
		//Update the model using repository update method
		$this->repository->update($managesession, $input);
		//return with successfull message
		return redirect()->route('admin.managesessions.index')->withFlashSuccess(trans('alerts.backend.managesessions.updated'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  DeleteManagesessionRequestNamespace  $request
	 * @param  App\Models\ManageSession\Managesession  $managesession
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Managesession $managesession, DeleteManagesessionRequest $request) {
		//Calling the delete method on repository
		$this->repository->delete($managesession);
		//returning with successfull message
		return redirect()->route('admin.managesessions.index')->withFlashSuccess(trans('alerts.backend.managesessions.deleted'));
	}

	/**
	 *
	 * Front-End view details of manage session.
	 * @param \Illuminate\Http\Request.
	 * @return \Illuminate\Http\Response.
	 */
	public function viewSessionDetails($sessionId, Request $request) {

		$sessionDet = Managesession::
		leftjoin(config('module.clients.table'), config('module.managesessions.table').'.client_id', '=', config('module.clients.table').'.id')
			->leftjoin("users", "users.id", '=', config('module.clients.table').'.user_id')
			->leftjoin(config('module.question_type.table'), config('module.managesessions.table').'.question_type_id', '=', config('module.question_type.table').'.id')
			->where(config('module.managesessions.table').'.id', $sessionId)
			->select(
			config('module.managesessions.table').'.id as sessionId',
			config('module.managesessions.table').'.question_type_id',
			config('module.managesessions.table').'.custom_question_id',
			config('module.managesessions.table').'.intervention_type',
			config('module.managesessions.table').'.title',
			config('module.managesessions.table').'.description',
			config('module.managesessions.table').'.session_date',
			config('module.managesessions.table').'.status',
			config('module.clients.table').'.id as clientId',
			config('module.question_type.table').'.id as queTypeId',
			"users.id as userId",
			"users.first_name",
			"users.last_name",
			"users.email"
		)
			->first();
		$questions = Questionbank::with('questionOption')->where(config('module.questions.table').'.type_id', '=', $sessionDet['question_type_id'])->get()->toArray();
		if ($sessionDet['custom_question_id'] == 1) {
			$data         = SubjectiveQuestion::where('client_id', $sessionDet['clientId'])->get()->toArray();
			$customQueAns = SubjectiveQuestionSave::where('manage_session_id', $sessionId)->get()->toArray();
			$qtype        = "CustomQuestion";
		} else if ($sessionDet['custom_question_id'] == 2) {
			$qtype = "No Question";
			$data  = [];
		} else {
			$data  = QuestionSubmit::where('manage_session_id', $sessionId)->select('id', 'question_id', 'option_id')->get()->toArray();
			$qtype = "ObjectiveQuestion";
		}
		return view('backend.managesessions.app.view-details', compact('qtype', 'data', 'questions', 'sessionId', 'customQueAns', 'sessionDet'));
	}

	/**
	 *
	 *  send question front-end.
	 * @param \Illuminate\Http\Request.
	 * @return \Illuminate\Http\Response.
	 */
	public function submitQuestion(Request $request) {
		//submit and save question.
		$input     = $request->all();
		$submitQue = $this->repository->submitQuestion($input);
		if ($input['submit-type'] != 'Save') {
			$message = 'The Answers were successfully submitted.';
		} else {
			$message = 'The Answers were successfully saved.';
		}
		return redirect('admin/managesessions/intervention/data?intervention_type='.$input['interventionType'])->withFlashSuccess($message);
	}

	/**
	 *
	 * view submited question.
	 * @param $request.
	 * @return $result.
	 */
	public function viewSubmitedQuestion($type, $sessionId, Request $request) {

		$questionAns = $this->repository->viewQuestionAnswer($type, $sessionId);
		return view('backend.managesessions.app.viewquestion', compact('sessionId', 'questionAns', 'type'));
	}
	/**
	 *
	 * Intervention Type of clients
	 * @param $request.
	 * @return $response.
	 */
	public function interventionTypeGet(Request $request) {
		$clientIntervention = \DB::table(config('module.client_intervention.table'))->where('client_id', $request['clientId'])->get()->toArray();
		$interventionsId    = array_column($clientIntervention, 'intervention_type');

		if (!empty($interventionsId)) {
			$interventionTypeGet = \DB::table(config('module.interventions_type.table'))->whereIn('id', $interventionsId)->get()->toArray();
		} else {
			$interventionTypeGet = '';
		}
		$alert = $this->checkThreshold($request['clientId']);

		return response()->json([$interventionTypeGet, $alert]);
	}
	/**
	 *
	 * checkThreshold.
	 * @param $clientId.
	 */
	public function checkThreshold($clientId) {
		$getThreshold = Managesession::with('sessionClient', 'sessionClient.users')
			->where('client_id', $clientId)
		/* new condtion added for nurology intervention type only and session visit for 1 */
			->where("managesessions.intervention_type", "=", 1)
			->where("managesessions.session_visit", "=", 1)
			->where('managesessions.custom_question_id', "=", 2)
			->orderBy('session_date', 'ASC')
			->get()
			->toArray();

		if (!empty($getThreshold)) {
			$thresholdValue = array_column($getThreshold, 'threshold_start');
			/**
			 *
			 * Check 4 Same Threshold AND Send Mail
			 */
			$thresholdStartVal = $thresholdValue;
			$thresholdEndVal   = array_column($getThreshold, 'threshold_end');
			// dd($thresholdEndVal);
			$count = [];
			$alert = '';
			foreach ($thresholdStartVal as $key => $startTh) {
				$count[] = ($startTh == $thresholdEndVal[$key])?1:0;
			}
			$counts = array_count_values($count);
			/**
			 *
			 * Send Mail if 4 same Threshold
			 */
			if ($counts['1'] == 2) {

				// $inputData['users']     = access()->user()->first_name;
				// $inputData['client_id'] = $getThreshold[0]['session_client']['client_code'];
				// $options                = [
				// 	'data'                => $inputData,
				// 	'email_template_type' => 13,
				// ];
				// createNotification('', access()->user()->id, 13, $options);
				return $alert = 1;
			} else {
				return $alert = 0;
			}
		} else {

		}
		return $alert = 0;
	}
	/**
	 *  export question
	 *
	 * @param sessionId
	 * @param type
	 * @return result
	 */
	public function exportQuestionDetails($type, $sessionId, Request $request) {
		$questionAns = $this->repository->viewQuestionAnswer($type, $sessionId);
		$view        = 'backend.managesessions.app.export';
		ob_end_clean();
		return \Excel::download(new ExportQuestion($view, $type, $sessionId, $questionAns), 'QuestionDetails.xlsx');
	}

	/**
	 * veiwDeatils.
	 *
	 * @param $managesession modal.
	 * @param $request.
	 * @return $view.
	 */
	public function veiwDeatils(Managesession $managesession, EditManagesessionRequest $request) {
		$managesession = $managesession::with('sessionClient', 'sessionClient.users', 'sessionIntervention')->where('id', $managesession['id'])->get()->first();
		$sessionType   = trans('strings.backend.session_type');
		$type          = array_search($managesession['custom_question_id'], $sessionType);
		$questionAns   = $this->repository->viewQuestionAnswer($type, $managesession['id']);
		return view('backend.managesessions.view', compact('managesession', 'questionAns', 'type'));

	}

}
