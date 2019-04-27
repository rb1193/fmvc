<?php

require_once 'app.php';
require_once 'http/request.php';

echo app(
    [
        'name/:name' => 'controller_name_show'
    ],
    request_make_from($_SERVER, $_REQUEST)
);