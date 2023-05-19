<?php

declare(strict_types=1);

namespace App\Application\UseCases\ExportRegistration;

use App\Application\Contracts\ExportRegistrationPdfExporter;
use App\Application\Contracts\Storage;
use App\Domain\Repositories\LoadRegistrationRepository;
use App\Domain\ValueObjects\Cpf;

final class ExportRegistration
{

    public function __construct(
        private LoadRegistrationRepository $repository,
        private ExportRegistrationPdfExporter $exporter,
        private Storage $storage,
    ) {
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $registrationNumber = new Cpf($input->getRegistrationNumber());
        $registration = $this->repository->loadByRegistrationNumber($registrationNumber);

        $fileContent = $this->exporter->generate($registration);

        $this->storage->store($input->getPdfFileName(), $input->getPath(), $fileContent);

        return new OutputBoundary($input->getPath() . DIRECTORY_SEPARATOR . $input->getPdfFileName());
    }
}
