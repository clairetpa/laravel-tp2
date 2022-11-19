<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Model;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $langues = array('fr', 'en');
        $extenstion = array('.pdf', '.zip', '.doc');
        return [
            'nom' => $this->faker->text($maxNbChars = 10).$extenstion[array_rand($extenstion,1)],
            'date' => $this->faker->date(),
            'langue' => $langues[array_rand($langues,1)],
            'userId' => User::all()->random()->id
        ];
    }
}
