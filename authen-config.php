<?php

$app->add(new \Slim\Middleware\JwtAuthentication([
    "secret" => 'teerasej',
    "path" => ["/restricted","/report/month"]
]));

?>