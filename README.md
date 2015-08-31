# dotnet-datetime

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)

Tools for conversion between .NET and PHP DateTime objects

## Install

Via Composer

``` bash
$ composer require urbanplum/dotnet-datetime
```

## Usage

``` php
$dotnetDateTime = new \Urbanplum\DotnetDateTime\DotnetDateTime();

echo $dotnetDateTime->formatToPhp('yyyy-MM-dd hh\:mm\:ss');

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

[ico-version]: https://img.shields.io/packagist/v/urbanplum/dotnet-datetime.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/urbanplum/dotnet-datetime.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/urbanplum/dotnet-datetime
[link-downloads]: https://packagist.org/packages/urbanplum/dotnet-datetime
[link-author]: https://github.com/john-n-smith
[link-contributors]: ../../contributors
