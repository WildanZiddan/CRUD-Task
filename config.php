<?php
$connection = mysqli_connect("localhost", "root", "", "tugas1");
$result = mysqli_query($connection, "SELECT * FROM siswa");


if (!$connection){
    die("Failed to connect");
}
?>