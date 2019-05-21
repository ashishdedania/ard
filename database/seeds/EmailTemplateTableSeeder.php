<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTemplateTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		if (env('DB_CONNECTION') == 'mysql') {
			DB::table(config('module.email_templates.table'))->truncate();
		}

		$data = [
			[
				'title'   => 'User Registration',
				'type_id' => '1',
				'subject' => 'Actualise: User Registration',
				'body'    => '<center>
<table id="bodyTable" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td id="bodyCell" align="center" valign="top">
<table id="templateContainer" border="0" width="600" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td align="left" valign="top">
<table id="templateBody" border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="bodyContainer" style="padding-top: 9px; padding-bottom: 9px;" valign="top">
<table class="mcnBoxedTextBlock" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnBoxedTextBlockOuter">
<tr>
<td class="mcnBoxedTextBlockInner" valign="top">
<table class="mcnBoxedTextContentContainer" border="0" width="600" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td style="padding: 9px 18px 9px 18px;">
<table class="mcnTextContentContainer" style="background-color: #ffffff;" border="0" width="100%" cellspacing="0" cellpadding="18">
<tbody>
<tr>
<td class="mcnTextContent" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; padding: 36px; word-break: break-word;" valign="top">
<div style="text-align: left; word-wrap: break-word;">Thank you for joining [app_name]! To finish signing up, you just need to confirm your account. <br /> <br />To confirm your email, please click this link:&nbsp;
[confirmation_link] <br /> <br />Thanks! <br />The [app_name] Team
<div class="footer" style="font-size: 0.7em; padding: 0px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: right; color: #777777; line-height: 14px; margin-top: 36px;">&copy;
 [app_name]</div>
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- // END BODY --></td>
</tr>
</tbody>
</table>
<!-- // END TEMPLATE --></td>
</tr>
</tbody>
</table>
</center>',
				'status'     => '0',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'Create User',
				'type_id' => '2',
				'subject' => 'Actualise: New Account',
				'body'    => '<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
     /* Layout ------------------------------ */
    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}
    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}
    /* Masthead ----------------------- */
    .email-masthead{padding: 25px 0; text-align: center;}
    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}
    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}
    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}
    .email-body_cell{padding: 35px;}
    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}
    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}
    /* Body ------------------------------ */
    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}
    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}
    /* Type ------------------------------ */

    anchor => color: #3869D4;,
    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}
    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}
    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}
    .paragraph-center{text-align: center;}
    /* Buttons ------------------------------ */
    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4;
 border-radius: 3px;
 color: #ffffff;
 font-size: 15px;
 line-height: 25px;
                 text-align: center;
 text-decoration: none;
 -webkit-text-size-adjust: none;
}

    .button--green {background-color: #22BC66;}
    .button--red {background-color: #dc4d2f;}
    .button--blue {background-color: #3869D4;}
    .textfont {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">
                               [app_name]
                            </div>
                        </td>
                    </tr>
                  <!-- Email Body -->

                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">
                                         <!-- Greeting -->
                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">
                                           Hello [user],
                                          </h1>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          </p>
                                            <!-- Intro -->
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Congratulations, you have been registered as backend user for Actualise Online Platform. Please keep this email for your records.
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           Your login details are:
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           Email Address: [email]
                                          </p>
                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Password: [password]
                                          </p>
                                           <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                            Please click on the link below to log in.
                                          </p>
                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                              [login_link]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Thanks! <br /> The [app_name] Team
                                          </p>
                                      </td>
                                  </tr>
                                    <!-- Footer -->
                                  <tr>
                                    <td>
                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                          <tr>
                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">
                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                      &copy;2018
                                                      <a style="color:#3869D4;">[app_name]</a>.
                                                     All Rights Reserved.
                                                  </p>
                                                </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
  </html>',
				'status'     => '1',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'Activate / Deactivate User',
				'type_id' => '3',
				'subject' => 'Actualise: Account [status]',
				'body'    => '<center>
<table id="bodyTable" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td id="bodyCell" align="center" valign="top">
<table id="templateContainer" border="0" width="600" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td align="left" valign="top">
<table id="templateBody" border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td class="bodyContainer" style="padding-top: 9px; padding-bottom: 9px;" valign="top">
<table class="mcnBoxedTextBlock" border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody class="mcnBoxedTextBlockOuter">
<tr>
<td class="mcnBoxedTextBlockInner" valign="top">
<table class="mcnBoxedTextContentContainer" border="0" width="600" cellspacing="0" cellpadding="0" align="left">
<tbody>
<tr>
<td style="padding: 9px 18px 9px 18px;">
<table class="mcnTextContentContainer" style="background-color: #ffffff;" border="0" width="100%" cellspacing="0" cellpadding="18">
<tbody>
<tr>
<td class="mcnTextContent" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: left; padding: 36px; word-break: break-word;" valign="top">
<div style="text-align: left; word-wrap: break-word;">Your account has been [status].<br /> <br />Thanks! <br />The [app_name] Team
<div class="footer" style="font-size: 0.7em; padding: 0px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; text-align: right; color: #777777; line-height: 14px; margin-top: 36px;">&copy;
 [app_name]</div>
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!-- // END BODY --></td>
</tr>
</tbody>
</table>
<!-- // END TEMPLATE --></td>
</tr>
</tbody>
</table>
</center>',
				'status'     => '0',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'Change Password',
				'type_id' => '4',
				'subject' => 'Actualise: Password Changed',
				'body'    => '<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
     /* Layout ------------------------------ */
    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}
    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}
    /* Masthead ----------------------- */
    .email-masthead{padding: 25px 0; text-align: center;}
    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}
    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}
    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}
    .email-body_cell{padding: 35px;}
    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}
    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}
    /* Body ------------------------------ */
    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}
    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}
    /* Type ------------------------------ */

    anchor => color: #3869D4;,
    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}
    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}
    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}
    .paragraph-center{text-align: center;}
    /* Buttons ------------------------------ */
    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4;
 border-radius: 3px;
 color: #ffffff;
 font-size: 15px;
 line-height: 25px;
                 text-align: center;
 text-decoration: none;
 -webkit-text-size-adjust: none;
}

    .button--green {background-color: #22BC66;}
    .button--red {background-color: #dc4d2f;}
    .button--blue {background-color: #3869D4;}
    .textfont {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">
                               [app_name]
                            </div>
                        </td>
                    </tr>
                  <!-- Email Body -->

                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">
                                         <!-- Greeting -->
                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">
                                           Hello [client],
                                          </h1>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          </p>
                                            <!-- Intro -->
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Your password has been changed successfully.
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           New password: [password]
                                          </p>
                                           <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                            Please click on the link below to log in with your new password.
                                          </p>
                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                              [login_link]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Thanks! <br /> The [app_name] Team
                                          </p>
                                      </td>
                                  </tr>
                                    <!-- Footer -->
                                  <tr>
                                    <td>
                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                          <tr>
                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">
                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                      &copy;2018
                                                      <a style="color:#3869D4;">[app_name]</a>.
                                                     All Rights Reserved.
                                                  </p>
                                                </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
  </html>',
				'status'     => '1',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'Create Client',
				'type_id' => '5',
				'subject' => 'Actualise: New Account',
				'body'    => '<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
     /* Layout ------------------------------ */
    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}
    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}
    /* Masthead ----------------------- */
    .email-masthead{padding: 25px 0; text-align: center;}
    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}
    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}
    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}
    .email-body_cell{padding: 35px;}
    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}
    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}
    /* Body ------------------------------ */
    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}
    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}
    /* Type ------------------------------ */

    anchor => color: #3869D4;,
    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}
    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}
    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}
    .paragraph-center{text-align: center;}
    /* Buttons ------------------------------ */
    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4;
 border-radius: 3px;
 color: #ffffff;
 font-size: 15px;
 line-height: 25px;
                 text-align: center;
 text-decoration: none;
 -webkit-text-size-adjust: none;
}

    .button--green {background-color: #22BC66;}
    .button--red {background-color: #dc4d2f;}
    .button--blue {background-color: #3869D4;}
    .textfont {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">
                               [app_name]
                            </div>
                        </td>
                    </tr>
                  <!-- Email Body -->

                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">
                                         <!-- Greeting -->
                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">
                                           Hello [client],
                                          </h1>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          </p>
                                            <!-- Intro -->
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Congratulations, your account has been created with Actualise Online Platform successfully. Please keep this email for your records.
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           Your login details are:
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           Email Address: [email]
                                          </p>
                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Password: [password]
                                          </p>
                                           <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                            Please click on the link below to log in.
                                          </p>
                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                              [login_link]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Thanks! <br /> The [app_name] Team
                                          </p>
                                      </td>
                                  </tr>
                                    <!-- Footer -->
                                  <tr>
                                    <td>
                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                          <tr>
                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">
                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                      &copy;2018
                                                      <a style="color:#3869D4;">[app_name]</a>.
                                                     All Rights Reserved.
                                                  </p>
                                                </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
  </html>',
				'status'     => '1',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'Questionnaires',
				'type_id' => '6',
				'subject' => 'Actualise: New Action For You',
				'body'    => '<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
     /* Layout ------------------------------ */
    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}
    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}
    /* Masthead ----------------------- */
    .email-masthead{padding: 25px 0; text-align: center;}
    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}
    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}
    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}
    .email-body_cell{padding: 35px;}
    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}
    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}
    /* Body ------------------------------ */
    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}
    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}
    /* Type ------------------------------ */

    anchor => color: #3869D4;,
    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}
    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}
    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}
    .paragraph-center{text-align: center;}
    /* Buttons ------------------------------ */
    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4;
 border-radius: 3px;
 color: #ffffff;
 font-size: 15px;
 line-height: 25px;
                 text-align: center;
 text-decoration: none;
 -webkit-text-size-adjust: none;
}

    .button--green {background-color: #22BC66;}
    .button--red {background-color: #dc4d2f;}
    .button--blue {background-color: #3869D4;}
    .textfont {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">
                               [app_name]
                            </div>
                        </td>
                    </tr>
                  <!-- Email Body -->

                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">
                                         <!-- Greeting -->
                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">
                                           Hello [client],
                                          </h1>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          </p>
                                            <!-- Intro -->
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             A new action has been created for you by the Actualise Team. Please click on the link below to respond to this action.
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           Assessment Title: [title]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           Action Link: [session_link]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Thanks! <br />The [app_name] Team
                                          </p>
                                      </td>
                                  </tr>
                                    <!-- Footer -->
                                  <tr>
                                    <td>
                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                          <tr>
                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">
                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                      &copy;2018
                                                      <a style="color:#3869D4;">[app_name]</a>.
                                                     All Rights Reserved.
                                                  </p>
                                                </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
  </html>
',
				'status'     => '1',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'New Resource',
				'type_id' => '7',
				'subject' => 'Actualise: New Resource',
				'body'    => '<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
     /* Layout ------------------------------ */
    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}
    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}
    /* Masthead ----------------------- */
    .email-masthead{padding: 25px 0; text-align: center;}
    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}
    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}
    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}
    .email-body_cell{padding: 35px;}
    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}
    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}
    /* Body ------------------------------ */
    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}
    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}
    /* Type ------------------------------ */

    anchor => color: #3869D4;,
    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}
    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}
    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}
    .paragraph-center{text-align: center;}
    /* Buttons ------------------------------ */
    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4;
 border-radius: 3px;
 color: #ffffff;
 font-size: 15px;
 line-height: 25px;
                 text-align: center;
 text-decoration: none;
 -webkit-text-size-adjust: none;
}

    .button--green {background-color: #22BC66;}
    .button--red {background-color: #dc4d2f;}
    .button--blue {background-color: #3869D4;}
    .textfont {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">
                               [app_name]
                            </div>
                        </td>
                    </tr>
                  <!-- Email Body -->

                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">
                                         <!-- Greeting -->
                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">
                                           Hello [client],
                                          </h1>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          </p>
                                            <!-- Intro -->
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             We are sending you a resource for your reveiw. Please login and check for more details.
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          Resource Title: [title]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          Resource Link: [link]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Thanks! <br />The [app_name] Team
                                          </p>
                                      </td>
                                  </tr>
                                    <!-- Footer -->
                                  <tr>
                                    <td>
                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                          <tr>
                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">
                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                      &copy;2018
                                                      <a style="color:#3869D4;">[app_name]</a>.
                                                     All Rights Reserved.
                                                  </p>
                                                </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
  </html>
',
				'status'     => '1',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'Answers Submitted by Client',
				'type_id' => '8',
				'subject' => 'Actualise: Answers Submitted by Client',
				'body'    => '<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
     /* Layout ------------------------------ */
    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}
    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}
    /* Masthead ----------------------- */
    .email-masthead{padding: 25px 0; text-align: center;}
    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}
    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}
    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}
    .email-body_cell{padding: 35px;}
    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}
    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}
    /* Body ------------------------------ */
    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}
    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}
    /* Type ------------------------------ */

    anchor => color: #3869D4;,
    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}
    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}
    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}
    .paragraph-center{text-align: center;}
    /* Buttons ------------------------------ */
    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4;
 border-radius: 3px;
 color: #ffffff;
 font-size: 15px;
 line-height: 25px;
                 text-align: center;
 text-decoration: none;
 -webkit-text-size-adjust: none;
}

    .button--green {background-color: #22BC66;}
    .button--red {background-color: #dc4d2f;}
    .button--blue {background-color: #3869D4;}
    .textfont {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">
                               [app_name]
                            </div>
                        </td>
                    </tr>
                  <!-- Email Body -->

                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">
                                         <!-- Greeting -->
                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">
                                           Hello [users],
                                          </h1>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          </p>
                                            <!-- Intro -->
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                            Your client has submitted answers to the questions. [session_link] to review.
                                          </p>
                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                            Assessment Title: [title]
                                          </p>
                                           <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                              Assessment Date : [session_date]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                               Clinic Service : [intervention]
                                          </p>
                                            <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                               Question Pattern: [question_type]
                                          </p>
                                           <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Submitted On : [submited_date]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Thanks! <br />The [app_name] Team
                                          </p>
                                      </td>
                                  </tr>
                                    <!-- Footer -->
                                  <tr>
                                    <td>
                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                          <tr>
                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">
                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                      &copy;2018
                                                      <a style="color:#3869D4;">[app_name]</a>.
                                                     All Rights Reserved.
                                                  </p>
                                                </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
  </html>
',
				'status'     => '1',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'Cinic Service - Completed',
				'type_id' => '9',
				'subject' => 'Actualise: Cinic Service Completed',
				'body'    => '<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
     /* Layout ------------------------------ */
    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}
    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}
    /* Masthead ----------------------- */
    .email-masthead{padding: 25px 0; text-align: center;}
    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}
    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}
    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}
    .email-body_cell{padding: 35px;}
    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}
    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}
    /* Body ------------------------------ */
    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}
    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}
    /* Type ------------------------------ */

    anchor => color: #3869D4;,
    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}
    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}
    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}
    .paragraph-center{text-align: center;}
    /* Buttons ------------------------------ */
    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4;
 border-radius: 3px;
 color: #ffffff;
 font-size: 15px;
 line-height: 25px;
                 text-align: center;
 text-decoration: none;
 -webkit-text-size-adjust: none;
}

    .button--green {background-color: #22BC66;}
    .button--red {background-color: #dc4d2f;}
    .button--blue {background-color: #3869D4;}
    .textfont {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">
                               [app_name]
                            </div>
                        </td>
                    </tr>
                  <!-- Email Body -->

                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">
                                         <!-- Greeting -->
                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">
                                           Hello [client],
                                          </h1>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          </p>
                                            <!-- Intro -->
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             It looks like your time with us at Actualise has hit a big milestone! Clinic service - [intervention_service] is completed now. Could you spare a few moments to give us some feedback; your comments are very valuable to us.
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           Feedback: [feedback_link]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           Testimonial: [testimonial_link]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Thanks! <br /> The [app_name] Team
                                          </p>
                                      </td>
                                  </tr>
                                    <!-- Footer -->
                                  <tr>
                                    <td>
                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                          <tr>
                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">
                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                      &copy;2018
                                                      <a style="color:#3869D4;">[app_name]</a>.
                                                     All Rights Reserved.
                                                  </p>
                                                </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
  </html>',
				'status'     => '1',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'Resend Resource',
				'type_id' => '10',
				'subject' => 'Actualise: Resend Resource',
				'body'    => '<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
     /* Layout ------------------------------ */
    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}
    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}
    /* Masthead ----------------------- */
    .email-masthead{padding: 25px 0; text-align: center;}
    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}
    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}
    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}
    .email-body_cell{padding: 35px;}
    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}
    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}
    /* Body ------------------------------ */
    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}
    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}
    /* Type ------------------------------ */

    anchor => color: #3869D4;,
    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}
    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}
    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}
    .paragraph-center{text-align: center;}
    /* Buttons ------------------------------ */
    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4;
 border-radius: 3px;
 color: #ffffff;
 font-size: 15px;
 line-height: 25px;
                 text-align: center;
 text-decoration: none;
 -webkit-text-size-adjust: none;
}

    .button--green {background-color: #22BC66;}
    .button--red {background-color: #dc4d2f;}
    .button--blue {background-color: #3869D4;}
    .textfont {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">
                               [app_name]
                            </div>
                        </td>
                    </tr>
                  <!-- Email Body -->

                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">
                                         <!-- Greeting -->
                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">
                                           Hello [client],
                                          </h1>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          </p>
                                            <!-- Intro -->
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             We are re-sending you a resource. Please login and check for more details.
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          Resource Title: [title]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          Resource Link: [link]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Thanks! <br />The [app_name] Team
                                          </p>
                                      </td>
                                  </tr>
                                    <!-- Footer -->
                                  <tr>
                                    <td>
                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                          <tr>
                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">
                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                      &copy;2018
                                                      <a style="color:#3869D4;">[app_name]</a>.
                                                     All Rights Reserved.
                                                  </p>
                                                </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
  </html>',
				'status'     => '1',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'Subjective Goals Submitted by Client',
				'type_id' => '11',
				'subject' => 'Actualise: Subjective Goals Submitted by Client',
				'body'    => '<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
     /* Layout ------------------------------ */
    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}
    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}
    /* Masthead ----------------------- */
    .email-masthead{padding: 25px 0; text-align: center;}
    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}
    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}
    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}
    .email-body_cell{padding: 35px;}
    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}
    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}
    /* Body ------------------------------ */
    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}
    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}
    /* Type ------------------------------ */

    anchor => color: #3869D4;,
    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}
    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}
    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}
    .paragraph-center{text-align: center;}
    /* Buttons ------------------------------ */
    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4;
 border-radius: 3px;
 color: #ffffff;
 font-size: 15px;
 line-height: 25px;
                 text-align: center;
 text-decoration: none;
 -webkit-text-size-adjust: none;
}

    .button--green {background-color: #22BC66;}
    .button--red {background-color: #dc4d2f;}
    .button--blue {background-color: #3869D4;}
    .textfont {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">
                               [app_name]
                            </div>
                        </td>
                    </tr>
                  <!-- Email Body -->

                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">
                                         <!-- Greeting -->
                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">
                                           Hello [users],
                                          </h1>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          </p>
                                            <!-- Intro -->
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Your client has submitted subjective goals. Please click on the link below to review.
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          Client ID: [client_id]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          Subjective Goals: [link]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Thanks! <br />The [app_name] Team
                                          </p>
                                      </td>
                                  </tr>
                                    <!-- Footer -->
                                  <tr>
                                    <td>
                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                          <tr>
                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">
                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                      &copy;2018
                                                      <a style="color:#3869D4;">[app_name]</a>.
                                                     All Rights Reserved.
                                                  </p>
                                                </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
  </html>',
				'status'     => '1',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'Emergency protocol required',
				'type_id' => '12',
				'subject' => 'Actualise: Emergency Protocol Required',
				'body'    => '<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
     /* Layout ------------------------------ */
    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}
    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}
    /* Masthead ----------------------- */
    .email-masthead{padding: 25px 0; text-align: center;}
    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}
    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}
    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}
    .email-body_cell{padding: 35px;}
    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}
    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}
    /* Body ------------------------------ */
    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}
    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}
    /* Type ------------------------------ */

    anchor => color: #3869D4;,
    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}
    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}
    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}
    .paragraph-center{text-align: center;}
    /* Buttons ------------------------------ */
    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4;
 border-radius: 3px;
 color: #ffffff;
 font-size: 15px;
 line-height: 25px;
                 text-align: center;
 text-decoration: none;
 -webkit-text-size-adjust: none;
}

    .button--green {background-color: #22BC66;}
    .button--red {background-color: #dc4d2f;}
    .button--blue {background-color: #3869D4;}
    .textfont {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">
                               [app_name]
                            </div>
                        </td>
                    </tr>
                  <!-- Email Body -->

                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">
                                         <!-- Greeting -->
                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">
                                           Hello [users],
                                          </h1>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          </p>
                                            <!-- Intro -->
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Client Id - [client_id] has selected answer as [answer] in the BDI. Enact the <b>emergency protocol</b> immediately and contact your supervisor.
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           Client Information - [link]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                           <b>Emergency Protocol</b> - [emergency_protocol]
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Thanks! <br />The [app_name] Team
                                          </p>
                                      </td>
                                  </tr>
                                    <!-- Footer -->
                                  <tr>
                                    <td>
                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                          <tr>
                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">
                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                      &copy;2018
                                                      <a style="color:#3869D4;">[app_name]</a>.
                                                     All Rights Reserved.
                                                  </p>
                                                </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
  </html>',
				'status'     => '1',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'title'   => 'Threshold Plateaued',
				'type_id' => '13',
				'subject' => 'Actualise: Threshold Plateaued',
				'body'    => '<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
     /* Layout ------------------------------ */
    .body{ margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;}
    .email-wrapper {width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;}
    /* Masthead ----------------------- */
    .email-masthead{padding: 25px 0; text-align: center;}
    .email-masthead_name{font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;}
    .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;}
    .email-body_inner{width: auto; max-width: 570px; margin: 0 auto; padding: 0;}
    .email-body_cell{padding: 35px;}
    .email-footer{width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;}
    .email-footer_cell{color: #AEAEAE; padding: 35px; text-align: center;}
    /* Body ------------------------------ */
    .body_action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}
    .body_sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;}
    /* Type ------------------------------ */

    anchor => color: #3869D4;,
    .header-1{ margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;}
    .paragraph { margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;}
    .paragraph-sub{ margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;}
    .paragraph-center{text-align: center;}
    /* Buttons ------------------------------ */
    .button{display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4;
 border-radius: 3px;
 color: #ffffff;
 font-size: 15px;
 line-height: 25px;
                 text-align: center;
 text-decoration: none;
 -webkit-text-size-adjust: none;
}

    .button--green {background-color: #22BC66;}
    .button--red {background-color: #dc4d2f;}
    .button--blue {background-color: #3869D4;}
    .textfont {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <div style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;">
                               [app_name]
                            </div>
                        </td>
                    </tr>
                  <!-- Email Body -->

                    <tr>
                        <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                            <table style="width: 100%; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="100" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding: 35px;font-family: Arial,Helvetica Neue, Helvetica, sans-serif;">
                                         <!-- Greeting -->
                                           <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;line-height: 1.5em;">
                                           Hello [users],
                                          </h1>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                          </p>
                                            <!-- Intro -->
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Threshold have plateaued for Client Id - [client_id]. Please take appropriate actions or contact your supervisor to discuss.
                                          </p>
                                          <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                             Thanks! <br />The [app_name] Team
                                          </p>
                                      </td>
                                  </tr>
                                    <!-- Footer -->
                                  <tr>
                                    <td>
                                      <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                                          <tr>
                                               <td style="font-family: Arial,Helvetica Neue, Helvetica, sans-serif;color: #AEAEAE; padding: 35px; text-align: center;">
                                                  <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                      &copy;2018
                                                      <a style="color:#3869D4;">[app_name]</a>.
                                                     All Rights Reserved.
                                                  </p>
                                                </td>
                                          </tr>
                                      </table>
                                    </td>
                                  </tr>
                              </table>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>
  </html>',
				'status'     => '1',
				'created_by' => '1',
				'updated_by' => null,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]
		];
		DB::table(config('module.email_templates.table'))->insert($data);
	}

}