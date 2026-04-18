
<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Focus Path</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #f9b7f1; color: #333; }
        
        /* Sidebar */
        .sidebar { width: 250px; height: 100vh; background: #fab4f3; position: fixed; color: white; padding: 30px 20px; }
        .sidebar h2 { font-size: 22px; margin-bottom: 40px; text-align: center; letter-spacing: 1px; }
        .sidebar a { display: block; color: #efecff; text-decoration: none; padding: 12px 15px; border-radius: 8px; margin-bottom: 10px; transition: 0.3s; }
        .sidebar a:hover { background: rgba(255,255,255,0.1); color: white; }
        .sidebar a.active { background: white; color: #f6b4e3; font-weight: bold; }
        .logout { margin-top: 50px; color: #f6bfe9 !important; }

        /* Main Content */
        .main-content { margin-left: 250px; padding: 40px; }
        header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }
        .welcome-text h1 { font-size: 28px; color: #f0dcf1; }
        .welcome-text p { color: #fffdff; }

        /* Grid Stats */
        .grid-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .card { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-left: 5px solid #6c5ce7; }
        .card h3 { font-size: 16px; color: #fbdef6; text-transform: uppercase; margin-bottom: 10px; }
        .card p { font-size: 24px; font-weight: bold; color: #ffcff2; }

        /* Progress Box */
        .progress-box { background: white; margin-top: 30px; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .progress-bar { height: 10px; background: #eee; border-radius: 5px; margin-top: 15px; overflow: hidden; }
        .progress-fill { height: 100%; background: #f5c2ef; width: 45%; } /* Nanti bisa dibuat dinamis */
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Focus Path</h2>
        <a href="#" class="active">🏠 Dashboard</a>
        <a href="#">🛣️ My Roadmap</a>
        <a href="#">📖 Daily Journal</a>
        <a href="#">⚙️ Settings</a>
        <a href="logout.php" class="logout">🚪 Logout</a>
    </div>

    <div class="main-content">
        <header>
            <div class="welcome-text">
                <h1>Halo, <?= $_SESSION['username']; ?>! 👋</h1>
                <p>Siap untuk melanjutkan perjalananmu hari ini?</p>
            </div>
            <div class="date">
                <strong><?= date('d M Y'); ?></strong>
            </div>
        </header>

        <div class="grid-container">
            <div class="card">
                <h3>Total Fokus</h3>
                <p>120 Menit</p>
            </div>
            <div class="card">
                <h3>Target Selesai</h3>
                <p>4 / 8</p>
            </div>
            <div class="card">
                <h3>Mood Hari Ini</h3>
                <p>Tenang ✨</p>
            </div>
        </div>

        <div class="progress-box">
            <h3>Glowing Path Progress</h3>
            <p style="color: #636e72; font-size: 14px;">Kamu sudah menyelesaikan 45% dari perjalanan "Self Acceptance" bulan ini.</p>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
            <button style="margin-top: 20px; padding: 10px 20px; background: #6c5ce7; color: white; border: none; border-radius: 8px; cursor: pointer;">Lanjutkan Roadmap</button>
        </div>
    </div>

</body>
</html>