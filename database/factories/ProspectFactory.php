<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProspectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'company' => Str::random(10),
            'contact' => $faker->name(),
            'phone_one' => Str::random(10),
            'phone_two' => Str::random(10),
            'address' => $faker->streetAddress(),
            'website' => $faker->url(),
            'email' => $faker->unique()->safeEmail(),
            'position' => $faker->jobTitle(),
            'notes' => Str::random(20)
        ];
    }
}
