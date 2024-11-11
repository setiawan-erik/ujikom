<?php
    $hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname   = 'galerifoto';
	
	$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('gagal terhubung ke database');

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>