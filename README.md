# php-dotnet-datetime

[![Software License][ico-license]](LICENSE.md)

Tools for conversion between .NET and PHP DateTime objects

## Install

Via Composer

``` bash
$ composer require urbanplum/php-dotnet-datetime
```

## Usage

``` php
$phpDotnetDateTime = new \Urbanplum\PhpDotnetDateTime\PhpDotnetDateTime();

echo $phpDotnetDateTime->formatToPhp('yyyy-MM-dd hh\:mm\:ss');

// Y-m-d h:i:s
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email hello@johnsmith.io instead of using the issue tracker.

## Credits

- [John Smith][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/urbanplum/php-dotnet-datetime.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/urbanplum/php-dotnet-datetime/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/urbanplum/php-dotnet-datetime.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/urbanplum/php-dotnet-datetime.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/urbanplum/php-dotnet-datetime.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/urbanplum/php-dotnet-datetime
[link-travis]: https://travis-ci.org/urbanplum/php-dotnet-datetime
[link-scrutinizer]: https://scrutinizer-ci.com/g/urbanplum/php-dotnet-datetime/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/urbanplum/php-dotnet-datetime
[link-downloads]: https://packagist.org/packages/urbanplum/php-dotnet-datetime
[link-author]: https://github.com/john-n-smith
[link-contributors]: ../../contributors
