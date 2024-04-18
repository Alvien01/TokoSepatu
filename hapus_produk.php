<?php
    include 'db.php';
    
    if (isset($_GET['idk'])) {
        $delete = mysqli_query($connect,"DELETE FROM kategori WHERE id_kategori = '".$_GET['idk']."'");
        echo '<script>window.location="kategori.php"</script>';
    }
    if (isset($_GET['idp'])) {
        $produk= mysqli_query($connect, "SELECT gambar_produk FROM sepatu WHERE id_sepatu = '".$_GET['idp']."' ");
        $p = mysqli_fetch_object($produk);

        unlink('./produk/'.$p->gambar_produk);

        $delete = mysqli_query($connect,"DELETE FROM sepatu WHERE id_sepatu = '".$_GET['idp']."' ");
        echo '<script>window.location="produk.php"</script>';
    }
?>
