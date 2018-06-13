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

        Encoder::decode($json);
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