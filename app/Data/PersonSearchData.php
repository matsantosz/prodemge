<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class PersonSearchData extends Data
{
    public function __construct(
        public readonly ?string $query,
    ) {}
}
