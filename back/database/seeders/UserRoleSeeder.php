<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role = new UserRole();
        $user_role->ur_name = "Members";
        $user_role->save();

        $user_role = new UserRole();
        $user_role->ur_name = "Admin";
        $user_role->save();
    }
}
