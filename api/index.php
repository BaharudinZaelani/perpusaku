<?php 
include "../src/init.php";

// get all
function getAllBuku(){
    global $conn;
    $query = "SELECT * FROM buku";
    $exec = mysqli_query($conn, $query);
    $result = [];
    while ($row = mysqli_fetch_assoc($exec)) {
        $result[] = $row;
    }
    return $result;
}

// get search buku
function getS($key = ""){
    global $conn;
    $query = "SELECT * FROM `buku` WHERE `nama` LIKE '%$key%'";
    $exec = mysqli_query($conn, $query);
    $hasil = [];
    while ( $result = mysqli_fetch_assoc($exec) ) {
        $hasil[] = $result;
    }
    return $hasil;
}

// Tambah Buku
function tambahBuku($nama, $deskripsi, $pengarang, $tahun){
    global $conn;
    $query = "
        INSERT INTO `buku` (`id`, `nama`, `deskripsi`, `pengarang`, `tahun_terbit`) VALUES (NULL, '$nama', '$deskripsi', '$pengarang', '$tahun');
    ";
    try {    
        mysqli_query($conn, $query);
        return [
            "status" => "success",
            "message" => "$nama Berhasil ditambahkan"
        ];
    }catch( Exception $e ){
        header("HTTP/1.1 501 Internal Server Error");
        return [
            "status" => "failed",
            "message" => "$nama Gagal ditambahkan"
        ];
    }
}

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

        // search ada
        if( $key == "get" AND isset($_GET['search']) )
            include "get/search.php";
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
