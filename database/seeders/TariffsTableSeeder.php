<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tariff;

class TariffsTableSeeder extends Seeder
{
    public function run()
    {
        Tariff::create(['name' => 'Электричество', 'price' => 4.50]);
        Tariff::create(['name' => 'Вода', 'price' => 30.00]);
        Tariff::create(['name' => 'Газ', 'price' => 7.00]);
    }
}
