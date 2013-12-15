<?php
	/**
		This page stores some main functions used throughout the site, particularly the headers, as well
		it also stores some of the main constants for the website
	**/
	define('HOME_DIR',"/home/200176338/public_html/AdvancedWebProgrammingClass/Forum/");
	define('URL','http://webdesign4.georgianc.on.ca/~200176338/AdvancedWebProgrammingClass/Forum/');
	
	// define MySQL login info
	define('MYSQLUSERNAME','db200176338');
	define('MYSQLPASSWORD','99939');
	define('MYSQLDSN',"webdesign4.georgianc.on.ca");
	define('DBNAME','db200176338');
	define('KEY','KX;5Lz=nc4(.xz?h:xEW=?|]-WKU.');
	define('KEYNAME','4b583b354c7a3d6e6334282e787a3f683a7845573d3f7c5d2d574b552e');
	define('ANONUSER',11);
	$db = new PDO('mysql:host='.MYSQLDSN.';dbname='.DBNAME, MYSQLUSERNAME, MYSQLPASSWORD);
?>
