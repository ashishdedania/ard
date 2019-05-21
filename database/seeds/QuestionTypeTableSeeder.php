<?php

use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionTypeTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    use DisableForeignKeys,
        TruncateTable;

    public function run() {
        $this->disableForeignKeys();
        DB::table('question_type')->truncate();
        DB::table('question_type')->insert(
                [
                    [
                        'id' => 1,
                        'question_type' => 'Beck Depression Inventory (BDI)'
                    ],
                    [
                        'id' => 2,
                        'question_type' => 'Clinical Outcomes in Routine Evaluation (CORE)'
                    ],
                    [
                        'id' => 3,
                        'question_type' => 'Strengths and Difficulties Questionnaire (SDQ)'
                    ],
                    [
                        'id' => 4,
                        'question_type' => 'Screen for Child Anxiety Related Disorders (SCARED)'
                    ],
                ]
        );
        $this->enableForeignKeys();
    }

}
