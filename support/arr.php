<?php

function arr_get(array $array, string $key) {
    return $array[$key];
}

function arr_get_multiple(array $array, array $keys): array {
    return array_map(function ($key) use ($array) {
        return arr_get($array, $key);
    }, $keys);
}

function arr_set(array $array, string $key, $value): array {
    return array_merge($array, [$key => $value]);
}

function array_key_first(array $array) {
    $keys = array_reverse(array_keys($array));
    return array_pop($keys);
}