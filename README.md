# Inflection of Lithuanian words.

<p align="left">
<a href="https://packagist.org/packages/neriba/lt-case"><img src="https://img.shields.io/packagist/v/neriba/lt-case.svg?style=flat-square" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/neriba/lt-case"><img src="https://img.shields.io/packagist/dt/neriba/lt-case.svg?style=flat-square" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/neriba/lt-case"><img src="https://img.shields.io/packagist/l/neriba/lt-case" alt="License"></a>
</p>

## Instalation

To install via composer:

```sh
composer require neriba/lt-case
```

## What It Does

This package allows you to inflect Lithuanian names.

```php
use \NeriBa\LTCase\LTCase;

echo LTCase::get('Kęstutis Mažvydas !@#$#%^%&^%***___---??','kil'); // Result: Kęstučio Mažvydo
echo LTCase::get('Kęstutis Mažvydas !@#$#%^%&^%***___---??','nau'); // Result: Kęstučiui Mažvydui
echo LTCase::get('Kęstutis Mažvydas !@#$#%^%&^%***___---??','gal'); // Result: Kęstutį Mažvydą
echo LTCase::get('Kęstutis Mažvydas !@#$#%^%&^%***___---??','ina'); // Result: Kęstučiu Mažvydu
echo LTCase::get('Kęstutis Mažvydas !@#$#%^%&^%***___---??','vie'); // Result: Kęstutyje Mažvyde
echo LTCase::get('Kęstutis Mažvydas !@#$#%^%&^%***___---??','sau'); // Result: Kęstuti Mažvydai
```
# License

The MIT License (MIT). Please see [License File](LICENSE) for more information.