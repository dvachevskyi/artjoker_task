<?php

require_once('database.php');

class mainModel extends Model
{

	private $db_terr = "t_koatuu_tree";

	public function create($data){
		if (!empty($data["selectDistrict"])) {
			$get_address = "SELECT ter_address FROM " . $this->db_terr . " WHERE `ter_id` = '" . $data['selectDistrict'] . "'";
		} else {
			$get_address = "SELECT ter_address FROM " . $this->db_terr . " WHERE `ter_id` = '" . $data['selectCity'] . "'";
		}

		$territory = $this->db->row($get_address);

		if (empty($territory)) {
			return ["success"=>"false"];
		}

		$adress = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
			return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-16BE');
		}, $territory[0]['ter_address']);

		$insert_user = "INSERT INTO users (name, email, territory) VALUES ('".$data['name']."', '".$data['email']."','".$adress."')";
		$result = $this->db->query($insert_user);
		return ["success"=>true, "msg"=>"Вы успешно зарегистрированны!"];
	}

	public function is_registered($email){
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$user = $this->db->row($sql);
		if (!empty($user)) {
			return ["success"=>true, "msg"=>'Вы уже были зарегистрированны! ФИО: '.$user[0]['name'].' Email: '.$user[0]['email'].' Адресс: '.$user[0]['territory']];
		} else {
			return ["success"=>false];
		}
	}

	public function get_region()
	{
		$sql = "SELECT * FROM " . $this->db_terr . " WHERE ter_level = 1";
		return $this->db->row($sql);
	}

	public function get_cities($regId)
	{
		$sql = "SELECT * FROM " . $this->db_terr . " WHERE ter_level= 2 AND reg_id=(SELECT reg_id FROM " . $this->db_terr . " WHERE ter_id= $regId)";
		return $this->db->row($sql);
	}

	public function get_districts($cityId)
	{
		$sql = "SELECT * FROM " . $this->db_terr . " WHERE ter_level > 3 AND ter_pid= $cityId";
		return $this->db->row($sql);
	}

}
