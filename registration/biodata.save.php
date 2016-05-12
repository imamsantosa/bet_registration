<?php
require_once("config.php");

class bioDebate
{
	protected $id;
	public $username;
	public $nama_peserta_1;
	public $nama_peserta_2;
	public $nama_peserta_3;
	public $no_telp_1;
	public $no_telp_2;
	public $no_telp_3;
	public $alergi_1;
	public $alergi_2;
	public $alergi_3;

	function __construct($id)
	{
		$db = dbase::koneksi();
		$debate = $db->prepare("select * from debate where id=:id");
		$debate->execute(array(':id'=>$id));
		$debate = $debate->fetch();
		$this->id = $debate["id"];
		$this->username = $debate["username"];
		$this->nama_peserta_1 = $debate["nama_peserta_1"];
		$this->nama_peserta_2 = $debate["nama_peserta_2"];
		$this->nama_peserta_3 = $debate["nama_peserta_3"];
		$this->no_telp_1 = $debate["no_telp_1"];
		$this->no_telp_2 = $debate["no_telp_2"];
		$this->no_telp_3 = $debate["no_telp_3"];
		$this->alergi_1 = $debate["alergi_1"];
		$this->alergi_2 = $debate["alergi_2"];
		$this->alergi_3 = $debate["alergi_3"];

	}

	public function save(){
		$db = dbase::koneksi();
		$save = $db->prepare("update debate set nama_peserta_1=:nama_peserta_1, nama_peserta_2=:nama_peserta_2, nama_peserta_3=:nama_peserta_3, no_telp_1=:no_telp_1, no_telp_2=:no_telp_2, no_telp_3=:no_telp_3, alergi_1=:alergi_1, alergi_2=:alergi_2, alergi_3=:alergi_3 where id=:id");
		$save->execute(array(
			':nama_peserta_1'=>$this->nama_peserta_1,
			':nama_peserta_2'=>$this->nama_peserta_2,
			':nama_peserta_3'=>$this->nama_peserta_3,
			':no_telp_1'=>$this->no_telp_1,
			':no_telp_2'=>$this->no_telp_2,
			':no_telp_3'=>$this->no_telp_3,
			':alergi_1'=>$this->alergi_1,
			':alergi_2'=>$this->alergi_2,
			':alergi_3'=>$this->alergi_3,
			':id'=>$this->id
			));
	}
}

/**
* 
*/
class bioSpeech
{
	protected $id;
	public $username;
	public $nama_peserta;
	public $no_telp;
	public $alergi;

	function __construct($id)
	{
		$db = dbase::koneksi();
		$debate = $db->prepare("select * from speech where id=:id");
		$debate->execute(array(':id'=>$id));
		$debate = $debate->fetch();
		$this->id = $debate["id"];
		$this->username = $debate["username"];
		$this->nama_peserta = $debate["nama_peserta"];
		$this->no_telp = $debate["no_telp"];
		$this->alergi = $debate["alergi"];
	}

	public function save(){
		$db = dbase::koneksi();
		$save = $db->prepare("update speech set nama_peserta=:nama_peserta, no_telp=:no_telp, alergi=:alergi where id=:id");
		$save->execute(array(
			':nama_peserta'=>$this->nama_peserta,
			':no_telp'=>$this->no_telp,
			':alergi'=>$this->alergi,
			':id'=>$this->id
			));
	}
}

class bioStory_telling
{
	protected $id;
	public $username;
	public $nama_peserta;
	public $no_telp;
	public $alergi;

	function __construct($id)
	{
		$db = dbase::koneksi();
		$debate = $db->prepare("select * from story_telling where id=:id");
		$debate->execute(array(':id'=>$id));
		$debate = $debate->fetch();
		$this->id = $debate["id"];
		$this->username = $debate["username"];
		$this->nama_peserta = $debate["nama_peserta"];
		$this->no_telp = $debate["no_telp"];
		$this->alergi = $debate["alergi"];
	}

	public function save(){
		$db = dbase::koneksi();
		$save = $db->prepare("update story_telling set nama_peserta=:nama_peserta, no_telp=:no_telp, alergi=:alergi where id=:id");
		$save->execute(array(
			':nama_peserta'=>$this->nama_peserta,
			':no_telp'=>$this->no_telp,
			':alergi'=>$this->alergi,
			':id'=>$this->id
			));
	}
}


if (isset($_GET['competition'])) {
	if ($_GET['competition']=='debate') {
		$debate = new bioDebate($_POST['id']);
		if ($debate->username == $_POST['username']) {
			$debate->nama_peserta_1 = $_POST['namapeserta1'];
			$debate->nama_peserta_2 = $_POST['namapeserta2'];
			$debate->nama_peserta_3 = $_POST['namapeserta3'];
			$debate->no_telp_1 = $_POST['phone1'];
			$debate->no_telp_2 = $_POST['phone2'];
			$debate->no_telp_3 = $_POST['phone3'];
			$debate->alergi_1 = $_POST['alergi1'];
			$debate->alergi_2 = $_POST['alergi2'];
			$debate->alergi_3 = $_POST['alergi3'];
			$debate->save();
			header('location:biodata.php?status=success&message=success to save biodata');
		} else {
			header('location:biodata.php?status=error&message=error to save biodata. code 7878');
		}
	}
	if ($_GET['competition']=='speech') {
		$debate = new bioSpeech($_POST['id']);
		if ($debate->username == $_POST['username']) {
			$debate->nama_peserta = $_POST['namapeserta'];
			$debate->no_telp = $_POST['phone'];
			$debate->alergi = $_POST['alergi'];
			$debate->save();
			header('location:biodata.php?status=success&message=success to save biodata');
		} else{
			header('location:biodata.php?status=error&message=error to save biodata. code 7878');
		}

	}
	if ($_GET['competition']=='story_telling') {
		$debate = new bioStory_telling($_POST['id']);
		if ($debate->username == $_POST['username']) {
			$debate->nama_peserta = $_POST['namapeserta'];
			$debate->no_telp = $_POST['phone'];
			$debate->alergi = $_POST['alergi'];
			$debate->save();
			header('location:biodata.php?status=success&message=success to save biodata');
		} else {
			header('location:biodata.php?status=error&message=error to save biodata. code 7878');
		}
	}

}

?>