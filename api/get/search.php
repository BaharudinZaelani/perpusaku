<?php 

$search = $_GET['search'];

$status = [
    "status" => "success",
    "data" => getS($search)
];

echo json_encode($status);