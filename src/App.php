<?php 
// start session
session_start();

function getTime(){
    date_default_timezone_set("Asia/Jakarta");
    return date('Y-m-d H:i:s');
}