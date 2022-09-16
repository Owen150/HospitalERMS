<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('medicines')->insert(
            [
                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Paracetamol",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Ibuprofen",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Meloxicam",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Griseofulvin",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Caps Amoxicillin",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Caps Cefalexin",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Azithromycin",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Hydrocortisone cream",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Concerta",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Amoxyclav",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Susp Amoxicillin",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Syp paracetamol",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Clotrine pessaries",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Syp Flagyl",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Syp Azithromycin",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Glipmevia",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Nifelat",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Syp piriton",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Syp Cetrizine",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Susp Ampiclox",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Caps Ampiclox",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Caps Flucloxacillin",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Caps Omeprazole",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Ciprofloxacin",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Actals",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Hydrocortisone",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Ceftriaxone",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Clopidogrel(clopilet)",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Piriton",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Cough syp",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Caps Entamaxin",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Osteocare Caps",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Foralin inhaler",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Pyridoxine",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Tabs Glucomet",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Neurostra",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Anusol cream",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Extra derm",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Clotrimazole cream",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Losartan H",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "HCTZ",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Dispensing envelopes",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Amlozaar H",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Ascard",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Atorvastatin",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Gentamycin eye drops",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Enaril",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Nystatin oral drops",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Propranol",
                    "qty" => 50,
                    "price" => 100
                ],

                [
                    "updated_at"=>Carbon::now()->toDateTimeString(),
                    "created_at"=>Carbon::now()->toDateTimeString(),
                    "name_english" => "Strapping",
                    "qty" => 50,
                    "price" => 100
                ],

                
            ]);
            */
    }
}
