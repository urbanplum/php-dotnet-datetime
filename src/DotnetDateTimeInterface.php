<?php

namespace Urbanplum\DotnetDateTime;

interface DotnetDateTimeInterface
{
    /**
     * Convert a .NET custom date format string to it's PHP equivalent.
     *
     * @param string $dotnetFormat
     *
     * @return string
     */
    public function formatToPhp($dotnetFormat);
}
