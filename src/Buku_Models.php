<?php 

/* ======================================
 * Buku Model
 * Mengatur database buku
 * =======================================
*/

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
