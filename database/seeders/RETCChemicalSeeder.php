<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RETCChemicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $retc_chemicals = [
            [
                'name' => '1,1,2,2-tetracloroetano',
                'cas_number' => '79-34-5',
                'manufacturing_umbral' => '5000',
                'emission_transfer_umbral' => '500'
            ],
            [
                'name' => '1,1,2-tricloroetano',
                'cas_number' => '79-00-5',
                'manufacturing_umbral' => '5000',
                'emission_transfer_umbral' => '1000'
            ],
        ];

        foreach( $retc_chemicals as $retc_chemical) {
            DB::table('r_e_t_c_chemicals')->insert([
                'name' => $retc_chemical['name'],
                //Reemplazo guines para que quede mas homogeneo
                'cas_number' => str_replace( '-', '', $retc_chemical['cas_number'] ),
                'manufacturing_umbral' => $retc_chemical['manufacturing_umbral'],
                'emission_transfer_umbral' => $retc_chemical['emission_transfer_umbral'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }


    }
}
