<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Address;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
final class AddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'person_id'    => Person::factory(),
            'type'         => $this->faker->randomElement(Address\Type::cases()),
            'zip_code'     => $this->faker->postcode(),
            'street'       => $this->faker->streetName(),
            'number'       => $this->faker->buildingNumber(),
            'additional'   => $this->faker->streetAddress(),
            'state'        => $state = $this->faker->state(),
            'neighborhood' => "Bairo de $state",
            'city'         => $this->faker->city(),
        ];
    }
}
