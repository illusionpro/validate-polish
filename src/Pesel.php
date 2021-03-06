<?php

namespace Illusionpro\ValidatePolish;

class Pesel
{
    protected static $length = 11;
    protected $isValid = false;
    protected $pesel, $year, $month, $day, $gender, $century;

    public function __construct($pesel)
    {
        $this->pesel = trim($pesel);
    }

    protected function validateLength(): bool
    {
        if (strlen($this->pesel) !== self::$length) {
            throw  new \Exception('Nieprawidłowa długość numeru PESEL');
        }
        return true;
    }

    protected function validateDigits()
    {
        if (ctype_digit($this->pesel) === false) {
            throw new \Exception('Numer PESEL powinien zawierać same cyfry');
        }

        $this->month = substr($this->pesel, 2, 2);
        $this->day = substr($this->pesel, 4, 2);
        $this->year = substr($this->pesel, 0, 2);
        $this->gender = $this->setGender(substr($this->pesel, 9, 1));

        return true;
    }

    protected function setMonthAndCentury(): bool
    {
        if($this->month >= 1 && $this->month <= 12):
            $this->century = 19;
        elseif($this->month >= 21 && $this->month <= 32):
            $this->century = 20;
            $this->month = sprintf('%02d',$this->month - 20);
        else:
            throw  new \Exception('Invalid Month');
        endif;

        return true;
    }

    protected function setGender($number): string
    {
        return $number % 2 == 0 ? 'F' : 'M';
    }

    /* Official Validation from page https://www.gov.pl/web/gov/czym-jest-numer-pesel */
    protected function validateChecksumn(): bool
    {
        $weight = [1, 3, 7, 9, 1, 3, 7, 9, 1, 3];
        $sum = 0;

        foreach ($weight as $index => $value) {
            $sum += $value * $this->pesel[$index];
        }

        $checkNumber = 10 - $sum % 10;
        $checkSum = ($checkNumber == 10) ? 0 : $checkNumber;
        if ($checkSum != $this->pesel[10]) {
            throw new \Exception('Błąd numeru PESEL');
        }
        return true;
    }

    public function validate(): array
    {
        try {
            $this->isValid = ($this->validateLength() && $this->validateDigits() && $this->setMonthAndCentury() && $this->validateChecksumn());
            return $this->getResponse();
        } catch (\Exception $e) {
            return $this->getResponse(true, $e->getMessage());
        }
    }

    protected function getResponse(bool $error = false, string $errorMessage = null): array
    {
        return [
            'isValid' => $this->isValid,
            'gender' => $this->gender,
            'pesel' => $this->pesel,
            'birthDate' => [
                'year' => $this->century . $this->year,
                'month' => $this->month,
                'day' => $this->day
            ],
            'error' => $error,
            'errorMessage' => $errorMessage
        ];
    }
}
