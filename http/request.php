<?php

function request_make_from(array $server, array $request): array
{
    return array_merge($server, $request);
}

function request_get_path(array $request): string
{
    return arr_get($request, 'REQUEST_URI');
}

function request_get_method(array $request): string
{
    return arr_get($request, 'REQUEST_METHOD');
}