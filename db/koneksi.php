<?php
$server ="localhost";
$user ="root";
$password ="";
$nama_database ="perpus";

$db = mysqli_connect($server,$user,$password,$nama_database);

if (!$db) {
    die("Connection failed: ". mysqli_connect_error());
}
?>