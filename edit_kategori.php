<?php
    include 'db.php';
    session_start();
    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
    $kategori = mysqli_query($connect, "SELECT * FROM kategori WHERE id_kategori ='".$_GET['id']."' ");
    if (mysqli_num_rows($kategori)==0) {
        echo '<script>window.location="kategori.php"</script>';
    }
    $k = mysqli_fetch_object($kategori);
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
            <h3>Edit Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value= "<?php echo $k->nama_kategori?>"required>
                    <input type="submit" name="submit" value="Edit Kategori" class="button">
                </form>
                <?php
                    if (isset($_POST['submit'])) {

                        $nama = ucwords($_POST['nama']);
                        $update = mysqli_query($connect,"UPDATE kategori SET 
                                                nama_kategori = '".$nama."'
                                                WHERE id_kategori='".$k->id_kategori."'");
                        if ($update) {
                            echo '<script>alert("Edit Data berhasil")</script>';
                            echo '<script>window.location="kategori.php"</script>';
                        }else{
                            echo 'Gagal'.mysqli_error($connect);
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