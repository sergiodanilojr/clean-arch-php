<?php

declare(strict_types=1);

namespace App\Application\UseCases\ExportRegistration;

use ReflectionClass;

final class OutputBoundary
{
    public function __construct(
        private string $fileName
    ) {
    }

    public function getFileName()
    {
        return $this->fileName;
    }
}
