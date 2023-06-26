<?php

namespace Database\Seeders;

use App\Models\Chemical;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GEIChemicalClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classifications = [
            'Clorofluorocarbonos',
            'Halocarbones',
            'Hidroclorofluorocarbonos',
            'Hidrofluorocarbonos',
            'Perfluorocarbonos',
            'Mezclas  Gas Composición de la mezcla (porcentaje base masa)',
            'Metano',
            'Óxido Nitroso',
            'Carbono Negro',
            'Éteres Halogenados',
            'Dióxido de carbono',
            
        ];

        foreach($classifications as $classification){
            DB::table('g_e_i_chemical_classifications')->insert([
                'name' => $classification,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]); 
        }   
    }
}
