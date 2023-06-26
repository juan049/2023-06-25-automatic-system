<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChemicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chemicals = [
            [
                'name' => 'Aromáticos',
                'percentage' => 32,
                'cas_number' => null,
                'is_g_e_i' => false,
                'is_r_e_t_c' => false
            ],
            [
                'name' => 'Olefinas',
                'percentage' => 12.5,
                'cas_number' => null,
                'is_g_e_i' => false,
                'is_r_e_t_c' => false
            ],
            [
                'name' => 'Benceno',
                'percentage' => 2,
                'cas_number' => '71-43-2',
                'is_g_e_i' => true,
                'is_r_e_t_c' => true
            ],
            [
                'name' => 'Hexano',
                'percentage' => 1.02,
                'cas_number' => '110-54-3',
                'is_g_e_i' => true,
                'is_r_e_t_c' => true
            ],
            [
                'name' => 'Tolueno',
                'percentage' => 0.69,
                'cas_number' => '108-88-3',
                'is_g_e_i' => true,
                'is_r_e_t_c' => true
            ]

        ];

        foreach ($chemicals as $chemical) {
            DB::table('chemicals')->insert([
                'raw_material_id' => 1,
                'name' => $chemical['name'],
                'percentage' => $chemical['percentage'],
                'cas_number' => $chemical['cas_number'],
                'is_g_e_i' => $chemical['is_g_e_i'],
                'is_r_e_t_c' => $chemical['is_r_e_t_c'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
