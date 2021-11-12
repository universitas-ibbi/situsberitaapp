<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Berita::truncate();
        \App\Models\Berita::factory()->count(100)->create();
    }
}
