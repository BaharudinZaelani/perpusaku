<?php 
// call function
include "src/init.php";

// Logic
if ( isset($_POST['hapus']) ) {
    $idItem = $_POST['id'];
    queryOnce("DELETE FROM `buku` WHERE `buku`.`id` = $idItem");
    redirect("/dashboard.php");
}

$requestPinjam = getAllBuku("SELECT * FROM request");
// hapus peminjam
if ( isset($_POST['hapusPeminjam']) ) {
    $idPeminjam = $_POST['idP'];
    queryOnce("DELETE FROM `request` WHERE `request`.`id` = $idPeminjam");
    redirect("/dashboard.php");
}


// config
setWebTitle("PerpusAKU - Dashboard");
setTitle("PerpusAKU");
setContentFile("dashboard");

// call view
include "views/app.php";
