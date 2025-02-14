<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Core\NonPhpFile\Rector\RenameClassNonPhpRector;
use Symplify\SmartFileSystem\SmartFileSystem;

return static function (RectorConfig $rectorConfig): void {
    $services = $rectorConfig->services();

    $services->defaults()
        ->public()
        ->autowire()
        ->autoconfigure();

    $services->load('Sulu\\Rector', __DIR__ . '/../src')
        ->exclude([__DIR__ . '/../src/{Rector,ValueObject}']);

    $rectorConfig->rule(RenameClassNonPhpRector::class);

    $services->set(SmartFileSystem::class);
};
