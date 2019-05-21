<?php

use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PsychologicalConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    use DisableForeignKeys,
        TruncateTable;
    public function run()
    {
        $this->disableForeignKeys();
        DB::table('psycological_types')->truncate();
        DB::table('psycological_types')->insert(
            [
                ['name' => 'Anxiety'],
                ['name' => 'Panic Disorder'],
                ['name' => 'Depression'],
                ['name' => 'Learning Issues'],
            ]
        );
        $this->enableForeignKeys();
    }
}
