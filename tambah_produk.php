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
    <link rel="preconnect" href="https://fonts.googleapis.com"> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
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
            <h3>Tambah Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                   <select class="input-control" name="kategori" required>
                    <option value="">--Pilih Kategori--</option>
                    <?php
                        $kategori = mysqli_query ($connect,"SELECT * FROM kategori ORDER BY id_kategori DESC");
                        while($r = mysqli_fetch_array($kategori)){
                    ?>
                    <option value="<?php echo $r ['id_kategori']?>"><?php echo $r['nama_kategori']?></option>
                    <?php } ?>
                   </select>
                   <input type="text" name="nama"   class="input-control" placeholder="Nama Produk" required>
                   <input type="file" name="gambar"   class="input-control" required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>

                    <select  class="input-control" name="status">
                        <option value="">--Pilih Status--</option>
                        <option value="1">--Aktif--</option>
                        <option value="0">--Tidak Aktif--</option>
                    </select>

                    <input type="text" name="merk"   class="input-control" placeholder="Merk" required>
                    <input type="text" name="ukuran"   class="input-control" placeholder="Ukuran" required>
                    <input type="text" name="warna"   class="input-control" placeholder="Warna" required>
                    <input type="text" name="harga"   class="input-control" placeholder="Harga" required>
                    <input type="text" name="stok"   class="input-control" placeholder="stok" required>
                    <input type="submit" name="submit" value="Tambah Produk" class="button">
                </form>
                <?php
                    if (isset($_POST['submit'])) {
                        // print r($_FILES['gambar']);
                        //  Menampung inputan form
                        $kategori       =$_POST['kategori'];
                        $nama           =$_POST['nama'];
                        $deskripsi      =$_POST['deskripsi'];
                        $status         =$_POST['status'];
                        $merk           =$_POST['merk'];
                        $ukuran         =$_POST['ukuran'];
                        $warna          =$_POST['warna'];
                        $harga          =$_POST['harga'];
                        $stok           =$_POST['stok'];

                        // menampung data file yang di upload
                        $filename= $_FILES['gambar']['name'];
                        $tmp_name= $_FILES['gambar']['tmp_name'];

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
                        // jika format file sesuai dengan di dalam array
                        // proses upload dan insert database
                        move_uploaded_file($tmp_name, './produk/'. $newname); 
                       

                        $insert = mysqli_query($connect,"INSERT INTO sepatu VALUES(
                                null,
                                '".$kategori."',
                                '".$nama."',
                                '".$newname."',
                                '".$deskripsi."',
                                '".$status."',
                                '".$merk."',
                                '".$ukuran."',
                                '".$warna."',
                                '".$harga."',
                                '".$stok."'
                                )");

                            if($insert){
                                echo '<script>alert("Tambah Produk berhasil")</script>';
                                echo '<script>window.location="produk.php"</script>';
                                
                            }else{
                                echo 'Gagal'.mysqli_error($connect);
                            }

                    } }
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
        CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>