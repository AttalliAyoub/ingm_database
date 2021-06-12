<?php
    include 'shared/header.php';
    $_SESSION['email'] = null;
    header("Location: login.php");
    include 'shared/footer.php';
?>