<?php

use Database\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class AccessTableSeeder.
 */
class AccessTableSeeder extends Seeder {

    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->disableForeignKeys();

        /* pls do not push any changes to this file */
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(PermissionRoleSeeder::class);

        /*
          $this->call(UserTableSeeder::class);
          $this->call(RoleTableSeeder::class);
          $this->call(UserRoleSeeder::class);
          $this->call(PermissionTableSeeder::class);
          $this->call(PermissionRoleSeeder::class);
          $this->call(PermissionUserSeeder::class);
         */

        $this->enableForeignKeys();
    }

}
