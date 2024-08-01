<?php

declare(strict_types=1);

namespace App\Http\Controllers\Address;

use App\Data\AddressUpdateData;
use App\Models\Person;
use App\Services\AddressService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

final class UpdateController
{
    public function __construct(private AddressService $addressService) {}

    public function __invoke(Person $person, AddressUpdateData $data): RedirectResponse
    {
        $this->addressService->update($person, $data->formData());

        return Redirect::to('/');
    }
}
