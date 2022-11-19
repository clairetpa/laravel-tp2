<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;
use App\Models\Model;
use Database\Factories\UserFactory;


class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userFactory = new UserFactory;
        return [
            'nom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'date_naissance' => $this->faker->date(),
            /* va prendre une ville au hazard de la table ville :*/
            'villeId' => Ville::all()->random()->id,
            'userId' => $userFactory->create()->id
        ];
    }
}
