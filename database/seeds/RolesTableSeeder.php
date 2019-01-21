<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    private $roles = [
        [
            'role' => 'owner',
        ],
        [
            'role' => 'employee', 
        ],
        [
            'role' => 'manager', 
        ],
        [
            'role' => 'admin', 
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role) {
            DB::table('roles')->insert($role);
        }
    }
}
