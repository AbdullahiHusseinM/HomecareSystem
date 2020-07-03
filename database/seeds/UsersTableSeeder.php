<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use App\Caregiver;
use App\Securityprovider;
use App\Transporter;
use Hash as Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'admin user'
        ]);

        $admin->user()->create([
            'password' => Hash::make('password'), 
            'email' => 'admin@site.com',
            'role' => 'admin'
        ]);

        $caregiver = Caregiver::create([
            'first_name' => 'caregiver1',
            'last_name' => 'caregiver2',
            'surname' => 'caregiver3',
            'gender' => 'male',
            'identification_number' => 123456789,
            'phone_number' => 123456789,
            'job_title' => 'Nurse',
            
            'physical_location' => 'Nairobi'
        ]);
        $caregiver->user()->create([
            'password' => Hash::make('password'), 
            'email' => 'caregiver@site.com',
            'role' => 'caregiver'
        ]);
        $securityprovider = Securityprovider::create([
            'name' => 'abdul',
            'registration_number' => 123445667,
            'location'=>'Nairobi',
            'contact_first_name' => 'contactone',
            'contact_last_name'=> 'contacttwo',
            'contact_phone_number'=> '0744444444',
            'email_address' => 'abdul@test.com'
        ]);
        $securityprovider->user()->create([
            'password' => Hash::make('password'), 
            'email' => 'securityprovider@site.com',
            'role' => 'securityprovider'
        ]);

        $transporter = Transporter::create([
        'first_name' => 'john',
        'last_name' => 'james',
        'surname' => 'job',
        'identification_number'=> 123456789,
        'location'=> 'Nairobi',
        'email' => 'transporter@mail.com'
        ]);
        $transporter->user()->create([
            'password' => Hash::make('password'), 
            'email' => 'transporter@site.com',
            'role' => 'transporter'
        ]);

    }
}
