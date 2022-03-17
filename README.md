# Walidacja specyficznych danych dla polskiego regionu

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
![](https://img.shields.io/github/release/illusionpro/validator.svg)
![](https://img.shields.io/packagist/dt/illusionpro/validator.svg?label=packagist%20downloads)

**Dostępne Walidatory**:
- [x] Walidacja Pesel

***Usage***:
```php
$pesel = new Pesel($peselNumber);
$pesel->validate()
```
***Result***:
```php
array(5) {
  ["valid"]=> bool(true)
  ["gender"]=> string(1) "M"
  ["birthDate"]=>  array(3) {
        ["year"]=> string(4) "1980"
        ["month"]=> string(2) "12"
        ["day"]=> string(2) "30"
    }
  ["error"]=> bool(false)
  ["errorMessage"]=> NULL
}
```
