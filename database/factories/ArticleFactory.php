<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mmo\Faker\PicsumProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new PicsumProvider($this->faker));
        $nombre=ucfirst($this->faker->unique()->words(random_int(2,4),true));

        return [
            "nombre"=>$nombre,
            "descripcion"=>$this->faker->words(random_int(2,10),true),
            "imagen"=>"articulos/".$this->faker->picsum("public/storage/articulos",640,480,null,false),
            "precio"=>$this->faker->randomFloat(5,2,999),
            "stock"=>$this->faker->randomNumber(),
            "slug"=>Str::slug($nombre),
            "user_id"=>User::all()->random()->id
        ];
    }
}
