<?php

function request_make_from(array $server, array $request): array
{
    return array_merge($server, $request);
}

function request_get_path(array $request): string
{
    return arr_get($request, 'REQUEST_URI');
}

function request_get_path_segments($request): array
{
    return explode(
        '/',
        ltrim(request_get_path($request), '/')
    );
}

function request_get_method(array $request): string
{
    return arr_get($request, 'REQUEST_METHOD');
}

function request_get_param(array $request, string $key) {
    return arr_get(
        request_get_params($request),
        $key
    );
}

function request_get_params(array $request): array {
    return arr_get($request, 'params');
}

function request_set_params(array $request, array $params): array {
    return arr_set($request, 'params', $params); 
}