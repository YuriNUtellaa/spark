<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slots = [];

        $letters = ['R', 'I'];
        $numbers = range(1, 25);

        foreach ($letters as $letter) {
            foreach ($numbers as $number) {
                $slots[] = [
                    'slot_number' => $letter . '-' . $number,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('slots')->insert($slots);
    }
}
