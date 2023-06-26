<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            'Estampado',
            'Body',
            'Pintura',
            'TCF',
            'Motores',
            'Mantenimiento',
            'VQA',
            'VQE',
            'QM',
            'GA Aire Acondicionado ',
            'GA Pool car',
            'MFG COMEDOR ',
            'SQE',
            'EQE',
            'Utility',
            'Security',
            'IT',
        ];

        foreach($areas as $area){
            DB::table('areas')->insert([
                'name' => $area,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]); 
        }        
    }
}
