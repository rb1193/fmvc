<?php

function route_request(array $routes, array $path_segments): string {
    return array_key_first(
        array_filter(
            $routes,
            function ($route) use ($path_segments) {
                return path_matches(
                    route_path($route),
                    $path_segments
                );
            },
            ARRAY_FILTER_USE_KEY
        )
    );
}

function path_matches(array $route, array $path): bool {
    return !empty(array_filter(
        array_keys($route), function ($index) use ($route, $path) {
            return equals(arr_get($route, $index), arr_get($path, $index));
        }
    ));
}

function route_segments(string $route): array {
    return explode('/', $route);
}

function route_path(string $route): array {
    return array_filter(route_segments($route), function ($segment) {
        return notequals(substr($segment, 0, 1), ':');
    });
}

function route_params(string $route): array {
    return array_map(
        function ($param) {
            return ltrim($param, ':');
        },
        array_filter(route_segments($route), function ($segment) {
            return equals(substr($segment, 0, 1), ':');
        })
    );
}
