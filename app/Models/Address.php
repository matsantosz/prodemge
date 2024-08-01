<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Address\Type;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Address extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'person_id',
        'type',
        'zip_code',
        'street',
        'number',
        'additional',
        'neighborhood',
        'state',
        'city',
    ];

    protected function casts(): array
    {
        return [
            'type' => Type::class,
        ];
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
