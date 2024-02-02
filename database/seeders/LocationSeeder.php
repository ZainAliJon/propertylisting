<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('locations')->insert([
            ['name' => 'DownTown', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Permanent', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Raffles Place', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Shenton way', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tanjong Pagar', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
