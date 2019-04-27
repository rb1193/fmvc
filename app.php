<?php

require_once 'controllers/name.php';
require_once 'routing/router.php';
require_once 'support/arr.php';
require_once 'support/comparisons.php';

function app(array $routes, array $request) {
    $route = route_request($routes, request_get_path_segments($request));
    $controller = arr_get($routes, $route);
    return $controller(
        bind_request_params(
            $request,
            $route
        )
    );
}

function bind_request_params(array $request, string $route): array
{
    return request_set_params(
        $request,
        array_combine(
            route_params($route),
            route_get_param_values($route, request_get_path_segments($request))
        )
    );
}

function route_get_param_values(string $route, array $path_segments): array {
    return arr_get_multiple(
        $path_segments,
        array_keys(
            route_params($route)
        )
    );
}