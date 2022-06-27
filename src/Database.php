<?php 
// global conn
$conn;

function conn(){
    global $conn;
    // database config
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db_name = "tugas_besar";
    $conn = mysqli_connect($host, $user, $pw, $db_name);
}