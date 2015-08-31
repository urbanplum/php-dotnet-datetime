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

    /**
     * @dataProvider testConvertDataProvider
     */
    public function testConvert($phpFormat, $dotnetFormat)
    {
        $this->assertSame($phpFormat, $this->formatToPhp->convert($dotnetFormat));
    }

    public function testConvertDataProvider()
    {
        // php format => .net format
        return [
            // individual .net specifiers
            ['j', 'd'],
            ['d', 'dd'],
            ['D', 'ddd'],
            ['l', 'dddd'],
            ['u', 'ffffff'],
            ['g', 'h'],
            ['h', 'hh'],
            ['G', 'H'],
            ['H', 'HH'],
            ['i', 'mm'],
            ['n', 'M'],
            ['m', 'MM'],
            ['M', 'MMM'],
            ['F', 'MMMM'],
            ['s', 'ss'],
            ['A', 'tt'],
            ['y', 'yy'],
            ['Y', 'yyyy'],

            // escaping .net specifiers for a literal output
            ['K', '\K'],

            // literal characters in .net are escaped if they are php specifiers
            ['\U', 'U'],

            // escaped .net specifiers are escaped if they are php specifiers
            ['\d', '\d'],

            // dotnet quoted strings
            ['x\y\l\op\h\o\n\e b\l\ubb\e\r', "'xylophone blubber'"],
            ['x\y\l\op\h\o\n\e b\l\ubb\e\r', '"xylophone blubber"'],

            // dotnet quoted backslashes are literals
            ['bb\\\\xx', "'bb\\xx'"],
            ['bb\\\\xx', '"bb\\xx"'],

            // common separators
            ['dmy', "dd''MM''yy"],
            ['d m Y', "dd' 'MM' 'yyyy"],
            ['d.m.Y', "dd'.'MM'.'yyyy"],
            ['d,m,Y', "dd','MM','yyyy"],
            ['d-m-Y', "dd'-'MM'-'yyyy"],
            ['d\\\\m\\\\Y', "dd'\'MM'\'yyyy"],
            ['d:m:Y', "dd':'MM':'yyyy"],
            ['d/m/Y', "dd'/'MM'/'yyyy"]
        ];
    }
}
