<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Cpf;
use App\Domain\ValueObjects\Email;
use DateTime;
use DateTimeInterface;

final class Registration
{
    private string $name;
    private Email $email;
    private Cpf $registrationNumber;
    private DateTimeInterface $birthDate;
    private DateTimeInterface $registeredAt;


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Registration
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): Registration
    {
        $this->email = $email;
        return $this;
    }

    public function getRegistrationNumber(): Cpf
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(Cpf $registrationNumber): Registration
    {
        $this->registrationNumber = $registrationNumber;
        return $this;
    }

    public function getBirthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTimeInterface $birthDate): Registration
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function getRegistrationDate(): DateTimeInterface
    {
        return $this->registeredAt;
    }

    public function setRegistrationDate(DateTimeInterface $registrationDate): Registration
    {
        $this->registeredAt = $registrationDate;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'email' => (string)$this->getEmail(),
            'birthDate' => $this->getBirthDate()->format(DateTime::ATOM),
            'registrationNumber' => (string)$this->getRegistrationNumber(),
            'registeredAt' => $this->getRegistrationDate()->format(DateTime::ATOM),
        ];
    }
}
