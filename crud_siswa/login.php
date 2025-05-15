<?php include 'dbconnect.php'; session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Form Login</h2>
    <form method="post" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" name="login" value="Login">
    </form>

    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) == 1) {
            $_SESSION['username'] = $username;
            header("Location: data_siswa.php");
            exit;
        } else {
            echo "<p style='color:red;'>Login gagal! Username atau password salah.</p>";
        }
    }
    ?>
</body>
</html>
