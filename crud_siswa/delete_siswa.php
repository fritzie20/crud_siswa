<?php
include 'dbconnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM siswa WHERE id = $id";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: data_siswa.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
