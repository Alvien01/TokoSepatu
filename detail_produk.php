<?php 
    error_reporting(0);
    include 'db.php';
    $produk = mysqli_query($connect,"SELECT * FROM sepatu WHERE id_sepatu = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
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
                <input type="submit" name="cari" value="Cari produk">
            </form>
        </div>
    </div>

    <!-- Detail Produk -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                   <img src="../tokosepatu/produk/<?php echo $p->gambar_produk?>" width="300px">
            </div>
            <div class="col-2">
                <h3><?php echo $p->nama_produk?></h3>
                <h4>Rp. <?php echo number_format($p->harga_produk)?></h4>
                <p>Deskripsi :<br>
                    <?php echo $p->deskripsi_produk ?>
                </p>
                <p><a href="https://api.whatsapp.com/send?phone=+6281210617656&text=Halo, saya tertarik dengan produk anda."
                target="_blank">Hubungi via Whatsapp
                <img src="img/logo-wa.png" width="50px"></a></p>
                </div>
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