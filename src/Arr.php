<?php

namespace Mingalevme\Utils;

class Arr
{
    /**
     * Recursively remove elements and from an array using a callback function
     *
     * @param array $arr
     * @param callable $callback
     * @return null
     */
    public static function filter(array $arr, callable $callback)
    {
        foreach ($arr as $key => $value) {

            if (is_array($value) && count($value) > 0) {
                $arr[$key] = static::filter($value, $callback);
            }

            if (!call_user_func($callback, $arr[$key], $key)) {
                unset($arr[$key]);
            }

        }

        return $arr;
    }

    /**
     * Return a copy of $arr without any falsy values (including empty arrays)
     *
     * @param array $arr
     * @return array
     */
    public static function compress($arr)
    {
        return static::filter($arr, function($value){
            return (bool) $value;
        });

    }
    /**
     * Get a value from the array, and remove it.
     *
     * @param  array   $array
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public static function pull(&$array, $key, $default = null)
    {
        if (array_key_exists($key, $array)) {
            $value = $array[$key];
            unset($array[$key]);
        } else {
            $value = $default;
        }

        return $value;
    }

    /**
     * Rename array key
     *
     * @param $array
     * @param $old
     * @param $new
     */
    public static function rename(&$array, $old, $new)
    {
        $array[$new] = static::pull($array, $old);
    }

    /**
     * Makes a string from array by concatenating each key with it value and subsequent concatenation
     * the resulted string with each other
     *
     * @param array $arr
     * @param string $kvsep Key and value separator ($key1$kvsep$value1)
     * @param string $psep Key-Value pairs separator ($key1$kvsep$value1$psep$key2$kvsep$value2$psep...)
     * @return string
     */
    public static function toString(array $arr, $kvsep, $psep)
    {
        $result = [];

        foreach ($arr as $k => $v) {
            $result[] = "{$k}{$kvsep}{$v}";
        }

        return implode($psep, $result);
    }

    /**
     * Looks for an array inside input array by key and returns one if found
     *
     * @param array $array
     * @param $key
     * @param $value
     * @return array
     */
    public static function getObjectWithKey(array $array, $key)
    {
        foreach ($array as $object) {
            if (is_array($object) && array_key_exists($key, $object)) {
                return $object;
            }
        }

        return null;
    }

    /**
     * Looks for an array inside input array by key
     *
     * @param array $array
     * @param $key
     * @param $value
     * @return bool
     */
    public static function hasObjectWithKey(array $array, $key)
    {
        return self::getObjectWithKey($array, $key) !== null;
    }

    /**
     * Looks for an array inside input array by key and value and returns one if found
     *
     * @param array $array
     * @param $key
     * @param $value
     * @return array
     */
    public static function getObjectWithKeyAndValue(array $array, $key, $value)
    {
        foreach ($array as $object) {
            if (is_array($object) && array_key_exists($key, $object) && $object[$key] === $value) {
                return $object;
            }
        }

        return null;
    }

    /**
     * Looks for an array inside input array by key and value
     *
     * @param array $array
     * @param $key
     * @param $value
     * @return bool
     */
    public static function hasObjectWithKeyAndValue(array $array, $key, $value)
    {
        return self::getObjectWithKeyAndValue($array, $key, $value) !== null;
    }
}
