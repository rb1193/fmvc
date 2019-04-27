<?php

require_once 'controllers/name.php';
require_once 'routing/router.php';
require_once 'support/arr.php';
require_once 'support/comparisons.php';

function app(array $routes, array $request) {
    $route = route_request($routes, $request);
    $controller = arr_get($routes, $route);
    return $controller($request);
}