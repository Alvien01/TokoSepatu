<?php 
    error_reporting(0);
    include 'db.php';
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
    <div class="search">
        <div class="container">
            <form action="cari_produk.php">
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET ['search']?>">
                <input type="hidden" name="kat" value="<?php echo $_GET ['kat'] ?>">
                <input type="submit" name="cari" class="button" value="Cari produk">
            </form>
        </div>
    </div>

<!-- new produk -->
<div class="section">
    <div class="container">
        <h3>Produk</h3>
        <div class="box">
            <?php
            if ($_GET['search'] != '' || $_GET['kat']!= '') {
                $where = "AND nama_produk LIKE '%".$_GET['search']."%' AND id_kategori LIKE '%".$_GET['kat']."%'";
            }
                $produk = mysqli_query($connect,"SELECT * FROM sepatu WHERE status_produk = 1 $where ORDER BY id_sepatu DESC");
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