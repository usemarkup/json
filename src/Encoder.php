<?php
declare(strict_types=1);

namespace Markup\Json;

final class Encoder
{
    /**
     * @param string $json
     * @param bool $assoc
     * @param int $depth
     * @param int $options
     * @return mixed|null
     *
     * @throws \JsonException
     */
    public static function decode(string $json, bool $assoc = false, int $depth = 512, $options = 0)
    {
        return markup_json_decode($json, $assoc, $depth, $options);
    }

    /**
     * @param mixed $value
     * @param int $options
     * @param int $depth
     * @return string
     *
     * @throws \JsonException
     */
    public static function encode($value, $options = 0, int $depth = 512)
    {
        return markup_json_encode($value, $options, $depth);
    }
}
