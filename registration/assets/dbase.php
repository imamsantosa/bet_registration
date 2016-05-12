<?php
session_start();
ob_start();
$key = "12171996";
date_default_timezone_set("Asia/Jakarta");

/**
* 
*/
class dbase
{

	public static function koneksi(){
		$host = "localhost";
		$user = "santosa";
		$password = "santosa123";
		$database_name = "bet_onlinereg";
		try {
			$db = new PDO("mysql:host=$host;dbname=$database_name",
				$user,
				$password,
				[
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				]);	
		} catch (Exception $e) {
			$db = '<script>alert("Mohon maaf, database kami sedang mengalami ganggunan");</script>';
		}
		return $db;
	}
}


?>