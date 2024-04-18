<?php 
    include 'db.php';

    session_start();
    if ($_SESSION['pengguna'] != true) {
        echo '<script>window.location="login_customer.php"</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FitIn Shoes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

</head>
<body>
    <!--- header --->
    <header>
        <div class="container">
            <h1><a href="index.php">FitIn Shoes</a></h1>
            <ul>
                <li><a href="cari_produk.php">Produk</a></li>
                <li><a href="logout_customer.php">Keluar</a></li>
            </ul>
        </div>
    </header>
    <!-- search -->
    <div class="container">
                <h2>Selamat Datang <?php echo $_SESSION ['customer']->nama_customer ?> di FitIn Shoes</h2>
    </div>
    <div class="search">
        <div class="container">
            <form action="cari_produk.php">
                <input type="text" name="search" placeholder="Cari Produk" >
                <input type="submit" name="cari" value="Cari produk">
            </form>
        </div>
    </div>

    <!-- kategori -->
    <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($connect,"SELECT * FROM kategori ORDER BY id_kategori DESC");
                    if (mysqli_num_rows($kategori) > 0) {
                        while($k = mysqli_fetch_array($kategori)){
                ?>
            <a href="cari_produk.php?kat=<?php echo $k ['id_kategori']?>">
                <div class="col-5">
                    <img src="img/img_3.jpeg" width="50px" style="margin-bottom: 10px;">
                    <p><?php echo $k ['nama_kategori']?></p>
                </div>
            </a>    
                <?php }}else {?>
                    <p>Kategori Tidak Ada</p>
                <?php }?>
            </div>
        </div>
    </div>

<!-- new produk -->
<div class="section">
    <div class="container">
        <h3>Produk Terbaru</h3>
        <div class="box">
            <?php
                $produk = mysqli_query($connect,"SELECT * FROM sepatu where status_produk = 1 ORDER BY id_sepatu DESC LIMIT 8");
                if (mysqli_num_rows($produk)> 0) { 
                    while($p = mysqli_fetch_array($produk)) {
            ?>
            <a href="detail_produk.php?id=<?php echo $p['id_sepatu']?>">
            <div class="col-4">
                <img src="produk/<?php echo $p['gambar_produk']?>">
                <p class="nama"><?php echo $p['nama_produk']?></p>
                <p class="harga">Rp.<?php echo number_format($p['harga_produk'])?></p>
            </div>
            </a>
            <?php }}else { ?>
                <p>Produk Tidak Ada</p>
            <?php } ?>
        </div>
    </div>
</div>
<!-- footer -->
<div class="footer">
    <div class="container">
        <h4>Alamat</h4>
        <p>Yggdrasil</p>
        <small>Copyright &copy; 2022 - FitIn Shoes.</small>
    </div>
</div>
</body>
</html>