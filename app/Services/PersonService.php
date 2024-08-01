<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Person;
use Illuminate\Database\DatabaseManager;

final readonly class PersonService
{
    public function __construct(private DatabaseManager $database) {}

    public function create(array $attributes): Person
    {
        return $this->database->transaction(
            callback: fn () => Person::query()->create(
                attributes: $attributes,
            ),
            attempts: 3,
        );
    }
}
