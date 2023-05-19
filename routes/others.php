<?php

use App\Application\UseCases\ExportRegistration\ExportRegistration;
use App\Application\UseCases\ExportRegistration\InputBoundary;
use App\Domain\Entities\Registration;
use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use App\Http\Controllers\HomeController;
use App\Infra\Adapters\Html2PdfAdapter;
use App\Infra\Adapters\LocalStorageAdapter;
use Framework\Http\Response;
use Framework\Routing\RouterCollector;

$router = new RouterCollector;

$router->addRoute('GET', '/register', function () {

    // Entities
    $registration = new Registration();

    $registration
        ->setName('Sergio Danilo Jr.')
        ->setBirthDate(new DateTimeImmutable('1994-01-15'))
        ->setEmail(new Email('sergiodanilojr@hotmail.com'))
        ->setRegistrationDate(new DateTimeImmutable())
        ->setRegistrationNumber(new Cpf('05506426500'));

    $pdfExportAdapter  = new Html2PdfAdapter();
    $storageAdapter = new LocalStorageAdapter();

    $content = $pdfExportAdapter->generate($registration);
    $storageAdapter->store('test.pdf', realpath(__DIR__ . '/../storage/registrations'), $content);

    return new Response('');

    //die;

    // // Use Cases
    // $exportRegistrationUseCase = new ExportRegistration(exporter: $pdfExportAdapter, storage: $storageAdapter);

    // $inputBoundary = new InputBoundary($registration->getRegistrationNumber(), 'nome-do-arquivo.pdf', realpath(__DIR__ . '/../storage'));

    // $output = $exportRegistrationUseCase->handle($inputBoundary);
});

return $router->routes();
