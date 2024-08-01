<?php

declare(strict_types=1);

namespace App\Http\Controllers\Address;

use App\Data\AddressData;
use App\Services\AddressService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

final class StoreController
{
    public function __construct(private AddressService $addressService) {}

    public function __invoke(AddressData $data): RedirectResponse
    {
        $this->addressService->create($data->personId, $data->formData());

        return Redirect::to('/');
    }
}
