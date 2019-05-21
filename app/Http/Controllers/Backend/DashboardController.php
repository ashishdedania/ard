<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\Backend\Access\User\ChangePasswordRequest;
use App\Models\Access\Permission\Permission;
use App\Models\Access\Role\Role;
use App\Models\Access\User\User;
use App\Models\Page\Page;
use App\Repositories\Backend\Access\User\UserRepository;

use Illuminate\Http\Request;
/**
 * Class DashboardController.
 */

class DashboardController extends Controller {

	/**
	 * @var UserRepository
	 */
	protected $users;

	/**
	 * @param UserRepository $users
	 */
	public function __construct(UserRepository $users) {
		$this->users = $users;
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function index() {
		if (getRoles()->id == env('CLIENT_ROLE_ID')) {
			$user           = access()->user();
			$client         = \DB::table('clients')->where('user_id', $user->id)->first();
			$pages          = Page::get()->toArray();
			$customquestion = \DB::table(config('module.custom_question.table'))->select('question_name', 'is_submited_by')->where('client_id', $client->id)->where('is_submited_by', 1)->get()->toArray();
			$questions      = \DB::table(config('module.custom_question.table'))->select('question_name', 'is_submited_by')->where('client_id', $client->id)->get()->toArray();

			return view('backend.dashboard', compact('user', 'client', 'pages', 'customquestion', 'questions'));
		}
		return view('backend.dashboard');
	}

	/**
	 * Used to display form for edit profile.
	 *
	 * @return view
	 */
	public function editProfile(Request $request) {
		if (getRoles()->id == env('CLIENT_ROLE_ID')) {
			$user   = access()->user();
			$client = \DB::table('clients')->where('user_id', $user->id)->first();
			return view('backend.access.users.client-profile-edit', compact('client'))->withLoggedInUser(access()->user());
		}
		return view('backend.access.users.profile-edit')
			->withLoggedInUser(access()->user());
	}

	/**
	 * Used to update profile.
	 *
	 * @return view
	 */
	public function updateProfile(Request $request) {
		$input            = $request->all();
		$userId           = access()->user()->id;
		$user             = User::find($userId);
		$user->first_name = $input['first_name'];
		$user->last_name  = $input['last_name'];
		$user->updated_by = access()->user()->id;

		if ($user         ->save()) {
			return redirect()->route('admin.client.change.password')
			                 ->withFlashSuccess(trans('labels.backend.profile_updated'));
		}
	}

	/**
	 * client profile update.
	 * @param $request.
	 * @return view.
	 */
	public function clientProfileUpdate(Request $request) {

		$input = $request->except('_token', '_method', 'Submit');
		if (!isset($input['dashboard'])) {
			//user update
			$userInfoUpdate = User::where('id', access()->user()->id)->update(['first_name' => $input['first_name'], 'last_name' => $input['last_name'], 'email' => $input['email']]);
		}
		$client = \DB::table(config('module.clients.table'))->where('user_id', access()->user()->id)->first();
		//client update
		$clientData                            = $request->except('_token', '_method', 'first_name', 'last_name', 'email', 'dashboard', 'Submit');
		$clientData['referred_by']             = isset($clientData['referred_by'])?implode(",", $clientData['referred_by']):NULL;
		$clientData['referred_by_description'] = isset($clientData['referred_by_description'])?$clientData['referred_by_description']:NULL;
		$clientData['medication_choise']       = isset($clientData['medication_choise'])?implode(",", $clientData['medication_choise']):NULL;
		$clientData['medication_description']  = isset($clientData['medication_description'])?$clientData['medication_description']:NULL;
		$clientData['dob']                     = isset($clientData['dob'])?date('Y-m-d', strtotime($clientData['dob'])):NULL;
		$clientData['termes_condition']        = isset($clientData['termes_condition'])?1:0;
		$clientData['disclaimer']              = isset($clientData['disclaimer'])?1:0;
		$clientData['information']             = isset($clientData['information'])?1:0;
		$clientData['gdpr']                    = isset($clientData['gdpr'])?1:0;
		$clientData['research']                = isset($clientData['research'])?1:0;
		$clientData['consent_data_collection'] = isset($clientData['consent_data_collection'])?1:0;
		$updateClientInfo                      = \DB::table(config('module.clients.table'))->where('id', $client->id)->update($clientData);
		$getClient                             = \DB::table(config('module.clients.table'))->where('user_id', access()->user()->id)->first();
		if (isset($input['dashboard'])) {
			return redirect()->route('admin.dashboard')->with(['data' => $getClient])
				->withFlashSuccess(trans('labels.backend.profile_updated'));
		} else {
			return redirect()->route('admin.profile.edit')
			                 ->withFlashSuccess(trans('labels.backend.profile_updated'));
		}
	}

	/**
	 *
	 * change password for customer.
	 * @param $user.
	 */
	public function resetPassword(User $user, Request $request) {
		return view('backend.access.users.change-password')
			->withUser($user);
	}

	/**
	 * @param User                      $user
	 * @param UpdateUserPasswordRequest $request
	 *
	 * @return mixed
	 */
	public function updateClientPassword(User $user, ChangePasswordRequest $request) {
		$update = $this->users->updatePassword($user, $request->all());
		return redirect()->route('admin.dashboard')
		                 ->withFlashSuccess(trans('alerts.backend.users.updated_password'));
		// return redirect()->route('admin.access.user.change-password', access()->user()->id)->withFlashSuccess(trans('alerts.backend.users.updated_password'));
	}

	/**
	 * This function is used to get permissions details by role.
	 *
	 * @param Request $request
	 */
	public function getPermissionByRole(Request $request) {
		if ($request->ajax()) {
			$role_id           = $request->get('role_id');
			$rsRolePermissions = Role::where('id', $role_id)->first();
			$rolePermissions   = $rsRolePermissions->permissions->pluck('display_name', 'id')->all();
			$permissions       = Permission::pluck('display_name', 'id')->all();
			ksort($rolePermissions);
			ksort($permissions);
			$results['permissions']     = $permissions;
			$results['rolePermissions'] = $rolePermissions;
			$results['allPermissions']  = $rsRolePermissions->all;
			echo json_encode($results);
			die;
		}
	}

}
