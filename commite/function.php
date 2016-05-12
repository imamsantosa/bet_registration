<?php
require_once('../registration/config.php');
require_once('../registration/assets/dbase.php');
require_once('../registration/user.php');

class payment
{
	private $username;
	private $gelombang;

	public function __construct($user){
		$config = new config();

		$this->gelombang = $config->gelombang();
		$this->username = $user;

	}

	public function getDebate(){
		$db = dbase::koneksi();

		$debate = $db->prepare("select * from debate where username=:username");
		$debate->execute(array(
				':username' => $this->username
			));
		$debate = $debate->fetchAll();
		$debate = count($debate);

		return $debate;
	}

	public function getStory_telling(){
		$db = dbase::koneksi();

		$story_telling = $db->prepare("select * from story_telling where username=:username");
		$story_telling->execute(array(
				':username' => $this->username
			));
		$story_telling = $story_telling->fetchAll();
		$story_telling = count($story_telling);

		return $story_telling;
	}

	public function getSpeech(){
		$db = dbase::koneksi();

		$speech = $db->prepare("select * from speech where username=:username");
		$speech->execute(array(
				':username' => $this->username
			));
		$speech = $speech->fetchAll();
		$speech = count($speech);

		return $speech;
	}

	public function totalDebate(){
		$harga1 = 400000;
		$harga2 = 450000;

		if ($this->gelombang == '1') {
			return $this->getDebate() * $harga1;
		} else if($this->gelombang == '2'){
			return $this->getDebate() * $harga2;
		}
	}

	public function totalSpeech(){
		$harga1 = 200000;
		$harga2 = 250000;

		if ($this->gelombang == '1') {
			return $this->getSpeech() * $harga1;
		} else if($this->gelombang == '2'){
			return $this->getSpeech() * $harga2;
		}
	}

	public function totalStory_telling(){
		$harga1 = 200000;
		$harga2 = 250000;

		if ($this->gelombang == '1') {
			return $this->getStory_telling() * $harga1;
		} else if($this->gelombang == '2'){
			return $this->getStory_telling() * $harga2;
		}
	}

	public function totalAll(){
		return $this->totalDebate() + $this->totalSpeech() + $this->totalStory_telling();
	}

	public function hasRegister(){
		return $this->getSpeech() > 0 || $this->getDebate() > 0 || $this->getStory_telling() > 0;
	}

}

class fungsi
{
	
	public function getPendaftar(){
		$db = dbase::koneksi();
		$q = $db->prepare("select * from pendaftar");
		$q->execute();
		$result=array();

			while($data=$q->fetch(PDO::FETCH_ASSOC))
			{
				$payment = new payment($data['username']);
				$user = new user($data['username']);
				$temp=array();
				$temp['id']=$data['id'];
				$temp['username']=$data['username'];
				$temp['email']=$data['email'];
				$temp['nama_sekolah']=$data['nama_sekolah'];
				$temp['alamat_sekolah']=$data['alamat_sekolah'];
				$temp['pendamping']=$data['pendamping'];
				$temp['nama_pendamping']=$data['nama_pendamping'];
				$temp['kontak_pendamping']=$data['kontak_pendamping'];
				$temp['phone']=$data['phone'];
				$temp['upload']=$data['upload'];
				$temp['konfirmasi']=$data['konfirmasi'];
				$temp['tanggal_daftar']=$data['tgl_daftar'];
				$temp['jumlah_debate']=$payment->getDebate();
				$temp['jumlah_speech']=$payment->getSpeech();
				$temp['jumlah_story_telling']=$payment->getStory_telling();
				$temp['image_payment']="../registration/".$user->fileUpload();
				$result[]=$temp;
			}
			$response['data'] = $result;
			return json_encode($response);
	}

	public function getDebate(){
		$db = dbase::koneksi();
		$q = $db->prepare("select * from debate");
		$q->execute();
		$result=array();

			while($data=$q->fetch(PDO::FETCH_ASSOC))
			{
				$payment = new payment($data['username']);
				$user = new user($data['username']);
				$temp=array();
				$temp['id']=$data['id'];
				$temp['username']=$data['username'];
				$temp['nama_peserta_1']=$data['nama_peserta_1'];
				$temp['nama_peserta_2']=$data['nama_peserta_2'];
				$temp['nama_peserta_3']=$data['nama_peserta_3'];
				$temp['no_telp_1']=$data['no_telp_1'];
				$temp['no_telp_2']=$data['no_telp_2'];
				$temp['no_telp_3']=$data['no_telp_3'];
				$temp['alergi_1']=$data['alergi_1'];
				$temp['alergi_2']=$data['alergi_2'];
				$temp['alergi_3']=$data['alergi_3'];
				$temp['tanggal_daftar']=$data['tgl_daftar'];
				$result[]=$temp;
			}
			$response['data'] = $result;
			return json_encode($response);
	}

	public function deleteDebate($id){
		$db = dbase::koneksi();
		$save = $db->prepare("delete from debate where id=:id");
		$save->execute(array(
				':id'=>$id
			));
		return json_encode(array('status'=>'success', 'message'=>'berhasil menghapus peserta debate'));
	}

	public function getSpeech(){
		$db = dbase::koneksi();
		$q = $db->prepare("select * from speech");
		$q->execute();
		$result=array();

			while($data=$q->fetch(PDO::FETCH_ASSOC))
			{
				$payment = new payment($data['username']);
				$user = new user($data['username']);
				$temp=array();
				$temp['id']=$data['id'];
				$temp['username']=$data['username'];
				$temp['nama_peserta']=$data['nama_peserta'];
				$temp['no_telp']=$data['no_telp'];
				$temp['alergi']=$data['alergi'];
				$temp['tanggal_daftar']=$data['tgl_daftar'];
				$result[]=$temp;
			}
			$response['data'] = $result;
			return json_encode($response);
	}

	public function deleteSpeech($id){
		$db = dbase::koneksi();
		$save = $db->prepare("delete from speech where id=:id");
		$save->execute(array(
				':id'=>$id
			));
		return json_encode(array('status'=>'success', 'message'=>'berhasil menghapus peserta speech'));
	}

	public function getStory_telling(){
		$db = dbase::koneksi();
		$q = $db->prepare("select * from story_telling");
		$q->execute();
		$result=array();

			while($data=$q->fetch(PDO::FETCH_ASSOC))
			{
				$payment = new payment($data['username']);
				$user = new user($data['username']);
				$temp=array();
				$temp['id']=$data['id'];
				$temp['username']=$data['username'];
				$temp['nama_peserta']=$data['nama_peserta'];
				$temp['no_telp']=$data['no_telp'];
				$temp['alergi']=$data['alergi'];
				$temp['tanggal_daftar']=$data['tgl_daftar'];
				$result[]=$temp;
			}
			$response['data'] = $result;
			return json_encode($response);
	}

	public function deleteStory_telling($id){
		$db = dbase::koneksi();
		$save = $db->prepare("delete from story_telling where id=:id");
		$save->execute(array(
				':id'=>$id
			));
		return json_encode(array('status'=>'success', 'message'=>'berhasil menghapus peserta story telling'));
	}
}

$fungsi = new fungsi();
if (isset($_GET['action'])) {
	if ($_GET['action'] == 'data_pendaftar') {
		echo $fungsi->getPendaftar();
	}

	if ($_GET['action'] == 'batal_konfirmasi') {
		$user = new user($_POST["username"]);
		$user->konfirmasi = 0;
		$user->save();
		echo json_encode(array('status'=>'success', 'message'=>'berhasil mengubah status konfirmasi'));
	}

	if ($_GET['action'] == 'konfirmasi') {
		$user = new user($_POST["username"]);
		$user->konfirmasi = 1;
		$user->save();
		echo json_encode(array('status'=>'success', 'message'=>'berhasil mengubah status konfirmasi'));
	}

	if ($_GET['action'] == 'hapus_upload') {
		$user = new user($_POST["username"]);
		unlink("../registration/".$user->fileUpload());
		$user->upload = 0;
		$user->save();
		echo json_encode(array('status'=>'success', 'message'=>'berhasil menghapus payment proof'));
	}

	if ($_GET['action'] == 'reset_password') {
		$user = new user($_POST["username"]);
		$user->changePassword('123456');
		echo json_encode(array('status'=>'success', 'message'=>'berhasil mereset password. default: 123456'));
	}

	if ($_GET['action'] == 'delete_akun') {
		$user = new user($_POST["username"]);
		$user->delete();
		echo json_encode(array('status'=>'success', 'message'=>'berhasil menghapus akun'));
	}

	if ($_GET['action'] == 'data_debate') {
		echo $fungsi->getDebate();
	}

	if ($_GET['action'] == 'delete_debate') {
		echo $fungsi->deleteDebate($_POST['id']);
	}

	if ($_GET['action'] == 'data_speech') {
		echo $fungsi->getSpeech();
	}

	if ($_GET['action'] == 'delete_speech') {
		echo $fungsi->deleteSpeech($_POST['id']);
	}

	if ($_GET['action'] == 'data_story_telling') {
		echo $fungsi->getStory_telling();
	}

	if ($_GET['action'] == 'delete_story_telling') {
		echo $fungsi->deleteStory_telling($_POST['id']);
	}


}

?>