<?php
require_once ('payment.php');


/**
* 
*/
class competition
{

	private $username;

	public function __construct($user){
		$this->username = $user;
	}

	public function debate($input){
		$db = dbase::koneksi();
		$payment = new payment($this->username);

		if ($payment->getDebate() < 3) {
			try {
				$name1 = $input['name1'];
				$name2 = $input['name2'];
				$name3 = $input['name3'];
				$speech = $db->prepare("INSERT INTO debate (USERNAME, NAMA_PESERTA_1, NAMA_PESERTA_2, NAMA_PESERTA_3, TGL_DAFTAR) VALUES (:username, :nama1, :nama2, :nama3, NOW()) ");
				$speech->execute(array(
						':username' => $this->username,
						':nama1' => $name1,
						':nama2' => $name2,
						':nama3' => $name3,
					));
				return json_encode(array(
						'status' => 'success',
						'message' => 'Registration Debate Competition success'
					));
			} catch (Exception $e) {
				return json_encode(array(
						'status' => 'error',
						'message' => 'Error to registration debate. code 003P' 
					));
			}
		} else {
			return json_encode(array(
					'status' => 'error',
					'message' => 'for Debate competition, each school can send maximal 3 teams'
				));
		}
	}

	public function story_telling($input){
		$db = dbase::koneksi();
		$payment = new payment($this->username);
		
		if ($payment->getStory_telling() < 5) {

			try {
				$name = $input['name'];
				$speech = $db->prepare("INSERT INTO story_telling (USERNAME, NAMA_PESERTA, TGL_DAFTAR) VALUES (:username, :nama, NOW()) ");
				$speech->execute(array(
						':username' => $this->username,
						':nama' => $name,
					));
				return json_encode(array(
						'status' => 'success',
						'message' => 'Registration Story Tellings Competition success'
					));
			} catch (Exception $e) {
				return json_encode(array(
						'status' => 'error',
						'message' => 'Error to registration Story Telling. code 004P' 
					));
			}
		} else {
			return json_encode(array(
					'status' => 'error',
					'message' => 'for Story Telling competition, each school can send maximal 5 teams'
				));
		}
	}

	public function speech($input){
		$db = dbase::koneksi();
		$payment = new payment($this->username);
		
		if ($payment->getSpeech() < 5) {

			try {
				$name = $input['name'];
				$speech = $db->prepare("INSERT INTO speech (USERNAME, NAMA_PESERTA, TGL_DAFTAR) VALUES (:username, :nama, NOW()) ");
				$speech->execute(array(
						':username' => $this->username,
						':nama' => $name,
					));
				return json_encode(array(
						'status' => 'success',
						'message' => 'Registration Speech Competition success'
					));
			} catch (Exception $e) {
				return $e->getMessage();
				return json_encode(array(
						'status' => 'error',
						'message' => 'Error to registration speech. code 005P' 
					));
			} 
		} else {
			return json_encode(array(
					'status' => 'error',
					'message' => 'for Speech competition, each school can send maximal 5 teams'
				));
		}
	}

	public function hasDebate(){
		$payment = new payment($this->username);
		return $payment->getDebate() > 0;
	}

	public function hasSpeech(){
		$payment = new payment($this->username);
		return $payment->getSpeech() > 0;
	}

	public function hasStory_telling(){
		$payment = new payment($this->username);
		return $payment->getStory_telling() > 0;
	}

	public function getDebate(){
		$db = dbase::koneksi();

		$debate = $db->prepare("SELECT * FROM debate WHERE USERNAME=:username");
		$debate->execute(array(':username' => $this->username));
		return $debate->fetchAll();
	}

	public function getStory_telling(){
		$db = dbase::koneksi();

		$story_telling = $db->prepare("SELECT * FROM story_telling WHERE USERNAME=:username");
		$story_telling->execute(array(':username' => $this->username));
		return $story_telling->fetchAll();
	}

	public function getSpeech(){
		$db = dbase::koneksi();

		$speech = $db->prepare("SELECT * FROM speech WHERE USERNAME=:username");
		$speech->execute(array(':username' => $this->username));
		return $speech->fetchAll();
	}
	
}

$competition = new competition($_COOKIE["username"]);

if (isset($_GET['competition'])) {
    if (method_exists($competition, $_GET['competition'])) {
    	echo $competition->$_GET['competition']($_POST);
    }
}

if (isset($_GET['getCompetition'])) {
    if (method_exists($competition, $_GET['getCompetition'])) {
    	echo $competition->$_GET['getCompetition']();
    }
}

?>