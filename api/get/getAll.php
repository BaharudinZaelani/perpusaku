<?php 

$status = [
    "status" => "success",
    "data" => getAllBuku()
];

header("HTTP/1.1 200 OK");
echo json_encode($status);
