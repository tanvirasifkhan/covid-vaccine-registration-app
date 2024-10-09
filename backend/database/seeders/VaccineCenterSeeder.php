<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\VaccineCenter;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET foreign_key_checks=0");

        VaccineCenter::truncate();

        VaccineCenter::insert([
            ['name' => 'Uttara', 'limit' => 200, 'address' => 'Uttara, Dhaka'],
            ['name' => 'Jatrabari', 'limit' => 220, 'address' => 'Jatrabari, Dhaka'],
            ['name' => 'Dhanmondi', 'limit' => 100, 'address' => 'Dhanmondi, Dhaka'],
            ['name' => 'Banani', 'limit' => 140, 'address' => 'Banani, Dhaka'],
            ['name' => 'Mirpur', 'limit' => 150, 'address' => 'Mirpur, Dhaka'],
            ['name' => 'Chittagong City', 'limit' => 320, 'address' => 'Chittagong City, Chittagong'],
            ['name' => 'Rajshahi City', 'limit' => 230, 'address' => 'Rajshahi City, Rajshahi'],
            ['name' => 'Cumilla Shadar', 'limit' => 160, 'address' => 'Cumilla Shadar, Cumilla'],
            ['name' => 'Barishal Shadar', 'limit' => 100, 'address' => 'Barishal Shadar, Barishal'],
            ['name' => 'Chandpur Thana', 'limit' => 335, 'address' => 'Chandpur Thana, Chandpur']            
        ]);
    }
}
