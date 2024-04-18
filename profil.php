<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] !=true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($connect, "SELECT * FROM karyawan WHERE id_karyawan = '".$_SESSION['id']."' ");
    $data = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitIn Shoes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
    <!-- membuat header -->
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

    <!-- membuat konten -->
    <div class="section">
        <div class="container">
            <h3>Profil Karyawan</h3>
            <a href="tambah_karyawan.php" class ="button">Tambah Profil Karyawan</a>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="id" placeholder="ID Karyawan" class="input-control" value="<?php echo $data->id_karyawan ?>" required>
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $data->nama_karyawan ?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $data->username ?>" required>
                    <input type="text" name="no_telp" placeholder="No. Telepon" class="input-control" value="<?php echo $data->no_telp ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $data->alamat?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="button">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $id     = $_POST['id'];
                        $nama   = ucwords($_POST['nama']);
                        $user   = $_POST['user'];
                        $telp   = $_POST['no_telp'];
                        $alamat = ucwords($_POST['alamat']);

                        $update = mysqli_query($connect, "UPDATE karyawan SET
                                                id_karyawan = '".$id."',
                                                nama_karyawan = '".$nama."',
                                                username = '".$user."',
                                                no_telp = '".$telp."',
                                                alamat = '".$alamat."'
                                                WHERE id_karyawan = '".$data->id_karyawan."'");
                        if($update){
                            echo '<script>alert("Ubah Data Berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else{
                            echo 'Gagal' .mysqli_error($connect);
                        }
                    }
                ?>
            </div>
            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="button">
                </form>
                <?php
                    if(isset($_POST['ubah_password'])){

                        $pass1   = $_POST['pass1'];
                        $pass2  = $_POST['pass2'];

                        if($pass2 != $pass1){
                            echo '<script>alert("Password Tidak Sesuai")</script>';
                        }else{

                            $ubh_password = mysqli_query($connect, "UPDATE karyawan SET
                                                password = '".$pass1."'
                                                WHERE id_karyawan = '".$data->id_karyawan."'");
                            if($ubh_password){
                                echo '<script>alert("Ubah Password Berhasil")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }else{
                                echo 'Gagal' .mysqli_error($connect);
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- membuat footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - FitIn Shoes.</small>
        </div>
    </footer>
</body>
</html>