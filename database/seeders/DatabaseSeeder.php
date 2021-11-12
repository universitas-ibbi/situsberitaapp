<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \Schema::disableForeignKeyConstraints();
        \App\Models\User::truncate();
        \App\Models\User::create([
            "name" => "Budi",
            "email" => "budi@gmail.com",
            "password" => \Hash::make("123456")
        ]);
        $this->call([
            KategoriSeeder::class,
            BeritaSeeder::class,
            KomentarSeeder::class
        ]);
        \Schema::enableForeignKeyConstraints();
    }
}
