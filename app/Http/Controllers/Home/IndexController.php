<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use Hybridly\Contracts\HybridResponse;

final class IndexController
{
    public function __invoke(): HybridResponse
    {
        return hybridly('home');
    }
}
