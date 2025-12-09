<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "CREATE DATABASE ujian_1";
if ($conn->query($sql) === TRUE) {
    echo "Database berhasil dibuat";
} else {
    echo "Error membuat database: " . $conn->error;
}

$conn->close();

$conn = new mysqli($servername, $username, $password, "ujian_1");

$sql = "CREATE TABLE siswa (
    id INT AUTO_INCREMENT,
    nama_lengkap VARCHAR(255),
    nis VARCHAR(255),
    kelas VARCHAR(255),
    jurusan VARCHAR(255),
    PRIMARY KEY (id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabel berhasil dibuat";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

$conn->close();
?>
