<?php
setcookie("username_1", "", time()-3600);
setcookie("id_1", "", time()-3600);
setcookie("token_1", "", time()-3600);
//redirect ke halaman login
header("location: index.php");
?>