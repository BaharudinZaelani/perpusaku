<?php 
// call function
include "src/init.php";

// logic
if ( isset($_GET['item']) ) {
    $itemId = $_GET['item'];

    // data buku
    $data = [];
    $buku = getAllBuku();
    foreach( $buku as $row ) {
        if ( $row['id'] == $itemId ) {
            $data[] = $row;
        }
    }
    $data = $data[0];

    // data pinjam
    $pinjam = getAllBuku("SELECT * FROM `request` WHERE `buku_id` = " . $data['id']);

}else {
    redirect("/");
}

// config
setWebTitle("PerpusAKU");
setTitle("PerpusAKU");
setContentFile("item");

// call view
include "views/app.php";
