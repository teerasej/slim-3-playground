<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

// กำหนดค่า configuration ต่างๆ ใช้ใน Web API
require 'setting.php';
$app = new \Slim\App(["settings" => $config]);

// สร้าง container และกำหนด PDO ไว้ต่อกับฐานข้อมูล
$container = $app->getContainer();
require 'pdo.php';

// Route ต่างๆ 
require 'routes/hello.php';
require 'routes/user.php';
require 'routes/room.php';

$app->get('/room/all', function(){ echo '/room/all'; });
$app->get('/room/reserve', function(){ echo '/room/reserve'; });

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->run();