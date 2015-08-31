<?php

namespace Urbanplum\DotnetDateTime\Format;

use Urbanplum\DotnetDateTime\Exception\UnsupportedFormatException;

class FormatToPhp
{
    const SPECIFIER_CHARACTERS_DOTNET = 'dfFghHKmMstyz:\/\\\\';

    const PATTERN_STRING_LITERALS_DOTNET = '/"[^"]*"|\'[^\']*\'|\\\[%s]|[^%s]/';

    const PATTERN_SPECIFIERS_DOTNET = '/(([%s](?<!%%s))(\2*))/';

    const PATTERN_SPECIFIERS_PHP = '/[dDjlNSwzWFmMntLoYyaABgGhHisueIOPTZcrU\\\\]/';

    /**
     * Maps .NET specifiers to their PHP equivalents.
     *
     * @var Array
     */
    protected $dotnetToPhp = [
        'd'         => 'j', // The day of the month, from 1 through 31.
        'dd'        => 'd', // The day of the month, from 01 through 31.
        'ddd'       => 'D', // The abbreviated name of the day of the week. Mon, Tue, ...
        'dddd'      => 'l', // The full name of the day of the week. Monday, Tuesday, ...
        'ffffff'    => 'u', // The millionths of a second in a date and time value.
        'h'         => 'g', // The hour, using a 12-hour clock from 1 to 12.
        'hh'        => 'h', // The hour, using a 12-hour clock from 01 to 12.
        'H'         => 'G', // The hour, using a 24-hour clock from 0 to 23.
        'HH'        => 'H', // The hour, using a 24-hour clock from 00 to 23.
        'mm'        => 'i', // The minute, from 00 through 59.
        'M'         => 'n', // The month, from 1 through 12.
        'MM'        => 'm', // The month, from 01 through 12.
        'MMM'       => 'M', // The abbreviated name of the month. Jan, Feb, ...
        'MMMM'      => 'F', // The full name of the month. January, February, ...
        'ss'        => 's', // The second, from 00 through 59.
        'tt'        => 'A', // The AM/PM designator.
        'yy'        => 'y', // The year, from 00 to 99.
        'yyyy'      => 'Y', // The year as a four-digit number.
    ];

    /**
     * Convert a .NET custom date format string to it's PHP equivalent.
     *
     * @param string $dotnetFormat
     *
     * @return string
     *
     * @throws UnsupportedFormatException
     */
    public function convert($dotnetFormat)
    {
        // get string literals and replace with a placeholder to make specifier matching simpler
        $stringLiterals = [];

        $callback = function ($matches) use (&$stringLiterals) {
            $stringLiterals[] = reset($matches);
            return '%s';
        };

        $dotnetFormatPlaceholders = preg_replace_callback(
            $this->getPatternStringLiteralsDotNet(),
            $callback,
            $dotnetFormat
        );

        // match .NET specifiers
        $callback = function ($matches) use ($dotnetFormat) {
            $specifier = reset($matches);

            if (!isset($this->dotnetToPhp[$specifier])) {
                throw new UnsupportedFormatException($dotnetFormat, $specifier);
            }

            return $this->dotnetToPhp[$specifier];
        };

        $phpFormatPlaceholders = preg_replace_callback(
            $this->getPatternSpecifiersDotnet(),
            $callback,
            $dotnetFormatPlaceholders
        );

        // remove slashes from literals
        $callback = function ($value) {
            if ($value == '\\') {
                // don't remove single slashes - these are literal slashes
                return $value;
            }

            // slashes within quotes are literal slashes
            if (preg_match('/^["\'].+["\']$/', $value)) {
                return $value;
            }

            $value = stripslashes($value);

            return $value;
        };

        $stringLiterals = array_map($callback, $stringLiterals);

        // remove quotes from literals
        $stringLiterals = str_replace(['"', '\''], '', $stringLiterals);

        // escape any PHP specifier characters that appear in the string literals
        $callback = function ($matches) {
            $match = reset($matches);
            return '\\' . $match;
        };

        $stringLiterals = preg_replace_callback($this->getPatternSpecifiersPhp(), $callback, $stringLiterals);

        // replace placeholders with string literals
        return vsprintf($phpFormatPlaceholders, $stringLiterals);
    }

    /**
     * @return string
     */
    protected function getPatternSpecifiersDotnet()
    {
        return sprintf(self::PATTERN_SPECIFIERS_DOTNET, self::SPECIFIER_CHARACTERS_DOTNET);
    }

    /**
     * @return string
     */
    protected function getPatternStringLiteralsDotNet()
    {
        return sprintf(
            self::PATTERN_STRING_LITERALS_DOTNET,
            self::SPECIFIER_CHARACTERS_DOTNET,
            self::SPECIFIER_CHARACTERS_DOTNET
        );
    }

    /**
     * @return string
     */
    protected function getPatternSpecifiersPhp()
    {
        return self::PATTERN_SPECIFIERS_PHP;
    }
}
