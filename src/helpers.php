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
}
