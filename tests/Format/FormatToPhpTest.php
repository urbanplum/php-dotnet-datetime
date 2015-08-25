<?php
namespace Urbanplum\DotnetDateTime\Test\Format;

use Urbanplum\DotnetDateTime\Format\FormatToPhp;

class FormatToPhpTest extends \PHPUnit_Framework_TestCase
{
    protected $formatToPhp;

    public function setUp()
    {
        $this->formatToPhp = new FormatToPhp();
    }

    public function testConvert()
    {
        // test individual specifiers
        $this->assertSame('j', $this->formatToPhp->convert('d'));
        $this->assertSame('d', $this->formatToPhp->convert('dd'));
        $this->assertSame('D', $this->formatToPhp->convert('ddd'));
        $this->assertSame('l', $this->formatToPhp->convert('dddd'));
        $this->assertSame('u', $this->formatToPhp->convert('ffffff'));
        $this->assertSame('g', $this->formatToPhp->convert('h'));
        $this->assertSame('h', $this->formatToPhp->convert('hh'));
        $this->assertSame('G', $this->formatToPhp->convert('H'));
        $this->assertSame('H', $this->formatToPhp->convert('HH'));
        $this->assertSame('i', $this->formatToPhp->convert('mm'));
        $this->assertSame('n', $this->formatToPhp->convert('M'));
        $this->assertSame('m', $this->formatToPhp->convert('MM'));
        $this->assertSame('M', $this->formatToPhp->convert('MMM'));
        $this->assertSame('F', $this->formatToPhp->convert('MMMM'));
        $this->assertSame('s', $this->formatToPhp->convert('ss'));
        $this->assertSame('A', $this->formatToPhp->convert('tt'));
        $this->assertSame('y', $this->formatToPhp->convert('yy'));
        $this->assertSame('Y', $this->formatToPhp->convert('yyyy'));

        // test .net escaped strings
        $this->assertSame('K', $this->formatToPhp->convert('\K'));

        //test PHP specifiers are escaped
        $this->assertSame('\U', $this->formatToPhp->convert('U'));

        // test string escaped in both PHP and .net
        $this->assertSame('\d', $this->formatToPhp->convert('\d'));

        // test dotnet quoted strings
        $this->assertSame('x\y\l\op\h\o\n\e b\l\ubb\e\r', $this->formatToPhp->convert('"xylophone blubber"'));
        $this->assertSame('x\y\l\op\h\o\n\e b\l\ubb\e\r', $this->formatToPhp->convert("'xylophone blubber'"));
        $this->assertSame('dmy', $this->formatToPhp->convert("dd''MM''yy"));

        // put it all together
        $this->assertSame(
            '\t\h\e \d\a\t\e \i\s \n\o\w d-m-y h:i:s / g:i A. \y\e\s \i\t \i\s',
            $this->formatToPhp->convert('"the date is" now dd-MM-yy hh\:mm\:ss \/ h\:mm tt. \ye\s' . "' it is'")
        );
    }
}
