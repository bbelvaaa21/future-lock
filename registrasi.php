<?php 
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Enkripsi password agar aman di database
    $password_acak = password_hash($password, PASSWORD_DEFAULT);
    // Query masukkan data ke tabel users
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_acak')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Register Berhasil, Princess! Silakan Login.');
                window.location='login.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Focus Path</title>
    <style>
        body { font-family: sans-serif; background-color: #f2bdcd; display: flex; justify-content: center; padding-top: 50px; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ffcaeb; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #f6a2e7e6; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #f61e83; }
    </style>
</head>
<body>
    <div class="card">
        <h2 style="text-align: center;">Join Focus Path</h2>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Daftar Sekarang</button>
        </form>
    </div>
</body>
</html>
