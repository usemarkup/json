<?php
declare(strict_types=1);

if (PHP_VERSION_ID >= 70300) {
    /**
     * @internal
     */
    function markup_json_decode($json, $assoc = false, $depth = 512, $options = 0)
    {
        $decoded = json_decode(
            $json,
            $assoc,
            $depth,
            $options | JSON_THROW_ON_ERROR | JSON_BIGINT_AS_STRING | JSON_UNESCAPED_UNICODE
        );

        if ($decoded === null && $json === 'null') {
            return null;
        }

        return $decoded;
    }

    /**
     * @internal
     */
    function markup_json_encode($value, $options = 0, $depth = 512)
    {
        return json_encode(
            $value,
            ($options & ~JSON_PARTIAL_OUTPUT_ON_ERROR) | JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE,
            $depth
        );
    }
}
