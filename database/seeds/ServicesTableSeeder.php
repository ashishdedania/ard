<?php

use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
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
        DB::table('services')->truncate();
        DB::table('services')->insert(
            [
                ['name' => 'Clinical Psychology'],
                ['name' => 'Positive Behaviour']
            ]
        );
        $this->enableForeignKeys();
    }
}
