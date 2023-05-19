<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use DomainException;

final class Email
{
    private string $email;

    public function __construct(string $email)
    {
        $this->setEmail($email);
    }

    public function __toString()
    {
        return $this->email;
    }

    private function setEmail(string $email)
    {
        $this->filter($email);
        $this->email = $email;
    }

    private function filter(string $email)
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new DomainException('E-mail is not valid!');
        }
    }
}
