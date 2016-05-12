<?php
require_once ('assets/dbase.php');

/**
* 
*/
class config
{
	public $gelombang;
	public $status_registrasi;

	public function __construct()
	{
		$db = dbase::koneksi();
		$config = $db->prepare("select * from config where id=1");
		$config->execute();
		$config = $config->fetch();

		$this->gelombang = $config['gelombang'];
		$this->status_registrasi = $config['status_registrasi'];
	}

	public function gelombang(){
		return $this->gelombang;
	}

	public function status_registrasi(){
		return $this->status_registrasi;
	}

	public function save(){
		$db = dbase::koneksi();
		$config = $db->prepare("update config set gelombang=:gelombang, status_registrasi=:status_registrasi where id=1");
		$config->execute(array(
				'gelombang' => $this->gelombang,
				'status_registrasi' => $this->status_registrasi
			));
	}
}


?>