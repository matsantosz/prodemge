<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
final class PersonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'         => $name = $this->faker->name(),
            'social_name'  => strtok($name, ' '),
            'cpf'          => $this->faker->cpf(),
            'father_name'  => $this->faker->name('male'),
            'mother_name'  => $this->faker->name('female'),
            'phone_number' => $this->faker->cellphoneNumber(),
            'email'        => $this->faker->unique()->safeEmail(),
        ];
    }
}
