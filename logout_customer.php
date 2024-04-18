<?php
    session_start();
    unset($_SESSION['pengguna']);
    echo '<script>window.location="login_customer.php"</script>';
?>