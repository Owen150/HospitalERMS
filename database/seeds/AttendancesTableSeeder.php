<?php

use App\Attendance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('attendances')->insert([

            ['user_id' => '1', 'start' => '2020-02-01 08:00:00', 'end' => '2020-02-02 16:56:11', 'created_at' => '2020-02-02 08:00:00', 'updated_at' => '2020-02-02 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-02 08:00:00', 'end' => '2020-02-02 16:56:11', 'created_at' => '2020-02-02 08:00:00', 'updated_at' => '2020-02-02 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-03 08:48:00', 'end' => '2020-02-03 16:56:11', 'created_at' => '2020-02-03 08:48:00', 'updated_at' => '2020-02-03 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-04 08:23:00', 'end' => '2020-02-04 16:56:11', 'created_at' => '2020-02-04 08:23:00', 'updated_at' => '2020-02-04 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-05 08:15:00', 'end' => '2020-02-05 16:56:11', 'created_at' => '2020-02-05 08:15:00', 'updated_at' => '2020-02-05 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-06 08:32:00', 'end' => '2020-02-06 16:56:11', 'created_at' => '2020-02-06 08:32:00', 'updated_at' => '2020-02-06 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-07 08:32:00', 'end' => '2020-02-07 14:56:11', 'created_at' => '2020-02-07 08:32:00', 'updated_at' => '2020-02-07 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-08 08:32:00', 'end' => '2020-02-08 16:56:11', 'created_at' => '2020-02-08 08:32:00', 'updated_at' => '2020-02-08 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-09 08:32:00', 'end' => '2020-02-09 16:56:11', 'created_at' => '2020-02-09 08:32:00', 'updated_at' => '2020-02-09 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-10 08:32:00', 'end' => '2020-02-10 13:56:11', 'created_at' => '2020-02-10 08:32:00', 'updated_at' => '2020-02-10 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-11 08:32:00', 'end' => '2020-02-11 16:56:11', 'created_at' => '2020-02-11 08:32:00', 'updated_at' => '2020-02-11 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-12 08:32:00', 'end' => '2020-02-12 17:56:11', 'created_at' => '2020-02-12 08:32:00', 'updated_at' => '2020-02-12 16:56:11'],
            ['user_id' => '1', 'start' => '2020-02-13 08:32:00', 'end' => '2020-02-13 16:56:11', 'created_at' => '2020-02-13 08:32:00', 'updated_at' => '2020-02-13 16:56:11'],
            ['user_id' => '1', 'start' => '2019-10-14 08:32:00', 'end' => '2019-10-14 16:56:11', 'created_at' => '2019-10-14 08:32:00', 'updated_at' => '2019-10-14 16:56:11'],
            ['user_id' => '1', 'start' => '2019-10-15 08:32:00', 'end' => '2019-10-15 12:56:11', 'created_at' => '2019-10-15 08:32:00', 'updated_at' => '2019-10-15 16:56:11'],
            ['user_id' => '1', 'start' => '2019-10-16 08:32:00', 'end' => '2019-10-16 16:56:11', 'created_at' => '2019-10-16 08:32:00', 'updated_at' => '2019-10-16 16:56:11'],
            ['user_id' => '1', 'start' => '2019-10-17 08:32:00', 'end' => '2019-10-17 11:56:11', 'created_at' => '2019-10-17 08:32:00', 'updated_at' => '2019-10-17 16:56:11'],
            ['user_id' => '1', 'start' => '2019-10-18 08:32:00', 'end' => '2019-10-18 11:56:11', 'created_at' => '2019-10-18 08:32:00', 'updated_at' => '2019-10-18 16:56:11'],
            ['user_id' => '1', 'start' => '2019-10-19 08:32:00', 'end' => '2019-10-19 15:56:11', 'created_at' => '2019-10-19 08:32:00', 'updated_at' => '2019-10-19 16:56:11'],
            ['user_id' => '1', 'start' => '2019-10-20 08:32:00', 'end' => '2019-10-20 15:56:11', 'created_at' => '2019-10-20 08:32:00', 'updated_at' => '2019-10-20 16:56:11'],
            ['user_id' => '1', 'start' => '2019-10-21 08:32:00', 'end' => '2019-10-21 15:56:11', 'created_at' => '2019-10-21 08:32:00', 'updated_at' => '2019-10-21 16:56:11'],
            ['user_id' => '1', 'start' => '2019-10-22 08:32:00', 'end' => '2019-10-22 15:56:11', 'created_at' => '2019-10-22 08:32:00', 'updated_at' => '2019-10-22 16:56:11'],
            ['user_id' => '1', 'start' => '2019-10-23 08:32:00', 'end' => '2019-10-23 15:56:11', 'created_at' => '2019-10-23 08:32:00', 'updated_at' => '2019-10-23 16:56:11'],
            ['user_id' => '1', 'start' => '2019-10-24 08:32:00', 'end' => '2019-10-24 15:56:11', 'created_at' => '2019-10-24 08:32:00', 'updated_at' => '2019-10-24 16:56:11'],

            ['user_id' => '1', 'start' => '2019-11-01 08:00:00', 'end' => '2019-11-02 16:56:11', 'created_at' => '2019-11-02 08:00:00', 'updated_at' => '2019-11-02 10:56:11'],
            ['user_id' => '1', 'start' => '2019-11-02 08:00:00', 'end' => '2019-11-02 16:56:11', 'created_at' => '2019-11-02 08:00:00', 'updated_at' => '2019-11-02 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-03 08:48:00', 'end' => '2019-11-03 16:56:11', 'created_at' => '2019-11-03 08:48:00', 'updated_at' => '2019-11-03 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-04 08:23:00', 'end' => '2019-11-04 16:56:11', 'created_at' => '2019-11-04 08:23:00', 'updated_at' => '2019-11-04 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-05 08:15:00', 'end' => '2019-11-05 16:56:11', 'created_at' => '2019-11-05 08:15:00', 'updated_at' => '2019-11-05 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-06 08:32:00', 'end' => '2019-11-06 16:56:11', 'created_at' => '2019-11-06 08:32:00', 'updated_at' => '2019-11-06 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-07 08:32:00', 'end' => '2019-11-07 14:56:11', 'created_at' => '2019-11-07 08:32:00', 'updated_at' => '2019-11-07 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-08 08:32:00', 'end' => '2019-11-08 16:56:11', 'created_at' => '2019-11-08 08:32:00', 'updated_at' => '2019-11-08 10:56:11'],
            ['user_id' => '1', 'start' => '2019-11-09 08:32:00', 'end' => '2019-11-09 16:56:11', 'created_at' => '2019-11-09 08:32:00', 'updated_at' => '2019-11-09 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-10 08:32:00', 'end' => '2019-11-10 13:56:11', 'created_at' => '2019-11-10 08:32:00', 'updated_at' => '2019-11-10 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-11 08:32:00', 'end' => '2019-11-11 16:56:11', 'created_at' => '2019-11-11 08:32:00', 'updated_at' => '2019-11-11 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-12 08:32:00', 'end' => '2019-11-12 17:56:11', 'created_at' => '2019-11-12 08:32:00', 'updated_at' => '2019-11-12 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-13 08:32:00', 'end' => '2019-11-13 16:56:11', 'created_at' => '2019-11-13 08:32:00', 'updated_at' => '2019-11-13 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-14 08:32:00', 'end' => '2019-11-14 16:56:11', 'created_at' => '2019-11-14 08:32:00', 'updated_at' => '2019-11-14 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-15 08:32:00', 'end' => '2019-11-15 12:56:11', 'created_at' => '2019-11-15 08:32:00', 'updated_at' => '2019-11-15 10:56:11'],
            ['user_id' => '1', 'start' => '2019-11-16 08:32:00', 'end' => '2019-11-16 16:56:11', 'created_at' => '2019-11-16 08:32:00', 'updated_at' => '2019-11-16 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-17 08:32:00', 'end' => '2019-11-17 11:56:11', 'created_at' => '2019-11-17 08:32:00', 'updated_at' => '2019-11-17 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-18 08:32:00', 'end' => '2019-11-18 11:56:11', 'created_at' => '2019-11-18 08:32:00', 'updated_at' => '2019-11-18 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-19 08:32:00', 'end' => '2019-11-19 15:56:11', 'created_at' => '2019-11-19 08:32:00', 'updated_at' => '2019-11-19 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-20 08:32:00', 'end' => '2019-11-20 15:56:11', 'created_at' => '2019-11-20 08:32:00', 'updated_at' => '2019-11-20 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-21 08:32:00', 'end' => '2019-11-21 15:56:11', 'created_at' => '2019-11-21 08:32:00', 'updated_at' => '2019-11-21 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-22 08:32:00', 'end' => '2019-11-22 15:56:11', 'created_at' => '2019-11-22 08:32:00', 'updated_at' => '2019-11-22 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-23 08:32:00', 'end' => '2019-11-23 15:56:11', 'created_at' => '2019-11-23 08:32:00', 'updated_at' => '2019-11-23 16:56:11'],
            ['user_id' => '1', 'start' => '2019-11-24 08:32:00', 'end' => '2019-11-24 15:56:11', 'created_at' => '2019-11-24 08:32:00', 'updated_at' => '2019-11-24 16:56:11'],

            ['user_id' => '2', 'start' => '2020-02-01 08:00:00', 'end' => '2020-02-02 16:56:11', 'created_at' => '2020-02-02 08:00:00', 'updated_at' => '2020-02-02 10:56:11'],
            ['user_id' => '2', 'start' => '2020-02-02 08:00:00', 'end' => '2020-02-02 16:56:11', 'created_at' => '2020-02-02 08:00:00', 'updated_at' => '2020-02-02 16:56:11'],
            ['user_id' => '2', 'start' => '2020-02-03 08:48:00', 'end' => '2020-02-03 16:56:11', 'created_at' => '2020-02-03 08:48:00', 'updated_at' => '2020-02-03 16:56:11'],
            ['user_id' => '2', 'start' => '2019-11-04 08:23:00', 'end' => '2019-11-04 16:56:11', 'created_at' => '2019-11-04 08:23:00', 'updated_at' => '2019-11-04 16:56:11'],
            ['user_id' => '2', 'start' => '2019-11-05 08:15:00', 'end' => '2019-11-05 16:56:11', 'created_at' => '2019-11-05 08:15:00', 'updated_at' => '2019-11-05 16:56:11'],
            ['user_id' => '2', 'start' => '2019-11-06 08:32:00', 'end' => '2019-11-06 16:56:11', 'created_at' => '2019-11-06 08:32:00', 'updated_at' => '2019-11-06 16:56:11'],
            ['user_id' => '2', 'start' => '2019-11-07 08:32:00', 'end' => '2019-11-07 14:56:11', 'created_at' => '2019-11-07 08:32:00', 'updated_at' => '2019-11-07 16:56:11'],


            ['user_id' => '3', 'start' => '2020-02-08 08:32:00', 'end' => '2020-02-08 16:56:11', 'created_at' => '2020-02-08 08:32:00', 'updated_at' => '2020-02-08 16:56:11'],
            ['user_id' => '3', 'start' => '2020-02-09 08:32:00', 'end' => '2020-02-09 16:56:11', 'created_at' => '2020-02-09 08:32:00', 'updated_at' => '2020-02-09 16:56:11'],
            ['user_id' => '3', 'start' => '2020-02-10 08:32:00', 'end' => '2020-02-10 13:56:11', 'created_at' => '2020-02-10 08:32:00', 'updated_at' => '2020-02-10 16:56:11'],
            ['user_id' => '3', 'start' => '2019-11-11 08:32:00', 'end' => '2019-11-11 16:56:11', 'created_at' => '2019-11-11 08:32:00', 'updated_at' => '2019-11-11 16:56:11'],
            ['user_id' => '3', 'start' => '2019-11-12 08:32:00', 'end' => '2019-11-12 17:56:11', 'created_at' => '2019-11-12 08:32:00', 'updated_at' => '2019-11-12 16:56:11'],
            ['user_id' => '3', 'start' => '2019-11-13 08:32:00', 'end' => '2019-11-13 16:56:11', 'created_at' => '2019-11-13 08:32:00', 'updated_at' => '2019-11-13 16:56:11'],
            ['user_id' => '3', 'start' => '2019-11-14 08:32:00', 'end' => '2019-11-14 16:56:11', 'created_at' => '2019-11-14 08:32:00', 'updated_at' => '2019-11-14 16:56:11'],
            ['user_id' => '4', 'start' => '2019-11-15 08:32:00', 'end' => '2019-11-15 12:56:11', 'created_at' => '2019-11-15 08:32:00', 'updated_at' => '2019-11-15 16:56:11'],
            ['user_id' => '4', 'start' => '2019-11-16 08:32:00', 'end' => '2019-11-16 16:56:11', 'created_at' => '2019-11-16 08:32:00', 'updated_at' => '2019-11-16 16:56:11'],
            ['user_id' => '4','start' => '2019-11-17 08:32:00', 'end' => '2019-11-17 11:56:11', 'created_at' => '2019-11-17 08:32:00', 'updated_at' => '2019-11-17 16:56:11'],
            ['user_id' => '4', 'start' => '2019-11-18 08:32:00', 'end' => '2019-11-18 11:56:11', 'created_at' => '2019-11-18 08:32:00', 'updated_at' => '2019-11-18 16:56:11'],

            ['user_id' => '5', 'start' => '2020-02-19 08:32:00', 'end' => '2020-02-19 15:56:11', 'created_at' => '2020-02-19 08:32:00', 'updated_at' => '2020-02-19 16:56:11'],
            ['user_id' => '5', 'start' => '2020-02-20 08:32:00', 'end' => '2020-02-20 15:56:11', 'created_at' => '2020-02-20 08:32:00', 'updated_at' => '2020-02-20 16:56:11'],
            ['user_id' => '5', 'start' => '2019-11-21 08:32:00', 'end' => '2019-11-21 15:56:11', 'created_at' => '2019-11-21 08:32:00', 'updated_at' => '2019-11-21 16:56:11'],
            ['user_id' => '5', 'start' => '2019-11-22 08:32:00', 'end' => '2019-11-22 15:56:11', 'created_at' => '2019-11-22 08:32:00', 'updated_at' => '2019-11-22 16:56:11'],
            ['user_id' => '5', 'start' => '2019-11-23 08:32:00', 'end' => '2019-11-23 15:56:11', 'created_at' => '2019-11-23 08:32:00', 'updated_at' => '2019-11-23 16:56:11'],
            ['user_id' => '5', 'start' => '2019-11-24 08:32:00', 'end' => '2019-11-24 15:56:11', 'created_at' => '2019-11-24 08:32:00', 'updated_at' => '2019-11-24 16:56:11'],
        ]);
        */
    }
}