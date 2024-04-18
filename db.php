<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'toko_sepatu';

    $connect = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung ke database');
?>