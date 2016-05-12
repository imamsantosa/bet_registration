<?php
require_once("config.php");

class auth
{

	function sign_up($input){
		$db = dbase::koneksi();
		$username=$input['username'];
		$password = $input['password1'];
		$email = $input['email'];
		$namasekolah = $input['namasekolah'];
		$alamatsekolah=$input['alamatsekolah'];
		$phone = $input['phone'];

		$query = $db->prepare("select * from pendaftar where username=:username");
        $query->execute(array(
        	':username'=>$username
        	));
        $data = $query->fetchAll();
        $ada = count($data);
        if ($ada < 1) 
        {
        	try {
        		$signup = $db->prepare("insert into pendaftar (username, password, email, nama_sekolah, alamat_sekolah, pendamping, phone, upload, konfirmasi, tgl_daftar) values(:username, :password, :email, :namasekolah, :alamatsekolah, :pendamping, :phone, :upload, :konfirmasi, NOW())");
	        	$signup->execute(array(
	        			':username' => $username,
	        			':password' => md5($password),
	        			':email' => $email,
	        			':namasekolah' => $namasekolah,
	        			':alamatsekolah' => $alamatsekolah,
	        			':pendamping' => 0,
	        			':phone' => $phone,
	        			':upload' => 0,
	        			':konfirmasi' => 0
	        		));
	        	return "Registration Success. next, you can login use your account";
        	} catch (Exception $e) {
        		return "registration error. code : 001P";
        		//return $e;
        	}
        	
        }
        else
        {
        	return "Username and password must not be same!";
        }
	}

	function login($input){
		$db = dbase::koneksi();
		$username = $input['username'];
		$password = $input['password'];

        $query = $db->prepare("select * from pendaftar where username=:username and password=:password");
        $query->execute(array(
        		':username' => $username,
        		':password' => md5($password)
        	));

        $data = $query->fetchAll();
        $ada = count($data);

        if ($ada == 1) {
        	$id=$data[0]["id"];
            $username=$data[0]['username'];

            setcookie("id", $id, time()+3600);
            setcookie("username", $username, time()+3600);
            setcookie("token", date("Y-m-d").'imam', time()+3600);

            return json_encode(array(
            		"status" => "success",
            		"message" => "au sukses"
            	));
        } else{
        	return json_encode(array(
        			"status" => "error",
        			"message" => "Wrong Username or Password! (PASSWORD and password is not same)"
        		));
        }

	}
}

$auth = new auth();
if (isset($_GET['action'])) {
    if (method_exists($auth, $_GET['action'])) {
    	echo $auth->$_GET['action']($_POST);
    } else{
        header('location:index.php');
    }
} else {
    header('location:index.php');
}

?>