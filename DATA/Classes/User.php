<?php
require_once('DATA/GLOBALS.php');

class User
{
	private $user_id;
	private $first_name, $last_name, $user_name;
	private $birthdate;
	private $country;
	private $loggedIn = false;
	
	public function User()
	{
				
	}
	
	/**
	* 
	*/
	public function getUserName()
	{
		
		if(!empty($this->user_name))
		{
			return $this->user_name;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function getLoggedIn()
	{
		if(!empty($this->$loggedIn))
		{
			return $this->loggedIn;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function logIn($userName, $password)
	{
		global $db;
		
		$query = 'SELECT user_name FROM forum_users WHERE user_name = "'.$username.'" AND user_password = 
		AES_ENCRYPT("'.$password.'",SHA("'.$username.$password."Omega13".'"))';
		$result = $db->query($query);

		if($result->rowCount() > 0)
		{
			foreach($result as $row)
			{
				$this->user_id 		= $row['user_id'];
				$this->user_name	= $row['user_name'];
				
				$query = 'SELECT user_name FROM forum_users WHERE user_name = "'.$username.'" AND user_password = 
				AES_ENCRYPT("'.$password.'",SHA("'.$username.$password."Omega13".'"))';
				$result = $db->query($query);
			}
			$this->loggedIn = true;			
			
			return true;
		}
		return false;
	}
}
?>