<?php
declare(strict_types=1);

if (PHP_VERSION_ID < 70300) {
    define('JSON_THROW_ON_ERROR', 4194304);

    //phpcs:disable
    class JsonException extends \RuntimeException
    {

    }

    // phpcs:enable

    /**
     * @internal
     */
    function markup_json_decode($json, $assoc = false, $depth = 512, $options = 0)
    {
        $decoded = json_decode($json, $assoc, $depth, $options | JSON_BIGINT_AS_STRING | JSON_UNESCAPED_UNICODE);

        if ($decoded === null && $json === 'null') {
            return null;
        }

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new JsonException(json_last_error_msg());
        }

        return $decoded;
    }

    /**
     * @internal
     */
    function markup_json_encode($value, $options = 0, $depth = 512)
    {
        $encoded = json_encode($value, ($options & ~JSON_PARTIAL_OUTPUT_ON_ERROR) | JSON_UNESCAPED_UNICODE, $depth);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new JsonException(json_last_error_msg());
        }

        return $encoded;
    }
}
