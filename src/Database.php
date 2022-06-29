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

function queryOnce($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

/* ======================================
 * Login/Logout system
 * User Login dan mengecek apakah sudah login ?
 * =======================================
*/
function login($username, $pass){
    
    // jika kosong
    if ( $username == "" AND $pass == "" ){
        header("HTTP/1.1 501 Internal Server Error");
        return [
            "status" => "failed",
            "message" => "Login gagal user tidak ditemukan didatabase kami :/"
        ];
    }

    $query = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$pass'";

    $check = queryOnce($query);
    
    if( $check !== NULL ){
        return $_SESSION['user'] = [
            "login" => true,
            "username" => $check['username'],
            "login_time" => getTime()
        ];
    }
}

function logout(){
    $_SESSION['user'] = [];
    unset($_SESSION['user']);
}