<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KomentarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "isi_komentar" => $this->faker->sentence(5),
            "berita_id" => \App\Models\Berita::get("id")->random(),
            "user_id" =>  \App\Models\User::get("id")->first()
        ];
    }
}
