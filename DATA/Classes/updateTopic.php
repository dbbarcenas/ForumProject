<?php
//Author: Durwin Barcenas
//Date: December 12, 2013
//Calling constants GLOBALS.php database information 
	require_once('../GLOBALS.php');
  $dbc = mysqli_connect('localhost', MYSQLUSERNAME, MYSQLPASSWORD, DBNAME);
  
  //Initialize Post to these variables
  $title = $_POST['title']; 
  $content = $_POST['content']; 
  
  //Validaiton for Adding a new topic 
  //if name and content is set insert the values the database and redirects to the corrisponding page. 
  if (isset($title) && isset($content)){
  $query = "INSERT INTO `forum_titles` (`title`, `content`, `topic_date`, `last_post_date`) VALUES ('{$_POST['title']}', '{$_POST['content']}', NOW(), NOW())";
  echo $query;
  mysqli_query($dbc, $query);
  mysqli_close($dbc);
  header('Location: ../../index.php');
  } 
  //If one or more content is empty, javascript alert messages will pop out and redirects to the same page. 
  if(empty($content) && empty($title)){
	?>
		<script language="javascript" type="text/javascript">
		alert('Your New Topic Fields are empty. Please Try Again.');
		window.location.replace("http://webdesign4.georgianc.on.ca/~200176338/AdvancedWebProgrammingClass/Forum/add_topic.php");
		</script>
		<?php 
		}
		if (empty($title)){
		?>
		<script language="javascript" type="text/javascript">
		alert('You need to fill out the Title. Please Try Again.');
		window.location.replace("http://webdesign4.georgianc.on.ca/~200176338/AdvancedWebProgrammingClass/Forum/add_topic.php");
		</script>
		<?php 
		}if(empty($content)){
		?>
		<script language="javascript" type="text/javascript">
		alert('You need to fill out the Content. Please Try Again.');
		window.location.replace("http://webdesign4.georgianc.on.ca/~200176338/AdvancedWebProgrammingClass/Forum/add_topic.php");
		</script>
			<?php 
		}
		
		
?>
