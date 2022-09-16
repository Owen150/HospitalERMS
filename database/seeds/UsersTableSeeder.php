<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'superadmin@wkmh.com',
                'name' => 'Super Admin',
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '774345234',
                'user_type' => 'admin'
            ],

            [
                'email' => 'doc1@wkmh.com',
                'name' => "Doctor 1",
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '767035067',
                'user_type' => 'doctor_consultation'
            ],

            [
                'email' => 'doc2@wkmh.com',
                'name' => "Doctor 2",
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '767035067',
                'user_type' => 'doctor_consultation'
            ],

            [
                'email' => 'mwigai@wkmh.com',
                'name' => "Jackson Mwigai",
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '714193432',
                'user_type' => 'pharmacist'
            ],

            [
                'email' => 'sandy@wkmh.com',
                'name' => "Sandra Iresha",
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '713843043',
                'user_type' => 'lab'
            ],



            [
                'email' => 'cashier@wkmh.com',
                'name' => "Pamela James",
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '713843143',
                'user_type' => 'cashier'
            ],


            [
                'email' => 'hasikadilshani@wkmh.com',
                'name' => "hasika dilshani",
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '703169302',
                'user_type' => 'doctor_dialysis'
            ],

            [
                'email' => 'ouma@wkmh.com',
                'name' => "Osuka Ouma",
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '703169302',
                'user_type' => 'doctor_radiology_imaging'
            ],

            [
                'email' => 'mary@wkmh.com',
                'name' => "Mary Wanjiku",
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '703169302',
                'user_type' => 'reception'
            ],

            [
                'email' => 'jaffer@wkmh.com',
                'name' => "Jaffer Juma",
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '703169301',
                'user_type' => 'triage'
            ],

            //angalia from here 

            [
                'email' => 'dentist@wkmh.com',
                'name' => "Nicoloz Dentist",
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '703169301',
                'user_type' => 'doctor_dentist'
            ],

            [
                'email' => 'dimu@wkmh.com',
                'name' => "Dimu Doc",
                'password' => '$2y$10$T/AO49e7BmIC9aUG/33mAOdy9yDm/SUGUZC5zU.3Gtj4Lvvf.27My', //12345678
                'education' => 'acccccccccccccccccadc',
                'location' => 'sfavasdvasd',
                'skills' => 'asdasd',
                'notes' => '4a56sd4avas',
                'contactnumber' => '703169311',
                'user_type' => 'doctor_physiotherapy'
            ],

            

            
        ]);
    }
}
