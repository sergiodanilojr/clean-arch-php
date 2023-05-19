<?php

declare(strict_types=1);

namespace App\Application\Contracts;

interface Storage
{
    
    public function store(string $file, string $path, string $content): bool;
}
