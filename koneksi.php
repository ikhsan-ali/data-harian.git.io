<?php

$host="localhost";
$user="root";
$password="0301";
$db="crud";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
        die("Koneksi Gagal:".mysqli_connect_error());
        
}
?>