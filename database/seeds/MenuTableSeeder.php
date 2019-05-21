<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table(config('access.menus_table'))->truncate();
		$menu = [
			'id'    => 1,
			'type'  => 'backend',
			'name'  => 'Backend Sidebar Menu',
			'items' => '[
  {
    "view_permission_id": "view-access-management",
    "icon": "fa-users",
    "open_in_new_tab": 0,
    "url_type": "route",
    "url": "",
    "name": "User Access",
    "id": 11,
    "content": "User Access",
    "children": [
      {
        "view_permission_id": "view-user-management",
        "open_in_new_tab": 0,
        "url_type": "route",
        "url": "admin.access.user.index",
        "name": "User Management",
        "id": 12,
        "content": "User Management"
      },
      {
        "view_permission_id": "view-role-management",
        "open_in_new_tab": 0,
        "url_type": "route",
        "url": "admin.access.role.index",
        "name": "Role Management",
        "id": 13,
        "content": "Role Management"
      },
      {
        "view_permission_id": "view-permission-management",
        "open_in_new_tab": 0,
        "url_type": "route",
        "url": "admin.access.permission.index",
        "name": "Permission Management",
        "id": 14,
        "content": "Permission Management"
      }
    ]
  },
  {
    "view_permission_id": "view-module",
    "icon": "fa-wrench",
    "open_in_new_tab": 0,
    "url_type": "route",
    "url": "admin.modules.index",
    "name": "Module",
    "id": 1,
    "content": "Module"
  },
  {
    "view_permission_id": "view-menu",
    "icon": "fa-bars",
    "open_in_new_tab": 0,
    "url_type": "route",
    "url": "admin.menus.index",
    "name": "Menus",
    "id": 3,
    "content": "Menus"
  },
  {
    "view_permission_id": "manage-client",
    "icon": "fa-users",
    "open_in_new_tab": 0,
    "url_type": "route",
    "url": "admin.clients.index",
    "name": "Clients",
    "id": 20,
    "content": "Clients"
  },

  {
    "view_permission_id": "manage-managesession",
    "icon": "fa fa-user-md ",
    "open_in_new_tab": 0,
    "url_type": "route",
    "url": "admin.managesessions.index",
    "name": "Assessments",
    "id": 24,
    "content": "Assessments"
  },
  {
    "id": 25,
    "name": "Resources",
    "url": "admin.knowledgebases.index",
    "url_type": "route",
    "open_in_new_tab": 0,
    "icon": "fa-book ",
    "view_permission_id": "manage-knowledgebase",
    "content": "Knowledge Bases"
  },

  {
    "view_permission_id": "view-report-permission",
    "icon": "fa-bar-chart",
    "open_in_new_tab": 0,
    "url_type": "static",
    "url": "",
    "name": "Reports",
    "id": 27,
    "content": "Reports",
    "children": [
      {
        "view_permission_id": "intervention-report",
        "icon": "",
        "open_in_new_tab": 0,
        "url_type": "route",
        "url": "admin.reports.charts",
        "name": "Client Assessment Progress",
        "id": 26,
        "content": "Client Assessment Progress"
      },
      {
        "view_permission_id": "threshold-report",
        "icon": "",
        "open_in_new_tab": 0,
        "url_type": "route",
        "url": "admin.reports.staff.threshold",
        "name": "Client NFT Thresholds",
        "id": 1,
        "content": "Client NFT Thresholds"
      },
      {
        "view_permission_id": "progress-report",
        "icon": "",
        "open_in_new_tab": 0,
        "url_type": "route",
        "url": "admin.reports.progress",
        "name": "Goal Progress",
        "id": 26,
        "content": "Goal Progress"
      },
      {
        "view_permission_id": "sdq-report",
        "icon": "",
        "open_in_new_tab": 0,
        "url_type": "route",
        "url": "admin.reports.sdq",
        "name": "SDQ Status ",
        "id": 26,
        "content": "SDQ Status"
      },
      {
        "view_permission_id": "scared-report",
        "icon": "",
        "open_in_new_tab": 0,
        "url_type": "route",
        "url": "admin.reports.scared",
        "name": "SCARED Status ",
        "id": 26,
        "content": "SCARED Status"
      },
      {
        "view_permission_id": "core-report",
        "icon": "",
        "open_in_new_tab": 0,
        "url_type": "route",
        "url": "admin.reports.core",
        "name": "CORE Status ",
        "id": 26,
        "content": "CORE Status"
      }
    ]
  }
  ,
  {
    "view_permission_id": "manage-feedback",
    "icon": "fa fa-commenting ",
    "open_in_new_tab": 0,
    "url_type": "route",
    "url": "admin.feedback.index",
    "name": "Feedback",
    "id": 26,
    "content": "Feedbacks"
  },
  {
    "view_permission_id": "manage-testimonial",
    "icon": "fa fa-quote-left",
    "open_in_new_tab": 0,
    "url_type": "route",
    "url": "admin.testimonials.index",
    "name": "Testimonials",
    "id": 28,
    "content": "Testimonials"
  },

  {
    "view_permission_id": "view-masters",
    "icon": "fa fa-cogs",
    "open_in_new_tab": 0,
    "url_type": "static",
    "url": "",
    "name": "Master Management",
    "id": 28,
    "content": "Master",
    "children": [
      {
        "id": 21,
        "name": "Clinic Services",
        "url": "admin.clinicalservices.index",
        "url_type": "route",
        "open_in_new_tab": 0,
        "view_permission_id": "manage-clinicalservice",
        "content": "Clinic Services"
      },
      {
        "id": 23,
        "name": "Psychological Conditions",
        "url": "admin.psycologicalconditiontypes.index",
        "url_type": "route",
        "open_in_new_tab": 0,
        "view_permission_id": "manage-psycologicalconditiontype",
        "content": "Psychological Conditions"
      },
      {
          "view_permission_id":"manage-questiontype",
          "open_in_new_tab":0,
          "url_type":"route",
          "url":"admin.questiontypes.index",
          "name":"Questionnaires",
          "id":1,
          "content":"Questionnaires"
       },
      {
        "id": 22,
        "name": "Questions",
        "url": "admin.questionbanks.index",
        "url_type": "route",
        "open_in_new_tab": 0,
        "view_permission_id": "manage-questionbank",
        "content": "Question Banks"
      },
      {
        "view_permission_id": "edit-settings",
        "open_in_new_tab": 0,
        "url_type": "route",
        "url": "admin.settings.edit?id=1",
        "name": "Settings",
        "id": 9,
        "content": "Settings"
      }
    ]
  }
]',
			'created_by' => 1,
			'created_at' => Carbon::now(),
		];

		DB::table(config('access.menus_table'))->insert($menu);
	}

}
