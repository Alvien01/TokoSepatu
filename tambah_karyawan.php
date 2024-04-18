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
            <!-- menambah profil karyawan yang dimasukkan ke database -->
            <h3>Tambah Profil Karyawan</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                <select class="input-control" name="owner" required>
                    <option value="">--Owner Toko--</option>
                <?php
                        $owner = mysqli_query ($connect,"SELECT * FROM owner ORDER BY id_owner ");
                        while($o = mysqli_fetch_array($owner)){
                    ?>
                    <option value="<?php echo $o ['id_owner']?>"><?php echo $o['nama_owner']?></option>
                    <?php } ?>
                   </select>
                   <input type="text" name="nama"   class="input-control" placeholder="Nama Karyawan" required>
                    <input type="text" name="no_telp"   class="input-control" placeholder="No Telepon" required>
                    <input type="text" name="alamat"   class="input-control" placeholder="Alamat" required>
                    <input type="text" name="password"   class="input-control" placeholder="Password" required>
                    <input type="text" name="user"   class="input-control" placeholder="Username" required>
                    <input type="submit" name="submit" value="Tambah Profil Karyawan" class="button">
                </form>
                <?php
                    if (isset($_POST['submit'])) {
                        $owner                  =$_POST['owner'];
                        $nama_karyawan          =$_POST['nama'];
                        $telp                   =$_POST['no_telp'];
                        $alamat                 =$_POST['alamat'];
                        $password               =$_POST['password'];
                        $user                   =$_POST['user'];

                        $insert = mysqli_query($connect,"INSERT INTO karyawan VALUES(
                                null,
                                '".$owner."',
                                '".$nama_karyawan."',
                                '".$telp."',
                                '".$alamat."',
                                '".$password."',
                                '".$user."'
                                )");

                            if($insert){
                                echo '<script>alert("Tambah Profil Karyawan Berhasil")</script>';
                                echo '<script>window.location="profil.php"</script>';
                                
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
            <small>Copyright &copy; 2022 - FitIn Shoes.</small>
        </div>
    </footer>
</body>
</html>