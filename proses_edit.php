<?php
<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM users WHERE id_user='$id'");
$row = mysqli_fetch_array($data);
?>

<form action="proses_edit.php" method="POST">
    <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
    
    <label>Username:</label><br>
    <input type="text" name="username" value="<?php echo $row['username']; ?>"><br>
    
    <label>Email:</label><br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
    
    <button type="submit">Simpan Perubahan</button>
</form>