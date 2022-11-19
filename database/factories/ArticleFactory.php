<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Model;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $langues = array('fr', 'en');
        return [
            'title' => $this->faker->word(),
            'contenu' => $this->faker->text($maxNbChars = 1000),
            'date' => $this->faker->date(),
            'langue' => $langues[array_rand($langues,1)],
            'userId' => User::all()->random()->id
        ];
    }
}
