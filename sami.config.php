<?php

declare(strict_types=1);
/*
 * Copyright (C) 2018 Dish Technologies
 * Dish Technologies LLC retains title to all software.
 */
use Sami\Sami;
use Sami\Parser\Filter\TrueFilter;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
 ->files()
 ->name('*.php')
 // ->name('*.md')
 ->exclude('.idea')
 ->exclude('.phpintel')
 ->exclude('nbproject')
 ->exclude('home')
 // ->exclude('config')
 ->exclude('cdb')
 ->exclude('resources')
 ->exclude('tests')
 ->exclude('vendor')
 ->exclude('public')
 ->exclude('bootstrap')
 ->exclude('storate')
 ->in(__DIR__.'/');

return new Sami($iterator, [
 'theme' => 'default',
 'title' => 'Configuration Manager Documentation',
 'build_dir' => __DIR__.'/public/docs',
 'cache_dir' => __DIR__.'/public/docs/cache',
 'default_opened_level' => 2,
]);

$sami['filter'] = function () {
    return new TrueFilter();
};
