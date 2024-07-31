<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Data\PersonData;
use App\Data\PersonSearchData;
use App\Models\Person;
use Hybridly\Contracts\HybridResponse;
use Hybridly\Refining\Refine;

final class IndexController
{
    public function __invoke(PersonSearchData $search): HybridResponse
    {
        $people = Refine::model(Person::class);

        return hybridly('home', [
            'people' => PersonData::collect(
                $people->search($search)
                    ->paginate()
                    ->withQueryString(),
            ),
        ]);
    }
}
