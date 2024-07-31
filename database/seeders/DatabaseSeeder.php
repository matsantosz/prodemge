<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Person::factory()->count(20)->create();
    }
}
