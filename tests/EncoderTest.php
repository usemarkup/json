<?php

namespace Markup\Json\Tests;

use Markup\Json\Encoder;
use PHPUnit\Framework\TestCase;

class EncoderTest extends TestCase
{
    public function testValidDecode()
    {
        $json = '{"a":1}';

        $this->assertEquals(['a' => 1], Encoder::decode($json, true));
    }

    public function testInvalidDecode()
    {
        $json = '{';

        $this->expectException(\JsonException::class);
        $this->expectExceptionMessage('Syntax error');

        Encoder::decode($json);
    }

    public function testDecodeOnNullString()
    {
        $this->assertNull(Encoder::decode('null'));
    }

    public function testEncodeOnNonUtf8String()
    {
        $this->expectException(\JsonException::class);
        $this->expectExceptionMessage('Malformed UTF-8 characters, possibly incorrectly encoded');

        Encoder::encode("\xB1\x31");
    }
    

    public function testEncodeOnUtf8String()
    {
        $result = Encoder::encode("hello 😂 world");
        
        $this->assertEquals('"hello 😂 world"');
    }    

    public function testValidEncode()
    {
        $data = [
            [
                'name' => 'Steve',
            ],
            [
                'name' => 'Bob',
            ]
        ];

        $json = Encoder::encode($data);
        $this->assertEquals('[{"name":"Steve"},{"name":"Bob"}]', $json);
    }
}
