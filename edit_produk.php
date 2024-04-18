<?php
    include 'db.php';
    session_start();
    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
    $produk= mysqli_query($connect, "SELECT * FROM sepatu WHERE id_sepatu = '".$_GET['id']."' ");
    if (mysqli_num_rows($produk)== 0) {
        echo '<script>window.location="produk.php"</script>';
    }
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitIn Shoes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

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
            <h3>Edit Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                   <select class="input-control" name="kategori" required>
                    <option value="">--Pilih Kategori--</option>
                    <?php
                        $kategori = mysqli_query ($connect,"SELECT * FROM kategori ORDER BY id_kategori DESC");
                        while($r = mysqli_fetch_array($kategori)){
                    ?>
                    <option value="<?php echo $r ['id_kategori']?>" <?php echo ($r['id_kategori']==$p->id_kategori)? 'selected':''; ?>><?php echo $r['nama_kategori']?></option>
                    <?php } ?>
                   </select>
                   <input type="text" name="nama"   class="input-control" placeholder="Nama Produk" value="<?php echo $p->nama_produk ?>" required>
                   <img src="produk/<?php echo $p->gambar_produk?>" width="150px">
                   <input type="hidden" name="foto" value="<?php echo $p->gambar_produk ?>">
                   <input type="file" name="gambar"   class="input-control">

                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->deskripsi_produk?></textarea><br>

                    <select  class="input-control" name="status">
                        <option value="">--Pilih Status--</option>
                        <option value="1" <?php echo ($p->status_produk == 1)? 'selected' : ''; ?>>--Aktif--</option>
                        <option value="0" <?php echo ($p->status_produk == 0)? 'selected' : ''; ?>>--Tidak Aktif--</option>
                    </select>

                    <input type="text" name="merk"      class="input-control" placeholder="Merk"    value="<?php echo $p->merk ?>" required>
                    <input type="text" name="ukuran"    class="input-control" placeholder="Ukuran"  value="<?php echo $p->ukuran ?>" required>
                    <input type="text" name="warna"     class="input-control" placeholder="Warna"   value="<?php echo $p->warna ?>" required>
                    <input type="text" name="harga"     class="input-control" placeholder="Harga"   value="<?php echo $p->harga_produk ?>" required>
                    <input type="text" name="stok"      class="input-control" placeholder="Stok"    value="<?php echo $p->stok ?>" required>
                    <input type="submit" name="submit"  value="Edit Produk"   class="button">
                </form>
                <?php
                    if (isset($_POST['submit'])) {
                        //data inputan dari form
                        $kategori       =$_POST['kategori'];
                        $nama           =$_POST['nama'];
                        $foto           =$_POST['foto'];
                        $deskripsi      =$_POST['deskripsi'];
                        $status         =$_POST['status'];
                        $merk           =$_POST['merk'];
                        $ukuran         =$_POST['ukuran'];
                        $warna          =$_POST['warna'];
                        $harga          =$_POST['harga'];
                        $stok           =$_POST['stok'];

                        //data gambar yang baru
                        $filename= $_FILES['gambar']['name'];
                        $tmp_name= $_FILES['gambar']['tmp_name'];

                       
                        //jika admin ganti gambar
                        if ($filename != '') {

                            $type1 = explode('.', $filename);
                            $type2 = $type1[1];
                            $newname ='produk'.time().'.'.$type2;

                        // menampung data format file yang diizinkan
                            $tipe_diizinkan= array('jpg', 'jpeg', 'png', 'gif');

                            // validasi format file
                        if (!in_array($type2, $tipe_diizinkan)) {
                            // jika format file tidak ada di dalam tipe yang diizinkan
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        }else {
                            unlink('./produk/'.$foto);

                            move_uploaded_file($tmp_name,'./produk/'. $newname);
                            $namagambar = $newname;
                        } 
                    }else {
                    //jika admin tidak ganti gambar
                        $namagambar = $foto;
                    }

                    // query update data produk
                    $update = mysqli_query($connect,"UPDATE sepatu SET
                                            id_kategori         ='".$kategori."',
                                            nama_produk         ='".$nama."',
                                            gambar_produk       ='".$namagambar."',
                                            deskripsi_produk    ='".$deskripsi."',
                                            status_produk       ='".$status."',
                                            merk                ='".$merk."',
                                            ukuran              ='".$ukuran."',
                                            warna               ='".$warna."',
                                            harga_produk        ='".$harga."',
                                            stok                ='".$stok."'
                                            WHERE id_sepatu     ='".$p->id_sepatu."' ");
                    if($update){
                        echo '<script>alert ("Ubah Data Berhasil")</script>';
                        echo '<script>window.location="produk.php"</script>';
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
    <script>
        CKEDITOR.replace( 'deskripsi_produk' );
    </script>
</body>
</html>