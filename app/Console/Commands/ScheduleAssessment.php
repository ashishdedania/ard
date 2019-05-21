<?php

namespace App\Console\Commands;

use App\Models\ManageSession\Managesession;
use App\Models\InterventionType\InterventionType;
use App\Models\Client\Client;
use Illuminate\Console\Command;

class ScheduleAssessment extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'daily:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Schedule Assessment';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$getAssessment = Managesession::select('id','title','client_id','question_type_id','custom_question_id', 'created_at', 'schedule_date')->orderBy('id', 'DESC')->get()->toArray();
		foreach ($getAssessment as $key => $assessment) {
			$todayDate     = date('Y-m-d');
			$assesmentDate = $assessment['schedule_date'];
			if ($todayDate == $assesmentDate) {                
                if ($assessment['question_type_id'] == 1) {
                    $qType = "Objective";
                } else {
                    $qType = "Subjective";
                }
                $interventionName = InterventionType::where('id', $assessment['id'])->first();
				$client = Client::with('users')->where('id', $assessment['client_id'])->first();                				
				$urlLink                   = \URL::to('/admin/managesessions/view/details/'.$assessment['id']);
				$inputData['session_link'] = '<a href='.$urlLink.'>Click here</a>';
                $inputData['client']       = $client['users']['first_name'];
                $inputData['email']        = $client['users']['email'];
                $inputData['title']        = $assessment['title'];
                $inputData['question_type'] = $qType;
                $inputData['intervention']  = $interventionName['name'];
				$options                   = [
					'data'                => $inputData,
					'email_template_type' => 6,
				];
                if ($assessment['custom_question_id'] != 2 ) {
                    createNotification('', $assessment['id'], 6, $options);    
                }
				$updateFlag = Managesession::where('id', $assessment['id'])->update(['schedule_flag' => 1]);
				\Log::info($updateFlag);
			}
		}
	}
}
