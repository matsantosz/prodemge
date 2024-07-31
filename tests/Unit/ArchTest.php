<?php

declare(strict_types=1);

arch('use strict types', function () {
    expect('App')->toUseStrictTypes();
    expect('Database')->toUseStrictTypes();
});

arch('avoid dumps', function () {
    expect(['dd', 'dump', 'var_dump'])->not->toBeUsed();
});
