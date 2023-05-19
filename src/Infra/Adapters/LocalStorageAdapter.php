<?php

declare(strict_types=1);

namespace App\Infra\Adapters;

use App\Application\Contracts\Storage;

class LocalStorageAdapter implements Storage
{
    public function store(string $file, string $path, string $content): bool
    {
        if(false === file_put_contents($path . DIRECTORY_SEPARATOR . $file, $content)){
            return false;
        }
        
        return true;
    }
}
