<?php 
// call function
include "src/init.php";

// logic
if ( isset($_GET['key']) AND $_GET['key'] == "edit" ) {
    $itemId = $_GET['n'];
}else {
    redirect("/dashboard.php");
}

// config
setWebTitle("PerpusAKU - Edit");
setTitle("PerpusAKU");
setContentFile("edit");

// call view
include "views/app.php";
