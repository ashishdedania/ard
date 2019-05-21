<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if (env('DB_CONNECTION') == 'mysql') {
            DB::table(config('access.settings_table'))->truncate();
        }

        $data = [
            [
                'seo_title' => env('APP_NAME'),
                'from_email' => "sadmin-actualise@yopmail.com"
            ],
        ];

        DB::table(config('access.settings_table'))->insert($data);
    }

}
