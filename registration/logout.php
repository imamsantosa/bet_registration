<?php
setcookie("username", "", time()-3600);
setcookie("id", "", time()-3600);
setcookie("token", "", time()-3600);
//redirect ke halaman login
header("location: index.php");
?>