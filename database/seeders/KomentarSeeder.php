<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Komentar::truncate();
        \App\Models\Komentar::factory()->count(1000)->create();
    }
}
