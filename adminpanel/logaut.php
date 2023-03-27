<?php
session_start();
unset($_SESSION['session_username']);
session_destroy();
echo '<script>window.location.href = "login.php"</script>';
//header('location:login.php');
?>
