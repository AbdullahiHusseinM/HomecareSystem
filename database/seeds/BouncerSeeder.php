<?php


use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Bouncer::allow('admin')->everything();

        
        Bouncer::allow('caregiver')->to([
            'store-caregiver-profile',
            'list-caregiver-profile', 
            'show-caregiver-profile', 
            'update-caregiver-profile', 
            'delete-caregiver-profile']);

        Bouncer::allow('transporter')->to([
            'store-transporter-profile',
            'list-transporter-profile', 
            'show-transporter-profile', 
            'update-transporter-profile', 
            'delete-transporter-profile']);

        
        }
}
