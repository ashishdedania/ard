<?php

namespace App\Http\Utilities;

use App\Models\Settings\Setting;
use Illuminate\Support\Facades\Mail;

class SendEmail {

	public function sendWithTemplate($data, $typeId) {

		$settings = Setting::find(1);
		$template = \DB::table('email_templates')->where('type_id', $typeId)->where('status', 1)->orderBy('updated_at', 'DESC')->first();

		if (!empty($template)) {
			switch ($typeId) {

				case '1':
					// When user register from frontend
					$content = $template->body;

					// Replace app name
					$content = str_replace('[app_name]', app_name(), $content);

					// Replace user firstname
					$content = str_replace('[name]', $data['first_name'], $content);

					// Replace confirmation link
					$url     = '<a href='.url('account/confirm/'.$data['confirmation_code']).'>Click Here</a>';
					$content = str_replace('[confirmation_link]', $url, $content);

					// User email
					$data['to']  = $settings['from_email'];
					$data['bcc'] = $data['email'];
					// Subject of mail
					$data['subject'] = $template->subject;
					break;

				case '2':
					$content = $template->body;
					// Replace app name
					$content = str_replace('[app_name]', app_name(), $content);
					// Replace user firstname
					$content = str_replace('[first_name]', $data['first_name'], $content);
					// Replace user email
					$content = str_replace('[email]', $data['email'], $content);
					// Replace user password
					$content = str_replace('[password]', $data['password'], $content);
					//login link
					$content         = str_replace('[login_link]', $data['login_link'], $content);
					$data['to']      = $data['email'];
					$data['subject'] = $template->subject;
					break;

				case '3':
					$content = $template->body;

					// Replace status in subject
					$status  = $data->status == 0?'Deactivated':'Activated';
					$subject = str_replace('[status]', $status, $template->subject);

					// Replace status in email body
					$content = str_replace('[status]', $status, $content);

					// Replace app name
					$content = str_replace('[app_name]', app_name(), $content);

					$data['to']      = $data['email'];
					$data['subject'] = $subject;
					break;

				case '4':
					$content = $template->body;

					// Replace status in email body
					$content = str_replace('[email]', $data['email'], $content);
					$content = str_replace('[password]', $data['password'], $content);

					// Replace app name
					$content = str_replace('[app_name]', app_name(), $content);

					$data['to']      = $data['email'];
					$data['subject'] = $template->subject;
					break;

				case '5':
					$content = $template->body;
					// Replace status in email body
					$content = str_replace('[client]', $data['first_name'], $content);
					$content = str_replace('[login_link]', $data['login_link'], $content);
					$content = str_replace('[email]', $data['email'], $content);
					$content = str_replace('[password]', $data['password'], $content);
					// Replace app name
					$content         = str_replace('[app_name]', app_name(), $content);
					$data['to']      = $data['email'];
					$data['subject'] = $template->subject;
					break;

				case '6':
					$content = $template->body;
					$content = str_replace('[client]', $data['client'], $content);
					$content = str_replace('[title]', $data['title'], $content);
					// $content         = str_replace('[session_date]', $data['session_date'], $content);
					$content = str_replace('[session_link]', $data['session_link'], $content);
					$content = str_replace('[intervention]', $data['intervention'], $content);
					// $content         = str_replace('[question_type]', $data['question_type'], $content);
					$content         = str_replace('[app_name]', app_name(), $content);
					$data['to']      = $data['email'];
					$data['subject'] = $template->subject;
					break;

				case '7':
					$content         = $template->body;
					$content         = str_replace('[client]', $data['users']['first_name'], $content);
					$content         = str_replace('[title]', $data['knowledgebase_title'], $content);
					$content         = str_replace('[link]', $data['link'], $content);
					$content         = str_replace('[app_name]', app_name(), $content);
					$data['to']      = $data['users']['email'];
					$data['subject'] = $template->subject;
					break;

				case '8':
					//customer submit session email to admin.
					$content         = $template->body;
					$content         = str_replace('[users]', ucfirst(access()->user()->first_name), $content);
					$content         = str_replace('[session_link]', $data['session_link'], $content);
					$content         = str_replace('[title]', $data['title'], $content);
					$content         = str_replace('[session_date]', $data['session_date'], $content);
					$content         = str_replace('[intervention]', $data['intervention'], $content);
					$content         = str_replace('[question_type]', $data['question_type'], $content);
					$content         = str_replace('[submited_date]', $data['submited_date'], $content);
					$content         = str_replace('[app_name]', app_name(), $content);
					$data['to']      = $data['email'];
					$data['subject'] = $template->subject;
					break;

				case '9':
					// mark intervention as complete - send email to client
					$content = $template->body;
					$content = str_replace('[client]', $data['client'], $content);
					$content = str_replace('[intervention_service]', $data['intervention_service'], $content);
					$content = str_replace('[feedback_link]', $data['feedback_link'], $content);
					$content = str_replace('[testimonial_link]', $data['testimonial_link'], $content);
					// $content         = str_replace(['[intervention_service]', '[feedback_link]', '[testimonial_link]'], [$data['intervention_service'], $data['feedback_link'], $data['testimonial_link']], $content);
					$content         = str_replace('[app_name]', app_name(), $content);
					$data['subject'] = $template->subject;
					break;
				case '10':
					$content         = $template->body;
					$content         = str_replace('[client]', $data['users']['first_name'], $content);
					$content         = str_replace('[title]', $data['knowledgebase_title'], $content);
					$content         = str_replace('[link]', $data['link'], $content);
					$content         = str_replace('[app_name]', app_name(), $content);
					$data['to']      = $data['users']['email'];
					$data['subject'] = $template->subject;
					break;
				case '11':
					$content         = $template->body;
					$content         = str_replace('[users]', $settings['from_name'], $content);
					$content         = str_replace('[client_id]', $data['client_id'], $content);
					$content         = str_replace('[link]', $data['link'], $content);
					$content         = str_replace('[app_name]', app_name(), $content);
					$data['to']      = $settings['from_email'];
					$data['subject'] = $template->subject;
					break;
				case '12':
					$content         = $template->body;
					$content	 = str_replace('[app_name]',app_name(),$content);
					$content	 = str_replace('[users]',$data['users'],$content);
					$content	 = str_replace('[client_id]',$data['client_id'],$content);
					$content	 = str_replace('[link]',$data['link'],$content);
					$content	 = str_replace('[answer]',$data['answer'], $content);
					$content	 = str_replace('[emergency_protocol]',$data['emergency_protocol'],$content);
					$data['to']      = $settings['from_email'];
					$data['subject'] = $template->subject;
					break;
				case '13':
					$content         = $template->body;
					$content         = str_replace('[app_name]', app_name(), $content);
					$content         = str_replace('[users]', $data['users'], $content);
					$content         = str_replace('[client_id]', $data['client_id'], $content);
					$data['to']      = $settings['from_email'];
					$data['subject'] = $template->subject;
					break;
				default:
					echo 'Default case';
					break;
			}
			// Send email code
			$message = ['data' => $content];

			return Mail::send(['html' => 'emails.template'], $message, function ($message) use ($data) {
					$message->to($data['to']);
					$message->subject($data['subject']);
				});
		} else {
			return false;
		}
	}

}
