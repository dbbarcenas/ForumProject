<?php
	function login($username, $password)
	{
		global $db;
		$query = 'SELECT user_name FROM forum_users WHERE user_name = "'.$username.'" AND user_password = 
		AES_ENCRYPT("'.$password.'",SHA("'.$username.$password."Omega13".'"))';
		echo $query;
		$result = $db->query($query);

		if($result->rowCount() > 0)
		{
			return true;
			
		}
		return false;
	}
?>
