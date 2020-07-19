<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use App\Caregiver;
use App\Securityprovider;
use App\Transporter;
use Hash as Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create([
            'name' => 'admin'
        ]);

        $role2 = Role::create([
            'name' => 'caregiver'
        ]);


        $role3 = Role::create([
            'name' => 'pharmacy'
        ]);

        $role4 = Role::create([
            'name' => 'securityprovider'
        ]);

        $role5 = Role::create([
            'name' => 'transporter'
        ]);

        $role6 = Role::create([
            'name' => 'client'
        ]);
    }

}
