<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

const LEVEL = 1;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
    ])
    // uncomment to reach your current PHP version
    // ->withPhpSets()
    ->withTypeCoverageLevel(LEVEL)
    ->withDeadCodeLevel(LEVEL)
    ->withCodeQualityLevel(LEVEL);
