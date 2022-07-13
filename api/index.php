<?php 
include "../src/init.php";

// header 
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

// App
if ( isset($_GET['key']) ) {
    $key = $_GET['key'];
    
    // GET Request
    if( $method == "GET" ){
        // jika getAll
        if( $key == "get_all" )
            include "get/getAll.php";
            exit;

        // search ada
        if( $key == "get" AND isset($_GET['search']) )
            include "get/search.php";
            exit;

        // get request pinjam
        if ( $key == "get_request" )
            include "get/get_request.php"; 
            exit;
    }

    // POST Request
    if ( $method == "POST" ){
        if ( $key == "upload_buku" ){
            $nama = "";
            $deskripsi = "";
            $pengarang = "";
            $tahun = "";

            if( isset($_GET['nama']) )
                $nama = $_GET['nama'];
            
            if ( isset($_GET['deskripsi']) )
                $deskripsi = $_GET['deskripsi'];

            if ( isset($_GET['pengarang']) )
                $pengarang = $_GET['pengarang'];
                
            if ( isset($_GET['tahun']) )
                $tahun = $_GET['tahun'];

            // execute
            $result = tambahBuku($nama, $deskripsi, $pengarang, $tahun);
            echo json_encode($result);
        }
    }
    
}else {
    $status = [
        "status" => "error",
        "message" => "harap masukan key !"
    ];
    header("HTTP/1.1 404 Not Found");

    echo json_encode($status);
}
