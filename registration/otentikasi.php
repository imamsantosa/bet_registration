<?php
	if (empty($_COOKIE['username']) || empty($_COOKIE['id'])) {
	    	//redirect ke halaman login
	    header('location:index.php');
	    die();
	}

?>