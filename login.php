<?php
	include ("DATA/header_open.php");
		if(!empty($_POST['password']) && !empty($_POST['username']))
	{
		$loginFail = true; // initialise login success
		include('DATA/JavaScripts/logCheck.php'); // script to manage login
		
		if(login($_POST['username'],$_POST['password']))
		{
			$_SESSION['username'] = $_POST['username']; // user logged in successfully set username session
			$_SESSION[KEYNAME] = KEY;
			$loginFail = false; // login failed set fail notice
		}
	}
?>
    
<?php
	include ("DATA/header_close.php");
?>
<?php	
	if(!isset($_SESSION['username']) && (!isset($loginFail) || $loginFail))
	{
?>    
		<!-- Login Form -->
    	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="login" method="post">
        	<div>
            	<?php if($loginFail){ echo '<p style="color:red" >Login was unsuccessful! Please re-enter your credentials or Would you like to <a href="signup.php">signup?</a></p>';} ?>
                <label for="username">Username:</label>
                <input type="text" autofocus autocomplete="on" name="username"><br>
                <label for="password">Password:</label>
                <input type="password" autocomplete="on" name="password"><br>
                <input  class="button" type="submit" name="submit" value="Submit" />
            </div>
        </form>
    
<?php
	}
	if(isset($_SESSION['username']) || (isset($loginFail) && !$loginFail))
	{
?>
	<p style="color:green; display:block; text-align:center;">Logged In Successfully! You can now <a href="add_topic">add</a> a topic!</p>
    <a href="logout.php">Log Out</a>
<?php
	}
?>
<?php
	include ("DATA/footer.php");
?>
