<?php
	if (empty($_COOKIE['username_1']) || empty($_COOKIE['id_1'])) {
	    	//redirect ke halaman login
	    header('location:index.php');
	    die();
	}

?>