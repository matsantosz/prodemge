<?php

namespace App\Http\Middleware;

use App\Data\SharedData;
use Hybridly\Http\Middleware;

class HandleHybridRequests extends Middleware
{
    public function share(): SharedData
    {
        return new SharedData;
    }
}
