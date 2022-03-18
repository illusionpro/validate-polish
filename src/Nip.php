<?php

namespace Illusionpro\ValidatePolish;

class Nip
{
    protected static $length = 10;
    protected $isValid = false;
    protected $nip;

    public function __construct($nip)
    {
        $this->nip = trim(str_replace(['-', ' '], '', $nip));
    }

    protected function validateDigits()
    {
        if (ctype_digit($this->nip) === false) {
            throw new \Exception('Numer NIP powinien zawierać same cyfry');
        }

        return true;
    }

    protected function validateLength(): bool
    {
        if (strlen($this->nip) !== self::$length) {
            throw  new \Exception('Nieprawidłowa długość numeru NIP');
        }
        return true;
    }

    protected function validateChecksumn(): bool
    {
        $weight = [6, 5, 7, 2, 3, 4, 5, 6, 7];
        $sum = 0;

        foreach ($weight as $index => $value) {
            $sum += $value * $this->nip[$index];
        }
        $digitControl = $sum % 11;
        if ($digitControl != $this->nip[9]) {
            throw new \Exception('Błąd sumy kontrolnej');
        }

        return true;
    }

    public function validate(): array
    {
        try {
            $this->isValid = ($this->validateDigits() && $this->validateLength() && $this->validateChecksumn() );
            return $this->getResponse();

        } catch (\Exception $e) {
            return $this->getResponse(true, $e->getMessage());
        }
    }

    protected function getResponse(bool $error = false, string $errorMessage = null): array
    {
        return [
            'isValid' => $this->isValid,
            'nip' => $this->nip,
            'error' => $error,
            'errorMessage' => $errorMessage
        ];
    }

}
