<?php 

$data = [];
$result = queryOnce("SELECT * FROM request");

$status = [
    "status" => "success",
    "data" => $result
];

header("HTTP/1.1 200 OK");
echo json_encode($status);
