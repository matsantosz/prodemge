<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Address;
use App\Models\Person;
use Illuminate\Database\DatabaseManager;

final readonly class AddressService
{
    public function __construct(private DatabaseManager $database) {}

    public function create(string $personId, array $attributes): Person
    {
        return $this->database->transaction(
            callback: fn () => Address::query()->create(
                attributes: [
                    ...$attributes,
                    'person_id' => $personId,
                ],
            ),
            attempts: 3,
        );
    }

    public function update(Person $person, array $attributes): Person
    {
        return $this->database->transaction(
            callback: fn () => $person->update(
                attributes: $attributes,
            ),
            attempts: 3,
        );
    }
}
