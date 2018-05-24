<?php
    session_start();
?>

<?php
    session_destroy();
    echo "<script>window.location.href='index.php';alert('You are now logged out.');</script>";
?>