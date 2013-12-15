	<?php
	
	
    //Set the complete flag to check if page is valid
	$complete = true;
	
	//check if first name is entered
	if (empty($_POST['firstname'])) {
	echo 'Enter your First name.</br>';
	$complete = false;
	}
	//check if first name is entered
	if (empty($_POST['lastname'])) {
	echo 'Enter your lastname name.</br>';
	$complete = false;
	}
	//check if first name is entered
	if (empty($_POST['birthdate'])) {
	echo 'Enter your birthdate.</br>';
	$complete = false;
	}
	//check if the username is entered
	if (empty($_POST['username'])) {
	echo 'Enter your user name.</br>';
	$complete = false;
	}
	
	//check if the password is registered
	if (empty($_POST['password'])) {
	echo 'Enter your password.</br>';
	$complete = false;
	}
	
	//check if passwords match
	if ($_POST['password'] != $_POST['confirm_password']) {
	echo 'Enter matching password.</br>';
	$complete = false;
	}
	if ($complete) 
	
	{
	//Connect
	$conn = mysqli_connect('webdesign4.georgianc.on.ca', 'db200176338', '99939', 'db200176338') or die("Could Not Connect:  "  . mysqli_error());
	//Sql statement to add a new user
	$sql = "INSERT INTO forum_user_info (first_name, last_name, birthdate) VALUES
		('$_POST[firstname]','$_POST[lastname]' , '$_POST[birthdate]')";
	$sql1 = "INSERT INTO forum_users (user_name, user_password) VALUES
		('$_POST[username]', '$_POST[password]')";
		
		
		//Run the sql
	mysqli_query($conn,$sql);
	
	mysqli_query($conn,$sql1);
		mysqli_close($conn);

	include ("DATA/header_open.php");
	
	include ("DATA/header_close.php");
	//Confirm Message
	echo 'Successfully registered! <a href="login.php">Login</a>to post to the forum!' ;
	
	include ("DATA/footer.php");
	
	}
	?>