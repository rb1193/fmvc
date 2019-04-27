<?php

function controller_name_show(array $request): string {
    $name = request_get_param($request, 'name');
    return "Hello {$name}";
}