<?php

declare(strict_types=1);

namespace App\Application\UseCases\ExportRegistration;

final class InputBoundary
{
    /**
     * @param string $registrationNumber
     * @param string pdfFileName
     */
    public function __construct(
        private string $registrationNumber,
        private string $pdfFileName,
        private string $path,
    ) {
    }

    /**
     * @return string
     */
    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    /**
     * @return string
     */
    public function getPdfFileName(): string
    {
        return $this->pdfFileName;
    }
    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path ;
    }
}
