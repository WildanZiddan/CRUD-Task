<?php
require "config.php";

// Create a new record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $kelas_jurusan = $_POST["kelas_jurusan"];

    $sql = "INSERT INTO siswa (Nama, Tanggal_Lahir, Jenis_Kelamin, Kelas_dan_Jurusan) VALUES ('$nama', '$tanggal_lahir', '$jenis_kelamin', '$kelas_jurusan')";
    mysqli_query($connection, $sql);
}

// Delete a record
if (isset($_GET["delete_id"])) {
    $delete_id = $_GET["delete_id"];
    $sql = "DELETE FROM siswa WHERE id = $delete_id";
    mysqli_query($connection, $sql);
}

// Fetch records from the database
$sql = "SELECT * FROM siswa";
$result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" required><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <input type="text" name="jenis_kelamin" required><br>

        <label for="kelas_jurusan">Kelas & Jurusan:</label>
        <input type="text" name="kelas_jurusan" required><br>

        <input type="submit" name="add" value="Tambah">
    </form>

    <table>
        <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">Kelas & Jurusan</th>
          <th scope="col">Aksi</th>
        </tr>
        </thead>
        
        <tbody>
        <?php while( $row = mysqli_fetch_assoc($result) ): ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["Nama"] ?></td>
            <td><?= $row["Tanggal_Lahir"] ?></td>
            <td><?= $row["Jenis_Kelamin"] ?></td>
            <td><?= $row["Kelas_dan_Jurusan"] ?></td>
            <td><a href="?delete_id=<?= $row['id'] ?>">Hapus</a></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>