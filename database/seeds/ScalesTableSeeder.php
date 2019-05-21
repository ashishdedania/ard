<?php

use Carbon\Carbon as Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScalesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    use DisableForeignKeys,
        TruncateTable;

    public function run() {
        $this->disableForeignKeys();
        $this->truncate('behaviour_scale');
        $scales = [
            /* SDQ Session Score starts */

            // Emotional Problems Score:
            [
                'behaviour_id' => 1,
                'scale' => 'Close to average',
                'scale_from' => 0,
                'scale_to' => 4,
            ],
            [
                'behaviour_id' => 1,
                'scale' => 'Slightly raised',
                'scale_from' => 5,
                'scale_to' => 5,
            ],
            [
                'behaviour_id' => 1,
                'scale' => 'High',
                'scale_from' => 6,
                'scale_to' => 6,
            ],
            [
                'behaviour_id' => 1,
                'scale' => 'Very high',
                'scale_from' => 7,
                'scale_to' => 10,
            ],
            //Conduct Problems Score:
            [
                'behaviour_id' => 2,
                'scale' => 'Close to average',
                'scale_from' => 0,
                'scale_to' => 3,
            ],
            [
                'behaviour_id' => 2,
                'scale' => 'Slightly raised',
                'scale_from' => 4,
                'scale_to' => 4,
            ],
            [
                'behaviour_id' => 2,
                'scale' => 'High',
                'scale_from' => 5,
                'scale_to' => 5,
            ],
            [
                'behaviour_id' => 2,
                'scale' => 'Very high',
                'scale_from' => 6,
                'scale_to' => 10,
            ],
            //Hyperactivity Score
            [
                'behaviour_id' => 3,
                'scale' => 'Close to average',
                'scale_from' => 0,
                'scale_to' => 5,
            ],
            [
                'behaviour_id' => 3,
                'scale' => 'Slightly raised',
                'scale_from' => 6,
                'scale_to' => 6,
            ],
            [
                'behaviour_id' => 3,
                'scale' => 'High',
                'scale_from' => 7,
                'scale_to' => 7,
            ],
            [
                'behaviour_id' => 3,
                'scale' => 'Very high',
                'scale_from' => 8,
                'scale_to' => 10,
            ],
            //Peer Problems Score
            [
                'behaviour_id' => 4,
                'scale' => 'Close to average',
                'scale_from' => 0,
                'scale_to' => 2,
            ],
            [
                'behaviour_id' => 4,
                'scale' => 'Slightly raised',
                'scale_from' => 3,
                'scale_to' => 3,
            ],
            [
                'behaviour_id' => 4,
                'scale' => 'High',
                'scale_from' => 4,
                'scale_to' => 4,
            ],
            [
                'behaviour_id' => 4,
                'scale' => 'Very high',
                'scale_from' => 5,
                'scale_to' => 10,
            ],
            //Strengths/ Prosocial
            [
                'behaviour_id' => 5,
                'scale' => 'Close to average',
                'scale_from' => 7,
                'scale_to' => 10,
            ],
            [
                'behaviour_id' => 5,
                'scale' => 'Slightly raised',
                'scale_from' => 6,
                'scale_to' => 6,
            ],
            [
                'behaviour_id' => 5,
                'scale' => 'Low',
                'scale_from' => 5,
                'scale_to' => 5,
            ],
            [
                'behaviour_id' => 5,
                'scale' => 'Very low',
                'scale_from' => 0,
                'scale_to' => 4,
            ],
            //Total Difficluties
            [
                'behaviour_id' => 6,
                'scale' => 'Close to average',
                'scale_from' => 0,
                'scale_to' => 14,
            ],
            [
                'behaviour_id' => 6,
                'scale' => 'Slightly raised',
                'scale_from' => 15,
                'scale_to' => 17,
            ],
            [
                'behaviour_id' => 6,
                'scale' => 'High',
                'scale_from' => 18,
                'scale_to' => 19,
            ],
            [
                'behaviour_id' => 6,
                'scale' => 'Very high',
                'scale_from' => 20,
                'scale_to' => 40,
            ],
            /* SDQ Session Score ends */


            /* SCARED Session Score starts */

            //Panic Disorder or Significant Somatic Symptoms
            [
                'behaviour_id' => 7,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 6,
            ],
            [
                'behaviour_id' => 7,
                'scale' => 'Clinical Range',
                'scale_from' => 7,
                'scale_to' => 50,
            ],
            //Generalised Anxiety Disorder
            [
                'behaviour_id' => 8,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 8,
            ],
            [
                'behaviour_id' => 8,
                'scale' => 'Clinical Range',
                'scale_from' => 9,
                'scale_to' => 50,
            ],
            //Separation Anxiety
            [
                'behaviour_id' => 9,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 4,
            ],
            [
                'behaviour_id' => 9,
                'scale' => 'Clinical Range',
                'scale_from' => 5,
                'scale_to' => 50,
            ],
            //Social Anxity Disorder
            [
                'behaviour_id' => 10,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 7,
            ],
            [
                'behaviour_id' => 10,
                'scale' => 'Clinical Range',
                'scale_from' => 8,
                'scale_to' => 50,
            ],
            //Significant School Avoidance
            [
                'behaviour_id' => 11,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 2,
            ],
            [
                'behaviour_id' => 11,
                'scale' => 'Clinical Range',
                'scale_from' => 3,
                'scale_to' => 50,
            ],
            //Total Scale
            [
                'behaviour_id' => 12,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 24,
            ],
            [
                'behaviour_id' => 12,
                'scale' => 'Clinical Range',
                'scale_from' => 25,
                'scale_to' => 100,
            ],
            /* SCARED Session Score ends */

            /* CORE Session Score starts */

            // Well Being
            [
                'behaviour_id' => 13,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 1.36,
            ],
            [
                'behaviour_id' => 13,
                'scale' => 'Clinical Range',
                'scale_from' => 1.37,
                'scale_to' => 10,
            ],
            // Problems or Symptoms
            [
                'behaviour_id' => 14,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 1.43,
            ],
            [
                'behaviour_id' => 14,
                'scale' => 'Clinical Range',
                'scale_from' => 1.44,
                'scale_to' => 10,
            ],
            // Functioning
            [
                'behaviour_id' => 15,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 1.28,
            ],
            [
                'behaviour_id' => 15,
                'scale' => 'Clinical Range',
                'scale_from' => 1.29,
                'scale_to' => 10,
            ],
            // Risk
            [
                'behaviour_id' => 16,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 0.42,
            ],
            [
                'behaviour_id' => 16,
                'scale' => 'Clinical Range',
                'scale_from' => 0.43,
                'scale_to' => 10,
            ],
            // Total
            [
                'behaviour_id' => 17,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 1.18,
            ],
            [
                'behaviour_id' => 17,
                'scale' => 'Clinical Range',
                'scale_from' => 1.19,
                'scale_to' => 10,
            ],
            // Total minus Risk
            [
                'behaviour_id' => 18,
                'scale' => 'Normal Range',
                'scale_from' => 0,
                'scale_to' => 1.35,
            ],
            [
                'behaviour_id' => 18,
                'scale' => 'Clinical Range',
                'scale_from' => 1.36,
                'scale_to' => 10,
            ],
                /* CORE Session Score ends */
        ];
        DB::table('behaviour_scale')->insert($scales);
        $this->enableForeignKeys();
    }

}
