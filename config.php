<?php
//Tilda Källström 2022

//Autoload classes
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.class.php';
});


//DB settings localhost
define("DBHOST", "");
define("DBUSER", "");
define("DBPASS", "");
define("DBDATABASE", "");

$host = "";
$user = "";
$pass = "";
$dbb = "";
$conn = mysqli_connect($host, $user, $pass, $dbb);


// Start session
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}