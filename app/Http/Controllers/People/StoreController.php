<?php

declare(strict_types=1);

namespace App\Http\Controllers\People;

use App\Data\PersonData;
use App\Services\PersonService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

final class StoreController
{
    public function __construct(private PersonService $personService) {}

    public function __invoke(PersonData $data): RedirectResponse
    {
        $this->personService->create($data->formData());

        return Redirect::to('/');
    }
}
