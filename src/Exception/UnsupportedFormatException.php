<?php

namespace Urbanplum\PhpDotnetDateTime\Exception;

use \InvalidArgumentException;

class UnsupportedFormatException extends InvalidArgumentException
{
    protected $format;

    protected $match;

    /**
     * @param string $format
     * @param string $match
     * @param Exception $previous
     *
     * @return void
     */
    public function __construct($format, $match = null, Exception $previous = null)
    {
        $this->format = $format;
        $this->match = $match;

        $message = sprintf('No direct equivalent for "%s" in [%s]', $match, $format);

        parent::__construct($message, 0, $previous);
    }
    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @return string
     */
    public function getMatch()
    {
        return $this->match;
    }
}
