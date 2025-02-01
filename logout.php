<?php
session_start();
session_unset();  
session_destroy();  

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}


header("Location: login.php");
exit;
?>
