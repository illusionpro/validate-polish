# Validation of Poland specific data

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
![](https://img.shields.io/github/release/illusionpro/validator.svg)
![](https://img.shields.io/packagist/dt/illusionpro/validator.svg?label=packagist%20downloads)

PL: Ten pakiet zawiera walidatory danych używanych w Polsce (PESEL, NIP, REGON etc.)  
EN :This package contains validators of data used in Poland (PESEL, NIP, REGON etc.)  

### Install
```
composer require illusionpro/validate-polish
```  

**Dostępne walidatory / Available validators**:

:white_check_mark: Pesel Validation
<br/>:white_check_mark: NIP Validation

### PESEL Validation

***Walidator***
<br/>:heavy_check_mark: Checks if PESEL contains 11 digits and no characters
<br/>:heavy_check_mark: Checks the control sum using the official algorithm

***Dodatkowo zwraca***
<br/>:heavy_check_mark: Date of birth
<br/>:heavy_check_mark: Gender

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

### NIP Validation  

***Validator***
<br/>:heavy_check_mark: Removes comas and dashes from the string. This enables different formatting styles.<br/>(5260251109, 526-025-11-09, 52 60 25 11 09).
<br/>:heavy_check_mark: Verifies if NIP consists of 10 digits. 
<br/>:heavy_check_mark: Checks the control sum using the official algorithm.

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

**There are also other dictionary options available**:  

:heavy_check_mark: Voivodship

***Usage***:
```php
use Illusionpro\ValidatePolish\Dictionary;  

$provinces = Dictionary::getProvinces(); // for voivodship list
$province = Dictionary::getProvince($key); // to retrieve a specific voivodship based on the key from the list
```

:heavy_check_mark: NFZ list with code

***Usage***:
```php
use Illusionpro\ValidatePolish\Dictionary;  

$nfzList = Dictionary::getNfzList(); // to list NFZ branches
$singleNfz = Dictionary::getNfz($key); // to retrieve a specific NFZ branch
```

***Result single***:
```
Array
(
    [code] => 11
    [name] => Pomeranian branch of NFZ
)
```
