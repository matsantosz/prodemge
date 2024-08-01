<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Data\PersonData;
use App\Data\PersonSearchData;
use App\Models\Person;
use Hybridly\Contracts\HybridResponse;

final class IndexController
{
    public function __invoke(PersonSearchData $search): HybridResponse
    {
        return hybridly('home', [
            'people' => PersonData::collect(
                Person::query()
                    ->with('address')
                    ->search($search)
                    ->latest()
                    ->paginate()
                    ->withQueryString(),
            ),
        ]);
    }
}
