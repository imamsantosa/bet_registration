<?php
require_once ('config.php');

/**
* 
*/
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


?>