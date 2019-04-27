<?php

function route_request(array $routes, array $request) {
    $path = request_get_path($request);
    return array_filter(
        array_keys($routes),
        function ($route) use ($path) {
            //Match route and return
        }
    );
}

function parse_route(string $route): array {
    
    return array_merge(
        route_paths(
            route_segments($route)
        ),
        route_params(
            route_segments($route)
        )
    );
}

function route_segments(string $route): array {
    return explode('/', $route);
}

function route_paths(array $segments): array {
    return array_filter($segments, function ($segment) {
        return notequals(substr($segment, 0, 1), ':');
    });
}

function route_params(array $segments): array {
    return array_filter($segments, function ($segment) {
        return equals(substr($segment, 0, 1), ':');
    });
}
