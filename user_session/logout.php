<?php
session_start();
unset($_SESSION['username']);
session_destroy();
header("location: http://localhost/modules/main/index.php");
?>