<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
      
        if (password_verify($password, $row['password'])) {
            
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            
            echo "<script>
                    alert('Halo " . $row['username'] . ", Selamat datang kembali!');
                    window.location='dashboard.php';
                  </script>";
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Focus Path</title>
    <style>
        body { font-family: sans-serif; background-color: #f4c2c2; display: flex; justify-content: center; padding-top: 100px; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 320px; }
        h2 { text-align: center; color: #333; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #f5a6d8; border-radius: 6px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #ffa6c9; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #ff91a4; }
        .error { color: #e74c3c; font-size: 14px; text-align: center; margin-bottom: 10px; }
        .reg-link { text-align: center; margin-top: 15px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Login Focus Path</h2>
        
        <?php if(isset($error)) : ?>
            <p class="error">Email atau Password salah, coba cek lagi ya!</p>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="email" name="email" placeholder="Masukkan Email" required>
            <input type="password" name="password" placeholder="Masukkan Password" required>
            <button type="submit" name="login">Login</button>
        </form>

        <div class="reg-link">
            Belum punya akun? <a href="register.php">Daftar di sini</a>
        </div>
    </div>
</body>
</html>