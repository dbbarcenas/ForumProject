<nav>
    <ul>
        <li class="nav_link"><a href="index.php">Home</a></li>
		<li class="nav_link"><a href="add_topic.php">Add New Topic</a></li>
        <li class="nav_link"><a href="contact_page.php">Contact Us</a></li>  
        <?php
			if($_SESSION['username'])
			{
		?> 
        <li id="myprofile" class="nav_link"><a href="editprofile.php">My profile</a></li>
        <?php
			}
		?>
        <div id="user">
        <?php
		if($_SESSION['username'] )		
		{
        echo '<p class="nav_link" style="color:white" >Hello ' . $_SESSION['username'] . '. <a class="button" href="logout.php">Sign out</a></p>';
		}
		else
		{
		?>
        </div>
        <li id="login" class="nav_link"><a href="login.php">Login</a></li>
        <li id="login" class="nav_link"><a href="signup.php">Signup</a></li>
        <?php
		}
		?>
    </ul>
</nav>