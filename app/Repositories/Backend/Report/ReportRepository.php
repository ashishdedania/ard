<?php

namespace App\Repositories\Backend\Report;

use App\Exceptions\GeneralException;
use App\Models\Behaviour\Behaviour;
use App\Models\Behaviour\Scale;
use App\Models\Client\Client;
use App\Models\ManageSession\Managesession;
use App\Models\Report\Report;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ReportRepository.
 */

class ReportRepository extends BaseRepository {

	/**
	 * Associated Repository Model.
	 */
	const MODEL = Report::class ;

	/**
	 *
	 * Intervention client wise data
	 * @param $interventionId.
	 * @return $result.
	 */
	public function clientInterventionData($interventionId) {
		$interventionData = Client::
		leftjoin("users", "clients.user_id", "=", "users.id")
			->leftjoin("managesessions", "clients.id", "=", "managesessions.client_id")
			->where("managesessions.intervention_type", "=", $interventionId)
			->where("managesessions.session_visit", "=", 1)
			->where("managesessions.deleted_at", "=", NULL)
			->select(
			"clients.id as clientId", "clients.client_code", "clients.user_id", "managesessions.id as session_id", "managesessions.client_id", "managesessions.intervention_type", "users.id as userId", "users.first_name"
		)
			->get()
			->toArray();
		return $interventionData;
	}

	/**
	 *
	 * get client session.
	 * @param $clientId.
	 * @return $clientSession.
	 */

	/**
	 * get client session
	 * @param type $clientId
	 * @param int $questionType
	 * @return type
	 */
	public function getClientSession($clientId, $questionType = NULL) {
		/* new code */
		$clientSession = Managesession::with('sessionClient', 'sessionIntervention')->where('client_id', $clientId)
		// ->where('status', 1)
		->where("managesessions.intervention_type", "=", 1)
		->where("managesessions.session_visit", "=", 1)
		->where('managesessions.custom_question_id', "=", 2)
		->where(function ($query) use ($questionType) {
				if (isset($questionType)) {
					$query->where('question_type_id', $questionType);
				}
			})
			->orderBy('session_date', 'ASC')
			->get()
			->toArray();
		return $clientSession;
	}

	/**
	 * Get Progress Reports
	 * @param type $clientId
	 * @return type
	 * @throws GeneralException
	 */
	public function progressReport($clientId) {
		$session = Managesession::select('question_id', 'question_name', 'options', 'session_date')
			->join(config('module.subjective_question_save.table'), 'manage_session_id', config('module.managesessions.table').'.id')
			->join(config('module.custom_question.table'), config('module.custom_question.table').'.id', config('module.subjective_question_save.table').'.question_id')
			->where(config('module.managesessions.table').'.client_id', $clientId)
			->where(config('module.managesessions.table').'.status', 1)
			->orderBy('session_date')
			->get()
			->toArray();

		if (count($session) > 0) {
			return $session;
		} else {
			return $session = 0;
		}

		throw new GeneralException(trans('exceptions.backend.reports.not_found'));
	}

	/**
	 * Get objective reports data
	 * @param type $clientId
	 * @param type $arrSessionId
	 * @param type $questionType
	 * @return type
	 * @throws GeneralException
	 */
	public function getObjectiveReport($clientId, $arrSessionId, $questionType) {

		$session = Managesession::select(config('module.managesessions.table').'.id as session_id', 'title', config('module.questions.table').'.id as question_id', 'question', 'marks', 'session_date')
			->join(config('module.question_submit.table'), 'manage_session_id', config('module.managesessions.table').'.id')
			->join(config('module.questions.table'), config('module.questions.table').'.id', config('module.question_submit.table').'.question_id')
			->join(config('module.question_option.table'), config('module.question_option.table').'.id', config('module.question_submit.table').'.option_id')
			->where(config('module.managesessions.table').'.client_id', $clientId)
			->where(config('module.managesessions.table').'.status', 1)
			->where(config('module.managesessions.table').'.question_type_id', $questionType)
			->whereIn(config('module.managesessions.table').'.id', $arrSessionId)
			->orderBy('session_date')
			->get()
			->toArray();

		if (count($session) > 0) {
			return $session;
		}

		throw new GeneralException(trans('exceptions.backend.reports.not_found'));
	}

	/**
	 * Get behaviours score for sessions
	 * @param type $clientId
	 * @param type $arrSessionId
	 * @param type $questionType
	 * @return type
	 */
	public function getBehaviourScore($clientId, $arrSessionId, $questionType) {
		return Managesession::select(config('module.managesessions.table').'.id as session_id', 'title', \DB::raw("SUM(marks) as marksTotal"), config('module.behaviour.table').'.id as behaviour_id', 'behaviour')
			->join(config('module.question_submit.table'), 'manage_session_id', config('module.managesessions.table').'.id')
			->join(config('module.questions.table'), config('module.questions.table').'.id', config('module.question_submit.table').'.question_id')
			->join(config('module.question_option.table'), config('module.question_option.table').'.id', config('module.question_submit.table').'.option_id')
			->join(config('module.behaviour.table'), config('module.behaviour.table').'.id', config('module.questions.table').'.behaviour_id')
			->where(config('module.managesessions.table').'.client_id', $clientId)
			->where(config('module.managesessions.table').'.status', 1)
			->where(config('module.managesessions.table').'.question_type_id', $questionType)
			->whereIn(config('module.managesessions.table').'.id', $arrSessionId)
			->groupBy(config('module.managesessions.table').'.id', config('module.behaviour.table').'.id')
			->orderBy('session_date')
			->get()
			->toArray();
	}

	/**
	 * check in range and get scale name
	 * @param type $behaviourId
	 * @param type $score
	 * @return type
	 */
	public function totalBehaviourIdByType($questionType) {

		return Behaviour::where('question_type_id', $questionType)
			->where('is_behaviour', '=', 0)
			->first()	->id;
	}

	/**
	 * check in range and get scale name
	 * @param type $behaviourId
	 * @param type $score
	 * @return type
	 */
	public function getScoreByBehaviour($behaviourId, $score) {
		$scaleName = Scale::where('behaviour_id', $behaviourId)
			->where('scale_from', '<=', $score)
			->where('scale_to', '>=', $score)
			->first();

		return !empty($scaleName->scale)?$scaleName->scale:'';
	}

	/**
	 * Get behaviours score for sessions
	 * @param type $clientId
	 * @param type $arrSessionId
	 * @param type $questionType
	 * @return type
	 */
	public function getTotalScore($clientId, $arrSessionId, $questionType) {
		$totalScore = Managesession::select(config('module.managesessions.table').'.id as session_id', 'title', \DB::raw("SUM(marks) as marksTotal"))
			->join(config('module.question_submit.table'), 'manage_session_id', config('module.managesessions.table').'.id')
			->join(config('module.questions.table'), config('module.questions.table').'.id', config('module.question_submit.table').'.question_id')
			->join(config('module.question_option.table'), config('module.question_option.table').'.id', config('module.question_submit.table').'.option_id')
			->join(config('module.behaviour.table'), config('module.behaviour.table').'.id', config('module.questions.table').'.behaviour_id')
			->where(config('module.managesessions.table').'.client_id', $clientId)
			->where(config('module.managesessions.table').'.status', 1)
			->where(config('module.managesessions.table').'.question_type_id', $questionType)
			->whereIn(config('module.managesessions.table').'.id', $arrSessionId)
			->where(config('module.behaviour.table').'.id', '<>', '5')
			->groupBy(config('module.managesessions.table').'.id')
			->orderBy('session_date')
			->get()
			->toArray();

		$arrTotal = [];
		foreach ($totalScore as $arrData)
		$arrTotal[$arrData['session_id']] = $arrData['marksTotal'];
		return $arrTotal;
	}

	/**
	 *
	 * get objective questions scale master
	 * @param $clientId.
	 * @return $clientSession.
	 */
	public function getScaleMaster($questionType) {
		$scaleMaster = Behaviour::where(config('module.behaviour.table').'.status', 1)
			->join(config('module.behaviour.scale'), config('module.behaviour.scale').'.behaviour_id', config('module.behaviour.table').'.id')
			->where(config('module.behaviour.table').'.question_type_id', $questionType)
			->get();
		return $scaleMaster;
	}

	/**
	 *
	 * Goal Progress Report
	 */
	public function goalProgress($clientId) {
		$client     = getClients();
		$clientName = collect($client)->where('id', $clientId)->collapse()->get('first_name');
		$session    = $this->progressReport($clientId);
		// array of weekly score for each question
		if ($session != 0) {
			foreach ($session as $rowdata) {
				$week                                                                  = date('W', strtotime($rowdata['session_date']));
				$score[$rowdata['question_id'].'~'.$rowdata['question_name']][$week][] = $rowdata['options'];
			}
			// calc average per week and update week no starting with 0
			foreach ($score as $rowKey => $rowdata) {
				$weekCount = 0;
				foreach ($rowdata as $weekNo => $arrData) {
					$arrReport[$rowKey]['Week '.++$weekCount] = round(collect($arrData)->avg(), 2);
				}
			}
			// prepare header array
			$arrHeader[] = 'Goals';
			foreach ($arrReport as $headerData) {
				foreach ($headerData as $weekName => $weekAvg) {
					if (!in_array($weekName, $arrHeader)) {
						$arrHeader[] = $weekName;
					}
				}
			}
			return ['arrHeader' => $arrHeader, 'arrReport' => $arrReport, 'clientName' => $clientName];
		} else {
			return ['arrHeader' => '', 'arrReport' => '', 'clientName' => ''];
		}
	}

}
