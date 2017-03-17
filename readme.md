# php-array

This librairy provides utilities function to ease array manipulation

[![Build Status](https://travis-ci.org/hugsbrugs/php-array.svg?branch=master)](https://travis-ci.org/hugsbrugs/php-array)
[![Coverage Status](https://coveralls.io/repos/github/hugsbrugs/php-array/badge.svg?branch=master)](https://coveralls.io/github/hugsbrugs/php-array?branch=master)

## Install

Install package with composer
```
composer require hugsbrugs/php-array
```

In your PHP code, load library
```php
require_once __DIR__ . '/../vendor/autoload.php';
use Hug\HArray\HArray as HArray;
```
Note: I couldn't use Array as namespace because it's a PHP reserved word so it's why namespace is HArray ...

## Usage

Shuffle an array while preserving keys
```php
HArray::shuffle_assoc(&$array);
```

Sort an array based on column filter and optional sort direction
```php
HArray::array_sort_by_column(&$arr, $col, $dir = SORT_ASC);
```

Sort a 2 dimensional array based on 1 or more indexes.
```php
$new_array = HArray::msort($array, $key, $sort_flags = SORT_REGULAR);
```

Recursively implodes an array with optional key inclusion
```php
$string = HArray::recursive_implode($glue, array $array, $include_keys = false, $trim_all = true);
```

Transforms an object (and object of object) into an array
```php
$new_array = HArray::object_to_array($obj);
```

Count in 2 dimensions arrays, number of rows in sub arrays
```php
$count = HArray::sub_count($array);
```

Cuts a string into an array of strings depending of word count
```php
$new_array = HArray::string_to_array($text, $word_count);
```

Inserts an element at a given position in an array
```php
$array = ['pomme', 'poire', 'fraise', 'banane'];
$array = HArray::array_insert($array, 'kiwi', 2);
Array
(
    [0] => pomme
    [1] => poire
    [2] => kiwi
    [3] => fraise
    [4] => banane
)

$array = ['pomme', 'poire', 'fraise', 'banane'];
$array = HArray::array_insert($array, ['kiwi', 'mangue'], 2);
Array
(
    [0] => pomme
    [1] => poire
    [2] => kiwi
    [3] => mangue
    [4] => fraise
    [5] => banane
)
```

## Unit Tests

```
composer exec phpunit
```

## Author

Hugo Maugey [visit my website ;)](https://hugo.maugey.fr)