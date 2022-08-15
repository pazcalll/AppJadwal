<?php

namespace Database\Seeders;

use App\Models\Aktivitas;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            [
                'aktivitas' => "Fundamental",
                'mulai' => Carbon::parse('2022-01-01'),
                'selesai' => Carbon::parse('2022-01-02'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_metode' => 1
            ],
            [
                'aktivitas' => "Introduction to TIC Industry",
                'mulai' => Carbon::parse('2022-01-04'),
                'selesai' => Carbon::parse('2022-01-06'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_metode' => 1
            ],
            [
                'aktivitas' => "Basic Finance for Business",
                'mulai' => Carbon::parse('2022-01-05'),
                'selesai' => Carbon::parse('2022-01-08'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_metode' => 1
            ]
        ];
        Aktivitas::insert($insert);
    }
}
