<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::truncate();
        Kategori::insert([
            ["nama_kategori" => "News"],    
            ["nama_kategori" => "Tren"],    
            ["nama_kategori" => "Health"],    
            ["nama_kategori" => "Food"],    
            ["nama_kategori" => "Edukasi"],    
        ]);
    }
}
