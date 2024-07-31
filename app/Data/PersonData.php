<?php

declare(strict_types=1);

namespace App\Data;

use Carbon\CarbonInterface;
use Spatie\LaravelData\Data;

final class PersonData extends Data
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $name,
        public readonly ?string $socialName,
        public readonly string $cpf,
        public readonly string $fatherName,
        public readonly string $motherName,
        public readonly string $phoneNumber,
        public readonly string $email,
        // public readonly ?CarbonInterface $created_at,
    ) {}
}
