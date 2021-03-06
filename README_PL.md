# Walidacja specyficznych danych dla polskiego regionu

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
![](https://img.shields.io/github/release/illusionpro/validator.svg)
![](https://img.shields.io/packagist/dt/illusionpro/validator.svg?label=packagist%20downloads)

PL: Ten pakiet zawiera walidatory danych używanych w Polsce (PESEL, NIP, REGON etc.)  
EN :This package contains validatiors of data used in Poland (PESEL, NIP, REGON etc.) 

#[English Version here](README.md)#

### Install
```
composer require illusionpro/validate-polish
```  

**Dostępne walidatory / Available validators**:

:white_check_mark: Walidacja Pesel
<br/>:white_check_mark: Walidacja NIP

### Walidacja PESEL

***Walidator***
<br/>:heavy_check_mark: Sprawdza czy PESEL zawiera 11 znaków i tylko cyfry
<br/>:heavy_check_mark: Sprawdza sume kontrolnę wg. oficjalnego algorytmu

***Dodatkowo zwraca***
<br/>:heavy_check_mark: Datę urodzenia
<br/>:heavy_check_mark: Płeć

***Usage***:
```php
use Illusionpro\ValidatePolish\Pesel;  

$pesel = new Pesel($peselNumber);
$pesel->validate()
```
***Result***:
```php
array(5) {
  ["isValid"]=> bool(true)
  ["gender"]=> string(1) "M"
  ["pesel"]=> string(11) "00112233445"
  ["birthDate"]=>  array(3) {
        ["year"]=> string(4) "1980"
        ["month"]=> string(2) "12"
        ["day"]=> string(2) "30"
    }
  ["error"]=> bool(false)
  ["errorMessage"]=> NULL
}
```  

### Walidacja NIP  

***Walidator***
<br/>:heavy_check_mark: Oczyszcza string ze spacji i myślników, dzięki czemu input może zawierać różne formatowanie<br/>(5260251109, 526-025-11-09, 52 60 25 11 09).
<br/>:heavy_check_mark: Sprawdza czy NIP zawiera 10 znaków i tylko cyfry.
<br/>:heavy_check_mark: Sprawdza sume kontrolnę wg. oficjalnego algorytmu.

***Usage***:
```php
use Illusionpro\ValidatePolish\Nip;  

$nip = new Nip('526-025-11-09');
$nip->validate()
```
***Result***:
```php
array(5) {
  ["isValid"]=> bool(true)
  ["nip"]=> string(10) "5260251109"
  ["error"]=> bool(false)
  ["errorMessage"]=> NULL
}
```  

**Dostępne są również dodatkowe dane słownikowe**:  

:heavy_check_mark: Województwa

***Usage***:
```php
use Illusionpro\ValidatePolish\Dictionary;  

$provinces = Dictionary::getProvinces(); // Dla listy wojwództw
$province = Dictionary::getProvince($key); // Dla uzyskania konkretnego województwa na podstawie klucza z tablicy 
```

:heavy_check_mark: Lista NFZ z kodem

***Usage***:
```php
use Illusionpro\ValidatePolish\Dictionary;  

$nfzList = Dictionary::getNfzList(); // Dla listy oddziałów BFZ
$singleNfz = Dictionary::getNfz($key); // Dla uzyskania konkretnego oddziału NFZ 
```

***Result single***:
```
Array
(
    [code] => 11
    [name] => Pomorski Oddział Narodowego Funduszu Zdrowia w Gdańsku.
)
```
