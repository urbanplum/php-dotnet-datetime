<?php

namespace Urbanplum\DotnetDateTime;

use Urbanplum\DotnetDateTime\Format\FormatToPhp;

class DotnetDateTime implements DotnetDateTimeInterface
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
