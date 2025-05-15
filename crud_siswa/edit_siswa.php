<?php
include 'dbconnect.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM siswa WHERE id = $id";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}


if (isset($_POST['UPDATE'])) {
    $nis     = $_POST['nis'];
    $nama    = $_POST['nama'];
    $kelas   = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $update = "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE id=$id";
    $result = mysqli_query($conn, $update);

    if ($result) {
        echo "<script>alert('Data berhasil diperbarui'); window.location.href='data_siswa.php';</script>";
    } else {
        echo "<p>Gagal memperbarui data: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>
    <style>
        table {
            margin-top: 20px;
        }

        td {
            padding: 8px;
        }
    </style>
</head>
<body>
    <h2>Edit Data Siswa</h2>
    <form method="post">
        <table>
            <tr>
                <td><label for="nis">NIS:</label></td>
                <td><input type="text" name="nis" value="<?php echo $data['nis']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="kelas">Kelas:</label></td>
                <td><input type="text" name="kelas" value="<?php echo $data['kelas']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan:</label></td>
                <td><input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="UPDATE" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>
