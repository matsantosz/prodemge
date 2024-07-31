<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Data\SecurityData;
use App\Data\SharedData;
use App\Data\UserData;
use Hybridly\Http\Middleware;
use Illuminate\Support\Facades\Auth;

final class HandleHybridRequests extends Middleware
{
    public function share(): SharedData
    {
        return SharedData::from([
            'security' => SecurityData::from([
                'user' => UserData::optional(Auth::user()),
            ]),
        ]);
    }
}
