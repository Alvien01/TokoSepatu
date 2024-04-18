<?php
    session_start();
    include 'db.php';
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
            <h3>Produk</h3>
                <div id="kategori">
                    <a href="tambah_produk.php" class="button">Tambah Produk</a>
                </div>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Gambar Produk</th>
                            <th>Status Produk</th>
                            <th>Merk</th>
                            <th>Ukuran</th>
                            <th>Warna</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no =1;
                            $produk = mysqli_query($connect, "SELECT * FROM sepatu LEFT JOIN kategori USING (id_kategori) ORDER BY id_sepatu DESC");
                            if(mysqli_num_rows($produk) > 0) {
                            while($row=mysqli_fetch_array($produk)){
                        ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $row ['nama_kategori']?></td>
                            <td><?php echo $row ['nama_produk']?></td>
                            <td><a href="produk/<?php echo $row['gambar_produk'] ?>" target="_blank"> <img src="produk/<?php echo $row['gambar_produk'] ?>" width="100px"></a></td>
                            <td><?php echo ($row ['status_produk']== 0)?'Tidak Aktif': 'Aktif';?></td>
                            <td><?php echo $row ['merk']?></td>
                            <td><?php echo $row ['ukuran']?></td>
                            <td><?php echo $row ['warna']?></td>
                            <td>Rp.<?php echo number_format($row ['harga_produk'])?></td>
                            <td><?php echo $row ['stok']?></td>
                            <td>
                                <a href="edit_produk.php?id=<?php echo $row ['id_sepatu']?>">Edit</a> || <a href="hapus_produk.php?idp=<?php echo $row ['id_sepatu']?>" onclick="return confirm('Konfirmasi Hapus ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }} else{ ?>
                            <tr>
                                <td colspan="10">Tidak Ada Data</td>
                            </tr>
                       <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>

    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - FitIn Shoes.</small>
        </div>
    </footer>
</body>
</html>