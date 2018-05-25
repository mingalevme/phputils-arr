<?php

use Mingalevme\Utils\Arr;

if (! function_exists('array_compress')) {
    /**
     * Return a copy of $arr without any falsy values (including empty arrays)
     *
     * @param array $array
     * @return array|null
     */
    function array_compress(array $array)
    {
        return Arr::compress($array);
    }

    if (! function_exists('array_to_string')) {
        /**
         * Makes a string from array by concatenating each key with it value and subsequent concatenation
         * the resulted string with each other
         *
         * @param array $arr
         * @param string $kvsep Key and value separator ($key1$kvsep$value1)
         * @param string $psep Key-Value pairs separator ($key1$kvsep$value1$psep$key2$kvsep$value2$psep...)
         * @return string
         */
        function array_to_string(array $arr, $kvsep, $psep)
        {
            return Arr::toString($arr, $kvsep, $psep);
        }
    }

    if (! function_exists('array_get_object_with_key')) {
        /**
         * Looks for an array inside input array by key
         *
         * @param array $array
         * @param string $key
         * @param string $value
         * @return array
         */
        function array_get_object_with_key(array $array, $key)
        {
            return Arr::getObjectWithKeyAndValue($array, $key);
        }
    }

    if (! function_exists('array_has_object_with_key')) {
        /**
         * Looks for an array inside input array by key and value
         *
         * @param array $array
         * @param $key
         * @param $value
         * @return bool
         */
        function array_has_object_with_key(array $array, $key)
        {
            return Arr::hasObjectWithKey($array, $key);
        }
    }


    if (! function_exists('array_get_object_with_key_and_value')) {
        /**
         * Looks for an array inside input array by key and value
         *
         * @param array $array
         * @param string $key
         * @param string $value
         * @return array
         */
        function array_get_object_with_key_and_value(array $array, $key, $value)
        {
            return Arr::getObjectWithKeyAndValue($array, $key, $value);
        }
    }

    if (! function_exists('array_has_object_with_key_and_value')) {
        /**
         * Looks for an array inside input array by key and value
         *
         * @param array $array
         * @param string $key
         * @param string $value
         * @return bool
         */
        function array_has_object_with_key_and_value(array $array, $key, $value)
        {
            return Arr::hasObjectWithKeyAndValue($array, $key, $value);
        }
    }
}
