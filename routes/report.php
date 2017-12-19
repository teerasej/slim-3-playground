<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/report/month', function (Request $request, Response $response) {
    
    $db = $this->db;

    try {
        $statement = $db->prepare("SELECT * FROM nf_reserve.report");
        $statement->execute();
        $results = $statement->fetchAll();
        echo json_encode($results);
        // echo var_dump($results);
    } catch (PDOException $e) {
        echo var_dump($e);
    }

});


?>