<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ujian_dafi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['save'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO siswa (nama_lengkap, nis, kelas, jurusan) VALUES ('$nama_lengkap', '$nis', '$kelas', '$jurusan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $sql = "UPDATE siswa SET nama_lengkap='$nama_lengkap', nis='$nis', kelas='$kelas', jurusan='$jurusan' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM siswa WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post">
    <label>nama lengkap:</label>
    <input type="text" name="nama_lengkap"><br>
    <label>NIS:</label>
    <input type="text" name="nis"><br>
    <label>Kelas:</label>
    <input type="text" name="kelas"><br>
    <label>Jurusan:</label>
    <input type="text" name="jurusan"><br>
    <input type="submit" name="save" value="Save">
    <input type="submit" name="edit" value="Edit">
    <input type="submit" name="delete" value="Delete">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
</form>

<table>
    <tr>
        <th>nama lengkap</th>
        <th>NIS</th>
        <th>kelas</th>
        <th>Jurusan</th>
    </tr>
    <?php
    $sql = "SELECT * FROM siswa";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nama_lengkap'] . "</td>";
            echo "<td>" . $row['nis'] . "</td>";
            echo "<td>" . $row['kelas'] . "</td>";
            echo "<td>" . $row['jurusan'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "Tidak ada data";
    }
    ?>
</table>
