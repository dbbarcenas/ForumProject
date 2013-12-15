<?php
	// Start the session
	require_once('DATA/startsession.php');
	
	// Get title from url
	$title = $_GET['topic'];

	$page_title = 'Topic Discussion';

	
	// Insert the page header
	$page_title = 'The most exciting place on the web';

	require_once('DATA/header.php');
	
	require_once('DATA/TESTS.php');
	require_once('DATA/connectvars.php');
	
	// Show the navigation menu
	require_once('DATA/navmenu.php');
	
	echo '<div class="content">';
	if (isset($_SESSION['user_id'])) 
  	{
		// Run if new topic has been submitted
		if(isset($_POST['submit_topic']))
		{
			// Connect to the database
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
			// Get variable data, and prevent SQL injection 
			$topic_title = mysqli_real_escape_string($dbc, trim($_POST['topic_title']));	
			$topic_text = mysqli_real_escape_string($dbc, trim($_POST['topic_text']));	
			
			// Retrieve the topic list from MySQL
			$query = "SELECT * FROM forum_titles WHERE title = '$title' ORDER BY topic_date";
			$data = mysqli_query($dbc, $query);
			
			// Insert new topic into MySQL if title does not already exist
			if (mysqli_num_rows($data) == 0) 
			{
				// Insert data into forum_titles table
				$query = "INSERT INTO forum_titles (title, user_id, topic_date) VALUES ('$topic_title', " . $_SESSION['user_id'] . ", NOW())";
				mysqli_query($dbc, $query);
				
				// Get topic_id from new database entry
				$query = "SELECT title_id, user_id FROM forum_titles WHERE title = '$topic_title' ORDER BY topic_date";
				$data = mysqli_query($dbc, $query);
				$row = mysqli_fetch_array($data);
				$title = $row['title_id'];
						
				// Insert data into forum_posts table
				$query = "INSERT INTO forum_posts (title_id, user_id, post_text, post_time) VALUES (" . $row['title_id'] . ", " . $row['user_id'] . ", '$topic_text', NOW())";
				mysqli_query($dbc, $query);
			}
			else
			{
				echo '<p class="error">That topic title already exists</p>';
			}
			
		}
		
		// Run if new post has been submitted
		if(isset($_POST['submit_reply']))
		{
	
			// Connect to the database
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
			// Get variable data, and prevent SQL injection 
			$topic_text = mysqli_real_escape_string($dbc, trim($_POST['topic_text']));	
			
			// Retrieve the topic list from MySQL
			$query = "SELECT * FROM forum_titles WHERE title_id = '$title'";
			$data = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($data);
	
			
			// Insert new topic into MySQL if title does not already exist
			if (mysqli_num_rows($data) == 0) 
			{
				echo '<p class="error">That topic doesn\'t exist</p>';
			}
			
			// An error occured, topic doesn't exist
			else
			{			
				// Insert data into forum_posts table
				$query = "INSERT INTO forum_posts (title_id, user_id, post_text, post_time) VALUES (" . $row['title_id'] . ", " . $_SESSION['user_id'] . ", '$topic_text', NOW())";
				mysqli_query($dbc, $query);
			}
			
		}
	
		
		// Run if creating a new topic
		if($title==0)
		{
			if (!isset($_SESSION['user_id'])) 
			{
				echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
			}
			else
			{
				// Create new topic
				echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">
					<fieldset>
						<legend>New Topic</legend>
						<label for="topic_title">Title:</label>
						<input type="text" id="topic" placeholder="Type the title of this topic here" name="topic_title" class="input" required="required" />
						<label for="topic_text">Text:</label>
						<textarea name="topic_text" maxlength="5000" cols="100" rows="10" placeholder="Enter text here..." class="input" required="required"></textarea>
						<input type="submit" value="Post Topic" name="submit_topic" class="button" required="required"/>
					</fieldset>
				</form>';
			}
		}
		
		//Output topic
		else
		{
			if(!isset($title))
			{
				$title = $_POST['topic'];
			}
	
			// Connect to the database 
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
			// Retrieve the user data from MySQL
			$query = "SELECT title FROM forum_titles WHERE title_id = $title ORDER BY topic_date";
			$data = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($data);
			
				
			// Output the title of the topic
			echo '<h4>Topic: ' . $row['title'] . '</h4>';
			
					
			// Retrieve the user data from MySQL
			$query = "SELECT * FROM forum_posts WHERE title_id = $title ORDER BY post_time";
			$data = mysqli_query($dbc, $query);
			
			// Loop through the array of forum post data, formatting it as HTML
			while ($post_row = mysqli_fetch_array($data)) 
			{
				// Get user info from user id
				$query_user = "SELECT user_name FROM forum_users WHERE user_id =" . $post_row['user_id'];
				$data_user = mysqli_query($dbc, $query_user);
				$user_row = mysqli_fetch_array($data_user);
				
				// Echo the post
				echo '<div class="post">';
					echo '<p class="user_name">' . $user_row['user_name'] . '</p>';
					echo '<p class="post_text">' . $post_row['post_text'] . '</p>';
					echo '<p class="post_time">' . $post_row['post_time'] . '</p>';
				echo '</div>';
			}
			
			mysqli_close($dbc);
				echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '?topic=' . $title . ' " >
					<fieldset>
						<legend>Reply</legend>
						<label for="topic_text">Text:</label>
						<textarea name="topic_text" maxlength="5000" cols="100" rows="10" placeholder="Enter text here..." class="input"></textarea>
						<input type="submit" value="Post Reply" name="submit_reply" class="button"/>
					</fieldset>
				</form>';
		}
	?>
	
	<?php
	  echo ' </div> ';
	}
	else
	{
		echo '<p class="error">You need to be logged in to view topics, please <a href="login.php">log in</a> or <a href="signup.php">sign up</a> to continue</p>';
	}
  	// Insert the page footer
  	require_once('DATA/footer.php');
?>
