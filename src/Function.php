<?php 
// start session
session_start();

// set web title
function setWebTitle($value){
    global $webTitle;
    $webTitle = $value;
}

// set title
function setTitle($value){
    global $title;
    $title = $value;
}


/* ======================================
 * Controller
 * link dari css/font atau dll
 * =======================================
*/
function asset($uri){
    return URI . "assets/" . $uri;
}

/* ======================================
 * Content View
 * Untuk mengatur front-end dari website
 * =======================================
*/

// config
$webTitle = "";
$contentFile = "";
$title = "";

// Navbar set
function getNavbar(){
    global $title;
    include "views/components/navbar.php";
}

// content view
function setContentFile($fileName){
    global $contentFile;
    $contentFile = "views/content/" .  $fileName . ".php";
}
