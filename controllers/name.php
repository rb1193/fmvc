<?php

function controller_name_show(array $request) {
    $name = arr_get($request, 'name');
    return "Hello {$name}";
}