<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'db_infrastruktur';

$conn = mysqli_connect($host, $user, $pass, $db_name);
if($conn) {
    //echo "Koneksi Berhasil";
}

mysqli_select_db($conn, $db_name);

?>