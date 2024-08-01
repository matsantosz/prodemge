<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\Address\Type;
use Spatie\LaravelData\Data;

final class AddressData extends Data
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $personId,
        public readonly Type $type,
        public readonly string $zip_code,
        public readonly string $street,
        public readonly string $number,
        public readonly ?string $additional,
        public readonly string $neighborhood,
        public readonly string $state,
        public readonly string $city,
    ) {}

    public static function rules($context): array
    {
        return [
            'type'         => ['required', 'string', 'min:2', 'max:255'],
            'zip_code'     => ['required', 'string', 'min:2', 'max:255'],
            'street'       => ['required', 'string', 'min:2', 'max:255'],
            'number'       => ['required', 'string', 'min:2', 'max:255'],
            'additional'   => ['required', 'string', 'min:2', 'max:255'],
            'neighborhood' => ['nullable', 'string', 'min:2', 'max:255'],
            'state'        => ['required', 'string', 'min:2', 'max:255'],
            'city'         => ['required', 'string', 'min:2', 'max:255'],
        ];
    }

    public function formData(): array
    {
        return [
            'zip_code'     => $this->zip_code,
            'street'       => $this->street,
            'number'       => $this->number,
            'additional'   => $this->additional,
            'neighborhood' => $this->neighborhood,
            'state'        => $this->state,
            'city'         => $this->city,
        ];
    }
}
