<?php

function prepareJsonResponse($data, $success)
{
    ob_clean();
    header_remove();
    
    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json; charset=utf-8");

    if ($success) {
        http_response_code(200);
    } else {
        http_response_code(400);
    }

    echo json_encode($data);

    exit();
}
