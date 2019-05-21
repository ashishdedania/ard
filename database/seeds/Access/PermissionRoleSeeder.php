<?php

use App\Models\Access\Role\Role;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleSeeder.
 */
class PermissionRoleSeeder extends Seeder {

    use DisableForeignKeys,
        TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run() {
        $this->disableForeignKeys();
        $this->truncate(config('access.permission_role_table'));

        /*
         * Assign permission to admin role
         */
        $executivePermission = [
            1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 67, // Access Management
            49, 50, 51, 52, // Client Management
            53, 54, 55, 56, // Sessions
            57, 58, 59, // Clinic Services
            60, 61, 62, // Psychological Condition
            63, 64, 65, 66, // knowledge base
            68, // Feedbacks
            69, 70, 71, 72, // Question Bank
            73, // Testimonials
            74, 75, 76, 77, 78, 79, 80, // Reports
            81,//master managment
            82,83,84 // Question Type Management
        ];
        Role::find(2)->permissions()->sync($executivePermission);

        /*
         * Assign permission to subadmin role
         */
        Role::find(3)->permissions()->sync([2, 70]);

        /*
         * Assing permission to client role.
         */
        $clientPermission = [
            1, 67, // change password
            53, // Sessions
            66, // Knowledge Base
            68, // Feedback
            73, // testimonials
        ];
        Role::find(4)->permissions()->sync($clientPermission);
        $this->enableForeignKeys();
    }

}
