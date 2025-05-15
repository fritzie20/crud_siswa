<?php include 'dbconnect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        .action-btn {
            margin-right: 5px;
        }
    </style>
    
</head>
<body>
    <h2 style="text-align: center;">Data Siswa</h2>

    <p>
    <a href="form_siswa.php" style="padding: 8px 12px; background-color:rgb(69, 61, 208); color: white; text-decoration: none; border-radius: 4px;">
        + Tambah
    </a>
</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = "SELECT * FROM siswa";
            $query = mysqli_query($conn, $sql);

            while ($data = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $data['nis'] . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['kelas'] . "</td>";
                echo "<td>" . $data['jurusan'] . "</td>";
                echo "<td>
                        <a class='action-btn' href='edit_siswa.php?id=" . $data['id'] . "'>Edit</a>
                        <a class='action-btn' href='delete_siswa.php?id=" . $data['id'] . "' onclick=\"return confirm('Yakin ingin menghapus?');\">Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
