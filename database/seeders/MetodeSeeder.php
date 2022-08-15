<?php

namespace Database\Seeders;

use App\Models\Metode;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MetodeSeeder extends Seeder
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
                'metode' => 'Workshop/Self Learning',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'metode' => "Sharing Practice/Professional's Talk",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'metode' => 'Discussion Room',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'metode' => 'Coaching',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'metode' => 'Mentoring',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'metode' => 'Job Assignment',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        Metode::insert($insert);
    }
}
