<?php 

$buku = getAllBuku();
$pinjam = getAllBuku("SELECT * FROM request");

$status = [
    "status" => "success",
    "data" => $buku
];

header("HTTP/1.1 200 OK");
echo json_encode($status);