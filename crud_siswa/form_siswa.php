<?php include 'dbconnect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Siswa</title>
</head>
<body>
    
    <h2>Tambah Data Siswa</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="nis">NIS : </label></td>
                <td> <input type="text" name="nis" required></td>
            </tr>
       
            <tr>
                <td><label for="nama">Nama : </label></td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td><label for="kelas">Kelas : </label></td>
                <td><input type="text" name="kelas" required></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan : </label></td>
                <td><input type="text" name="jurusan" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="TAMBAH"></td>
            </tr>
        </table>
    </form>

    

    <?php
    if (isset($_POST['submit'])) {
        $nis     = $_POST['nis'];
        $nama    = $_POST['nama'];
        $kelas   = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];

        $sql = "INSERT INTO siswa (nis, nama, kelas, jurusan) VALUES ('$nis', '$nama', '$kelas', '$jurusan')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan'); window.location.href='data_siswa.php';</script>";
        } else {
            echo "<p>Gagal menyimpan data: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</body>
</html>
