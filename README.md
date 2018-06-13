# Json

[![Build Status](https://travis-ci.org/usemarkup/json.svg?branch=master)](https://travis-ci.org/usemarkup/json)

Json wrapper to provide a more robust API matching PHP 7.3 with exceptions rather than errors.

The following json options are always used

- JSON_UNESCAPED_UNICODE
- JSON_BIGINT_AS_STRING
- JSON_THROW_ON_ERROR

## Usage

```php
try {
    $json = '{"a":1}';
    $data = Encoder::decode($json);

    $json = Encoder::encode($data);

} catch (\JsonException $exception) {
  echo $exception->getMessage(); // echoes "Syntax error"
}
```

## Reference

- https://ayesh.me/Upgrade-PHP-7.3#json-exceptions
- https://github.com/php/php-src/blob/master/ext/json/json.c#L257

## Similar Packages

- https://github.com/webmozart/json
- https://github.com/DaveRandom/ExceptionalJSON
- https://github.com/symfony/serializer/blob/master/Encoder/JsonEncoder.php
