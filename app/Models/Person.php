<?php

declare(strict_types=1);

namespace App\Models;

use App\Data\PersonSearchData;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin IdeHelperPerson
 */
final class Person extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'social_name',
        'cpf',
        'father_name',
        'mother_name',
        'phone_number',
        'email',
    ];

    public function scopeSearch(Builder $query, PersonSearchData $data): Builder
    {
        return $query
            ->when(
                $data->query,
                fn (Builder $query, string $search) => $query->where(
                    fn (Builder $query) => $query
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('cpf', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%"),
                ),
            );
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}
