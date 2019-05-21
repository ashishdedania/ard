<?php

use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BehaviourTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    use DisableForeignKeys,
        TruncateTable;

    public function run() {
        $this->disableForeignKeys();
        $this->truncate('behaviour');
        $behaviour = [
            // sdq
            [
                'question_type_id' => 3,
                'behaviour' => 'Emotional Problems',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 3,
                'behaviour' => 'Conduct Problems',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 3,
                'behaviour' => 'Hyperactivity',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 3,
                'behaviour' => 'Peer Problems',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 3,
                'behaviour' => 'Strengths/ Prosocial',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 3,
                'behaviour' => 'Total Difficulties',
                'is_behaviour' => 0
            ],
            // scared
            [
                'question_type_id' => 4,
                'behaviour' => 'Panic Disorder or Significant Somatic Symptoms',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 4,
                'behaviour' => 'Generalised Anxiety Disorder',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 4,
                'behaviour' => 'Separation Anxiety',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 4,
                'behaviour' => 'Social Anxiety Disorder',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 4,
                'behaviour' => 'Significant School Avoidance',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 4,
                'behaviour' => 'Total Scale',
                'is_behaviour' => 0
            ],
            //core
            [
                'question_type_id' => 2,
                'behaviour' => 'Well Being',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 2,
                'behaviour' => 'Problems or Symptoms',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 2,
                'behaviour' => 'Functioning',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 2,
                'behaviour' => 'Risk',
                'is_behaviour' => 1
            ],
            [
                'question_type_id' => 2,
                'behaviour' => 'Total',
                'is_behaviour' => 0
            ],
            [
                'question_type_id' => 2,
                'behaviour' => 'Total Minus Risk',
                'is_behaviour' => 2
            ],
        ];
        DB::table('behaviour')->insert($behaviour);
        $this->enableForeignKeys();
    }

}
