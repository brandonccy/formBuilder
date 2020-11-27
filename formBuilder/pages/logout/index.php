<?php
session_start();
$_SESSION["adminlogin"]="";
setcookie("webby_login", "" ,time()+(86400 * 30) * 12, "/");
session_destroy();
?>
<script>window.location="/formBuilder?ref=logout";</script>