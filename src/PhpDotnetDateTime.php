<?php

namespace Urbanplum\PhpDotnetDateTime;

use Urbanplum\PhpDotnetDateTime\Format\FormatToPhp;

class PhpDotnetDateTime
{
    /**
     * Convert a .NET custom date format string to it's PHP equivalent.
     *
     * @param string $dotnetFormat
     *
     * @return string
     */
    public function formatToPhp($dotnetFormat)
    {
        $formatToPhp = new FormatToPhp();

        return $formatToPhp->convert($dotnetFormat);
    }
}
