<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tblproduk;

class TblprodukSeeder extends Seeder
{
    public function run()
    {
        Tblproduk::factory()->count(50)->create();
    }
}