<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Support\Validation\ValidationContext;

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
    ) {}

    public static function rules(ValidationContext $context): array
    {
        return [
            'name'        => ['required', 'string', 'min:2', 'max:255'],
            'socialName'  => ['nullable', 'string', 'min:2', 'max:255'],
            'cpf'         => ['required', 'string', 'size:14', 'unique:people,cpf'],
            'fatherName'  => ['required', 'string', 'min:2', 'max:255'],
            'motherName'  => ['required', 'string', 'min:2', 'max:255'],
            'phoneNumber' => ['required', 'string', 'size:15'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:people,email'],
        ];
    }

    public function formData(): array
    {
        return [
            'name'         => ucwords($this->name),
            'social_name'  => $this->socialName ? ucwords($this->socialName) : null,
            'cpf'          => $this->cpf,
            'father_name'  => ucwords($this->fatherName),
            'mother_name'  => ucwords($this->motherName),
            'phone_number' => $this->phoneNumber,
            'email'        => strtolower($this->email),
        ];
    }
}
