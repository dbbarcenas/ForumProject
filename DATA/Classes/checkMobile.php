<?php
/**
check the browser user agent string for mobile browser keywords
 */
class mobileCheck
{
	// empty constructor, curerntly program is used only as static object
	public function __constructor()
	{
		
	}
	// the function checks the browsers user agent string to check if the accessing medium is mobile, or desktop, returns true if mobile, false if desktop
	public static function checkBrowser()
	{
		$iphone 	= strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$android 	= strpos($_SERVER['HTTP_USER_AGENT'],"Android");
		$palmpre 	= strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
		$berry 		= strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
		$ipod 		= strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
		$mobile		= strpos($_SERVER['HTTP_USER_AGENT'],"mobile");
		
		if ($iphone || $android || $palmpre || $ipod || $berry || $mobile) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>