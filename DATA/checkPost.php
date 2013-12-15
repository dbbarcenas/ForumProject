<?php
	function CAPTCHA($captchaID, $captchaname)
	{
		global $db;
		$query = "SELECT * FROM forum_captcha WHERE img = SHA('" . $captchaID . "') AND id = SHA('" . $captchaname . "')";
		$result = $db->query($query);

		if($result->rowCount() > 0)
		{
			return true;
			
		}
		return false;		
	}
?>