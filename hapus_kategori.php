<?php
    include 'db.php';
    
    if (isset($_GET['idk'])) {
        $delete = mysqli_query($connect,"DELETE FROM kategori WHERE id_kategori = '".$_GET['idk']."'");
        echo '<script>window.location="kategori.php"</script>';
    }
?>