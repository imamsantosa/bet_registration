<?php
require_once ('assets/dbase.php');

/**
* 
*/
class user
{
	private $username;
	public $password;
	public $email;
	public $nama_sekolah;
	public $alamat_sekolah;
	public $pendamping;
	public $nama_pendamping;
	public $kontak_pendamping;
	public $phone;
	public $upload;
	public $konfirmasi;
	public $tgl_daftar;

	public function __construct($uname)
	{
		$db = dbase::koneksi();
		$user = $db->prepare("select * from pendaftar where username=:username");
		$user->execute(array(
			':username'=>$uname
			));
		$user = $user->fetch();

		$this->password = $user['password'];
		$this->username = $user['username'];
		$this->email = $user['email'];
		$this->nama_sekolah = $user['nama_sekolah'];
		$this->alamat_sekolah = $user['alamat_sekolah'];
		$this->pendamping = $user['pendamping'];
		$this->nama_pendamping = $user['nama_pendamping'];
		$this->kontak_pendamping = $user['kontak_pendamping'];
		$this->phone = $user['phone'];
		$this->upload = $user['upload'];
		$this->konfirmasi = $user['konfirmasi'];
		$this->tgl_daftar = $user['tgl_daftar'];
	}

	public function save(){
		$db = dbase::koneksi();
		$save = $db->prepare("UPDATE pendaftar SET email=:email, nama_sekolah=:nama_sekolah, alamat_sekolah=:alamat_sekolah, pendamping=:pendamping, nama_pendamping=:nama_pendamping, kontak_pendamping=:kontak_pendamping, phone=:phone, upload=:upload, konfirmasi=:konfirmasi where username=:username");
		$save->execute(array(
				':username'=>$this->username,
				':email'=>$this->email,
				':nama_sekolah'=>$this->nama_sekolah,
				':alamat_sekolah'=>$this->alamat_sekolah,
				':pendamping'=>$this->pendamping,
				':nama_pendamping'=>$this->nama_pendamping,
				':kontak_pendamping'=>$this->kontak_pendamping,
				':phone'=>$this->phone,
				':upload'=>$this->upload,
				':konfirmasi'=>$this->konfirmasi
			));
	}

	public function delete(){
		$db = dbase::koneksi();
		$save = $db->prepare("delete from pendaftar where username=:username");
		$save->execute(array(
				':username'=>$this->username
			));
	}

	public function changePassword($password){
		$db = dbase::koneksi();
		$password = md5($password);

		$chpass = $db->prepare("UPDATE pendaftar SET password=:password where username=:username");
		try {
			$chpass->execute(array(
					':username' => $this->username,
					':password' => $password
				));
			return json_encode(array(
					'message' => 'Success to change password',
					'status' => 'success'
				));
		} catch (Exception $e) {
			return json_encode(array(
					'message' => 'Error to change password. code:111P',
					'status' => 'error'
				));
		}

	}

	public function fileUpload(){
		if ($this->upload) {
			return 'files/'.$this->username.'.jpg';
		}
	}

}

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'change_password') {

		$user = new user($_COOKIE['username']);

		if (md5($_POST['currentpassword']) == $user->password) {
			$user->changePassword($_POST['newpassword2']);
			echo '<div class="alert alert-success"> <strong>Success to save new password!</strong></div>';
			return;
		} else {
			echo '<div class="alert alert-danger"> <strong>Error to save new password!</strong> your current password don\'t match!</div>';
			return;
		}

	}
}
?>