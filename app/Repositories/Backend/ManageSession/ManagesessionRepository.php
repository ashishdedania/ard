<?php

namespace App\Repositories\Backend\ManageSession;

use App\Exceptions\GeneralException;
use App\Models\Access\User\User;
use App\Models\Client\Client;
use App\Models\InterventionType\InterventionType;
use App\Models\ManageSession\Managesession;
use App\Models\QuestionBank\Questionbank;
use App\Models\QuestionOption\QuestionOption;
use App\Models\QuestionSubmit\QuestionSubmit;
use App\Repositories\BaseRepository;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ManagesessionRepository.
 */

class ManagesessionRepository extends BaseRepository {

	/**
	 * Associated Repository Model.
	 */
	const MODEL = Managesession::class ;

	/**
	 * This method is used by Table Controller
	 * For getting the table data to show in
	 * the grid
	 * @return mixed
	 */
	public function getForDataTable() {
		$query = $this->query()
		              ->leftjoin(config('access.users_table'), config('module.managesessions.table').'.created_by', '=', config('access.users_table').'.id')
		              ->leftjoin(config('module.clients.table'), config('module.managesessions.table').'.client_id', '=', config('module.clients.table').'.id')
		              ->leftjoin('users as myuser2', config('module.clients.table').'.user_id', '=', 'myuser2.id')
		              ->leftJoin('interventions_type', function ($join) {
				$join->on('interventions_type.id', '=', config('module.managesessions.table').'.intervention_type');
			})
			->select([
				config('module.managesessions.table').'.id',
				config('module.managesessions.table').'.title',
				config('module.managesessions.table').'.description',
				config('module.managesessions.table').'.session_date',
				config('module.managesessions.table').'.session_visit',
				config('module.managesessions.table').'.show_tile_card',
				config('module.managesessions.table').'.status',
				config('module.managesessions.table').'.question_type_id',
				config('module.managesessions.table').'.custom_question_id',
				config('module.managesessions.table').'.created_by',
				config('module.managesessions.table').'.created_at',
				config('module.managesessions.table').'.updated_at',
				"interventions_type.name as interventionsName",
				config('access.users_table').'.first_name',
				config('access.users_table').'.last_name',
				'myuser2.first_name as FirstName',
			]);
		return $query;
	}

	/**
	 *
	 * Client Session Data.
	 */
	public function clientSessionData($interventionType) {
		$clientData        = Client::where('user_id', access()->user()->id)->first();
		$clientSessionData = Managesession::where('client_id', $clientData['id'])
			->where(config('module.managesessions.table').'.intervention_type', $interventionType)
			->where(config('module.managesessions.table').'.show_tile_card', 1)
			->where(config('module.managesessions.table').'.schedule_flag', 1)
			->leftjoin(config('module.clients.table'), config('module.managesessions.table').'.client_id', '=', config('module.clients.table').'.id')
			->leftjoin("users", config('module.clients.table').'.user_id', '=', "users.id")
			->select(
			config('module.managesessions.table').'.id as sessionId',
			config('module.managesessions.table').'.client_id',
			config('module.managesessions.table').'.question_type_id',
			config('module.managesessions.table').'.custom_question_id',
			config('module.managesessions.table').'.title',
			config('module.managesessions.table').'.description',
			config('module.managesessions.table').'.session_date',
			config('module.managesessions.table').'.status',
			config('module.managesessions.table').'.intervention_type',
			config('module.clients.table').'.id as ClientId',
			config('module.clients.table').'.user_id',
			config('module.clients.table').'.dob',
			config('access.users_table').'.id as UserId',
			config('access.users_table').'.first_name',
			config('access.users_table').'.last_name',
			config('access.users_table').'.email'
		)	->orderBy(config('module.managesessions.table').'.session_date', 'DESC')	->paginate(8)
			->appends(request()->query());

		return $clientSessionData;
	}

	/**
	 * For Creating the respective model in storage
	 *
	 * @param array $input
	 * @throws GeneralException
	 * @return bool
	 */
	public function create(array $input) {
		$interventionName = InterventionType::where('id', $input['intervention_type'])->first();
		$clientInfo       = Client::where('id', $input['client_id'])->first();
		$getUser          = User::where('id', $clientInfo['user_id'])->first();
		$client['client'] = $getUser['first_name'];
		$client['email']  = $getUser['email'];
		$inputData        = array_merge($input, $client);
		if (isset($input['choose_question'])) {
			if ($input['choose_question'] == 1) {
				$questionType   = $input['question_type_id'];
				$customQuestion = 0;
				$qType          = "Objective";
				$status         = 0;
			} else if ($input['choose_question'] == 2) {
				$questionType   = 0;
				$customQuestion = 2;
				$qType          = "No Questions";
				$status         = 2;
			} else {
				$questionType   = 0;
				$customQuestion = 1;
				$qType          = "subjective";
				$status         = 0;
			}
			$qTyeps['question_type'] = $qType;
			$inputData               = array_merge($input, $client, $qTyeps);
		} else {
			$questionType   = NULL;
			$customQuestion = NULL;
		}
		$inputData['intervention']         = $interventionName['name'];
		$managesession                     = self::MODEL;
		$managesession                     = new $managesession();
		$managesession->title              = $input['title'];
		$managesession->description        = $input['description'];
		$managesession->session_date       = date("Y-m-d", strtotime($input['session_date']));
		$managesession->schedule_date      = date('Y-m-d', strtotime($input['schedule_date']));
		$managesession->client_id          = $input['client_id'];
		$managesession->question_type_id   = $questionType;
		$managesession->custom_question_id = $customQuestion;
		$managesession->intervention_type  = isset($input['intervention_type'])?$input['intervention_type']:0;
		$managesession->session_visit      = isset($input['session_visit'])?1:0;
		$managesession->show_tile_card     = isset($input['show_card'])?$input['show_card']:0;
		$managesession->status             = $status;
		$managesession->created_by         = access()->user()->id;
		if ($managesession->save($input)) {
			if (!empty($input['schedule_date'])) {
				$todayDate     = date('d-m-Y');
				$assesmentDate = $input['schedule_date'];
				if ($todayDate == $assesmentDate) {
					$updateScheduleFlag        = Managesession::where('id', $managesession->id)->update(['schedule_flag' => 1]);
					$urlLink                   = \URL::to('/admin/managesessions/view/details/'.$managesession->id);
					$inputData['session_link'] = '<a href='.$urlLink.'>Click here</a>';
					//email send for client session created.
					if (isset($input['choose_question'])) {
						$options = [
							'data'                => $inputData,
							'email_template_type' => 6,
						];
						if ($input['choose_question'] != 2 && isset($input['show_card'])) {
							createNotification('', $managesession->id, 6, $options);
						}
					}
				}
			}
			return true;
		}
		throw new GeneralException(trans('exceptions.backend.managesessions.create_error'));
	}

	/**
	 * For updating the respective Model in storage
	 *
	 * @param Managesession $managesession
	 * @param  $input
	 * @throws GeneralException
	 * return bool
	 */
	public function update(Managesession $managesession, array $input) {
		// dd($input);
		if (!empty($input['schedule_date'])) {
			$todayDate     = date('d-m-Y');
			$assesmentDate = $input['schedule_date'];
			if ($todayDate == $assesmentDate) {
				$scheduleFlag = 1;
			} else {
				$scheduleFlag = 0;
			}
		}
		// dd($scheduleFlag);

		if (isset($input['show_card']) && $input['show_card'] == 1 && $scheduleFlag == '1') {

			$getClient                 = Client::with('users')->where('id', $managesession->client_id)->first();
			$intervention              = InterventionType::where('id', $managesession->intervention_type)->first();
			$urlLink                   = \URL::to('/admin/managesessions/view/details/'.$managesession->id);
			$inputData['client_id']    = $getClient['id'];
			$inputData['title']        = $input['title'];
			$inputData['description']  = $input['description'];
			$inputData['session_date'] = $input['session_date'];
			$inputData['client']       = $getClient['users']['first_name'];
			$inputData['email']        = $getClient['users']['email'];
			$inputData['intervention'] = $intervention['name'];
			$inputData['session_link'] = '<a href='.$urlLink.'>Click here</a>';
			$options                   = [
				'data'                => $inputData,
				'email_template_type' => 6,
			];
			createNotification('', $managesession->id, 6, $options);
		}
		if (isset($input['question_type_id'])) {
			$dataSet = [
				'title'            => $input['title'],
				'question_type_id' => $input['question_type_id'],
				'description'      => $input['description'],
				'session_date'     => date('Y-m-d', strtotime($input['session_date'])),
				'schedule_date'    => date('Y-m-d', strtotime($input['schedule_date'])),
				'schedule_flag'    => $scheduleFlag,
				'session_visit'    => isset($input['session_visit'])?1:0,
				'show_tile_card'   => isset($input['show_card'])?$input['show_card']:0,
				'status'           => isset($input['status'])?$input['status']:0,
				'updated_by'       => access()->user()->id,
				'updated_at'       => Carbon::now(),
			];
		} else {
			$dataSet = [
				'title'          => $input['title'],
				'description'    => $input['description'],
				'session_date'   => date('Y-m-d', strtotime($input['session_date'])),
				'session_visit'  => isset($input['session_visit'])?1:0,
				'schedule_date'  => date('Y-m-d', strtotime($input['schedule_date'])),
				'schedule_flag'  => $scheduleFlag,
				'show_tile_card' => isset($input['show_card'])?$input['show_card']:0,
				'status'         => isset($input['status'])?$input['status']:0,
				'updated_by'     => access()->user()->id,
				'updated_at'     => Carbon::now(),
			];
		}
		if ($dataSet) {
			$updateDb = Managesession::where('id', $managesession->id)->update($dataSet);
			return true;
		}
		throw new GeneralException(trans('exceptions.backend.managesessions.update_error'));
	}

	/**
	 * For deleting the respective model from storage
	 *
	 * @param Managesession $managesession
	 * @throws GeneralException
	 * @return bool
	 */
	public function delete(Managesession $managesession) {
		if ($managesession->delete()) {
			return true;
		}

		throw new GeneralException(trans('exceptions.backend.managesessions.delete_error'));
	}
	/**
	 *
	 * submit question Email
	 * @param $data.
	 * @return bool.
	 */
	public function submitSessionEmail($data) {

		$intervention          = InterventionType::where('id', $data['intervention_type'])->first();
		$data['title']         = $data['title'];
		$data['clients']       = $data['sessionClient']['users']['first_name'];
		$data['session_date']  = date('d-m-Y', strtotime($data['session_date']));
		$data['intervention']  = $intervention['name'];
		$data['submited_date'] = date("d-m-Y");
		$data['question_type'] = ($data['custom_question_id'] == 1)?'subjective':'Objective';
		$data['email']         = settings()['from_email'];
		$urlLink               = \URL::to('/admin/managesessions/'.$data->id.'/views/details');
		$data['session_link']  = '<a href='.$urlLink.'>Click here</a>';

		$options = [
			'data'                => $data,
			'email_template_type' => 8
		];
		createNotification('', $data['id'], 8, $options);
	}

	/**
	 *
	 * submit client question for front-end side.
	 * @param $input.
	 * @return $result.
	 */
	public function submitQuestion($input) {
		$sessionsGet = Managesession::with('sessionClient', 'sessionClient.users')->where('id', $input['Session'])->first();
		if ($input['qtype'] == 'CustomQuestion') {
			/*  Session submit email to admin */
			if ($input['submit-type'] == 'Submit') {
				$this->submitSessionEmail($sessionsGet);
			}
			/* End Session submit email to admin */
			// submit question for subjective.
			$dataSet = [];
			foreach ($input['subjectiveQueId'] as $key => $subQue) {
				//check for exist
				$checkExistSubjetive = \DB::table(config('module.subjective_question_save.table'))
					->where('manage_session_id', $input['Session'])
					->where('question_id', $subQue)
					->exists();
				$updateSession = Managesession::where('id', $input['Session'])->update([
						'status' => ($input['submit-type'] == 'Save')?0:1,
					]);
				if ($checkExistSubjetive) {
					// update subjective question and options.
					$updateSubjectiveAns = \DB::table(config('module.subjective_question_save.table'))
						->where('manage_session_id', $input['Session'])
						->where('id', $input['customqueSaveId'][$key])
						->update([
							'options' => ($input['ans'][$key] == null)?1:$input['ans'][$key]

						]);

				} else {
					//insert subjective questions.
					$dataSet[] = [
						'manage_session_id' => $input['Session'],
						'question_id'       => $subQue,
						'options'           => $input['ans'][$key],
						'created_by'        => access()->user()->id,
					];
				}
			}
			if (!empty($dataSet)) {
				// insert subjective question and options.
				$saveSubjectiveQue = \DB::table(config('module.subjective_question_save.table'))->insert($dataSet);
			}
		} else {
			/*  Session submit email to admin */
			if ($input['submit-type'] == 'Submit') {
				$this->submitSessionEmail($sessionsGet);
			}
			/*  End Session submit email to admin */
			// submit question for Objective.
			if (!empty($input['questionAns'])) {
				$questionId = $input['questionSubmitId'];
				$del        = QuestionSubmit::where('manage_session_id', $input['Session'])->delete();
				$data       = [];
				foreach ($input['questionAns'] as $key => $value) {

					if ($value == env('SUSIDE_OPTION_1') || $value == env('SUSIDE_OPTION_2')) {

						$link         = \URL::to('admin/clients/'.$sessionsGet["client_id"].'/edit');
						$protocolLink = \URL::to('/docs/'.env('emergency_docs'));
						$answerGet    = QuestionOption::where('id', $value)->first();
						//Send Mail to Admin Suside Attempt.
						$inputData['client_id']          = $sessionsGet['sessionClient']['client_code'];
						$inputData['answer']             = $answerGet['option'];
						$inputData['users']              = settings()['from_name'];
						$inputData['link']               = '<a href="'.$link.'">Click here</a>';
						$inputData['emergency_protocol'] = '<a href="'.$protocolLink.'">Click here</a>';
						$options                         = [
							'data'                => $inputData,
							'email_template_type' => 12
						];
						createNotification('', access()->user()->id, 12, $options);
					}
					$data[] = [
						'manage_session_id' => $input['Session'],
						'question_id'       => $key,
						'option_id'         => $value,
						'created_by'        => access()->user()->id,
					];
				}
				$newQue = QuestionSubmit::insert($data);

			}
			$updateSession = Managesession::where('id', $input['Session'])->update([
					'status' => ($input['submit-type'] == 'Save')?0:1,
				]);
		}
		return true;
	}

	/**
	 *
	 * viewQuestionAnswer.
	 * @param $sessionId.
	 * @return $result,
	 */
	public function viewQuestionAnswer($type, $sessionId) {
		if ($type != 'Subjective') {
			$submitedQue = QuestionSubmit::where('manage_session_id', $sessionId)->get()->toArray();
			$queId       = [];
			$optionId    = [];
			foreach ($submitedQue as $key => $submitQueVal) {
				$queId[]    = $submitQueVal['question_id'];
				$optionId[] = $submitQueVal['option_id'];
			}
			//get question and answer.
			$questions = Questionbank::
			leftjoin(config('module.question_option.table'), config('module.questions.table').'.id', '=', config('module.question_option.table').'.question_id')
				->whereIn(config('module.questions.table').'.id', $queId)
				->whereIn(config('module.question_option.table').'.id', $optionId)
				->get()	->toArray();
		} else {
			$questions = \DB::table(config('module.subjective_question_save.table'))
				->leftjoin(config('module.custom_question.table'), config('module.subjective_question_save.table').'.question_id', '=', config('module.custom_question.table').'.id')
				->where(config('module.subjective_question_save.table').'.manage_session_id', $sessionId)
				->select(
				config('module.custom_question.table').'.question_name', config('module.subjective_question_save.table').'.options'
			)
				->get()
				->toArray();
		}
		return $questions;
	}

}
