<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GEIChemicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classifications = [
            1 => [
                [
                    'name' => 'Triclorofluorometano',
                    'cas_number' => '75694',
                    'ashrae' => 'R11'
                ]
            ],
            /*
            2 => [],
            3 => [],
            4 => [],
            4 => [],
            6 => [],
            7 => [],
            8 => [],
            9 => [],
            10 => [],
            11 => [],
            12 => [],
            */
        ];

        foreach($classifications as $key => $chemicals){
            

            foreach($chemicals as $chemical) {
                DB::table('g_e_i_chemicals')->insert([
                    'g_e_i_chemical_classification_id' => $key, 
                    'name' => $chemical['name'],
                    //Reemplazo guines para que quede mas homogeneo
                    'cas_number' => str_replace( '-', '', $chemical['cas_number']),
                    'ashrae' => $chemical['ashrae'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]); 

            }
        }   

    }
}
