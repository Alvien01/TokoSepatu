<?php
    include 'db.php';
    session_start();
    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitIn Shoes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <div class="container">
            <h1><a href="dashboard.php">FitIn Shoes</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="kategori.php">Kategori</a></li>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Tambah Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control"required>
                    <input type="submit" name="submit" value="Tambah Kategori" class="button">
                </form>
                <?php
                    if (isset($_POST['submit'])) {

                        $nama = ucwords($_POST['nama']);

                        $insert = mysqli_query($connect, "INSERT INTO kategori VALUES (
                            null,
                            '".$nama."')");
                        if ($insert) {
                            echo '<script>alert("Tambah Data berhasil")</script>';
                            echo '<script>window.location="kategori.php"</script>';
                        }else{
                            echo 'gagal'.mysqli_error($connect);
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - FitIn Shoes</small>
        </div>
    </footer>
</body>
</html>