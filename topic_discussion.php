<?php
	// Open header and set any specific files for this pages
	include("DATA/header_open.php");
?>
	<title>Forum - Discussion Board</title>
    <link href="DATA/CSS/postStyles.css" rel="stylesheet" type="text/css"/>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="DATA/JavaScripts/topic_discussion.js"></script>
    <!--[if gte IE 9]>
      <style type="text/css">
        .gradient {
           filter: none;
        }
      </style>
    <![endif]-->
<?php
	if($mobile)
	{
		?>
        	<link href="DATA/CSS/mobilePost.css" rel="stylesheet" type="text/css"/>
            <script type="text/javascript" src="DATA/JavaScripts/mobileTopic.js"></script>
        <?php
	}
	include("DATA/header_close.php");
	// header closed
	
	// get topic id
	$topicID = $_GET['topic'];
	if(isset($_GET['page']))
	{
		$curPage = $_GET['page'];
	}
	else
	{
		$curPage = 1;
	}
	
	if(isset($_POST['response']))
	{
		if($_SESSION['user_id'] == ANONUSER)
		{
			include('DATA/securePost.php');
			include('DATA/footer.php');
			exit();
		}
		else
		{
			include('DATA/checkPost.php');
			if(isset($_POST['subCount']))
			{
				$subCount = is_numeric($_POST['subCount'])?(int)$_POST['subCount']:3;
			}
			else
			{
				$subCount = 1;
			}
			if(CAPTCHA($_POST['id'],$_POST['words']))
			{
				include('DATA/parseText.php');
				$userID 		= $_SESSION['user_id'];
				$text 			=  parseText($_POST['response']);				
				
				$query = "INSERT INTO forum_posts(title_id, user_id, post_text, post_time) VALUES(" 
					. $topicID
					. " , " . $userID
					. " , '" . $text
					. "',
					NOW()
					)";	
					
				$result = $db->prepare($query);
				$result->execute();
				$query = "UPDATE forum_titles SET last_user_id = '$userID', last_post_date = NOW() WHERE title_id = '$topicID'";					
				
				$result = $db->prepare($query);
				$result->execute();
			}	
			elseif($subCount < 3)
			{
				?>
                <p class='error'>CAPTCHA not correct!</p>
                <?php
				include('DATA/securePost.php');
				include('DATA/footer.php');
				exit();
			}
			else
			{
				?>
                <p class='error'>Post rejected. You entered the CAPTCHA in wrong too many times.</p>
                <a href="<?php echo $_SERVER['PHP_SELF']."?topic=".$topicID."&page=".$curPage; ?>" ><button class="button">Back</button></a>
                <?php
				exit();
			}
		}
	}
		
	if(is_numeric($topicID))
	{
		// prepare and execute SQL statement
		$query = "SELECT * FROM forum_posts WHERE title_id = ?";
		$result = $db->prepare($query);
		$result->execute(array($topicID));
		
		$rowCount = $result->rowCount();
		
		$pages = ceil($rowCount / 10);
		
		if($curPage>$pages)
		{
			$curPage = $pages;
		}
		elseif($curPage < 1)
		{
			$curPage = 1;
		}
		
		$limitset 		= $curPage == 1? 10 : 10 * ($curPage-1);
		$limitStatement = $curPage > 1? ("$limitset , 10") : $limitset;
		
		$query = "SELECT * FROM forum_posts WHERE title_id = $topicID LIMIT $limitStatement";
		$result = $db->prepare($query);
		$result->execute();
		?>
        <h1 class="header">
		<?php
			$query =  "SELECT * FROM forum_titles WHERE title_id = ?";
			$result2 = $db->prepare($query);
			$result2->execute(array($topicID));
			if($result2->rowCount() > 0)
			{
				foreach($result2 as $row2)
				{
					echo $row2['title'];
				}
			}
			else
			{
				echo "<p class='error'>Topic not found</p>";
			}
		?>
        </h1>   
        <?php
		if($row2['user_id'] == $_SESSION['user_id'])
		{
			?>
            	<button class="importantButton" id="deleteTopic" topic="<?php echo $topicID; ?>" >Delete Topic</button>
                <div id="dialog-confirm" title="Delete Topic?">
                  	<p>
                    	<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
                        This will close this topic page and delete all posts from this topic, are you sure you wish to continue?
                    </p>
                </div>
            <?php
		}
		if($result->rowCount() > 0)
		{
			foreach($result as $row)
			{
				$post_user = $row['user_id'];
				
				// get user name
				$query = "SELECT user_name FROM forum_users WHERE user_id = ?";
				$result3 = $db->prepare($query);
				$result3->execute(array($post_user));
				
				foreach($result3 as $row3)
				{
					$userName = $row3['user_name'];
				}
				// end of user name retrieval
				
				// echo out post data
				?>                             
				<div class="topic">
					<button class="button replyButton" topic="<?php echo $topicID; ?>" page="<?php echo $pages; ?>">Post</button>
                    <div class='content_wrapper'>
                    	<h2><?php echo $userName ?></h2>
                        <div class='user_image'>
                            <img src='<?php
                                $query =  "SELECT user_image FROM forum_user_info WHERE user_id = ?";
                                $result2 = $db->prepare($query);
                                $result2->execute(array($post_user));
                                if($result2->rowCount() > 0)
                                {
                                    foreach($result2 as $row2)
                                    {
                                        echo $row2['user_image'];
                                    }
                                }
                            ?>' alt="user image" onerror="this.src='DATA/UserImages/anon.png';"/>
                        </div>
                        <div class='post_text'>
                        <p>
                            <?php
                                echo $row['post_text'];
                            ?>
                        </p>
                        </div>
                        <p class-'post_time'>
                        	<?php
								$date = date_parse($row['post_time']);
								date_default_timezone_set('UTC');
								$today = date("Y/m/d");
								$postDate = $date['year'].'/'.$date['month'].'/'.$date['day'];
								if($today != $postDate)
								{
									$extendedDate = $postDate;
								}
								printf('%02d:%02d %d/%02d/%02d',$date['hour'],$date['minute'],$date['month'],$date['day'],$date['year']);
							?>
                        </p>
                    </div>
				</div>		
				<?php
			}// end of foreach
		}// end of if
		else // no posts exist for this topic, should not occur but if it does, display just a post button
		{
			echo '<button class="button newPost" topic="' . $topicID . '" page="'. $pages .'">Create Post</button>';
		}
		if($pages > 1)// Displays page selection to user if there are more than one page to view on the topic
		{
			if($curPage != 1)
			{
				echo '<a class="pagination" href="' . $_SERVER['PHP_SELF'] . '?topic=' . $topicID . '&page=1">&#8249;&#8249; First</a>';
			}
			for($i = 1; $i <= $pages; $i++)
			{
				echo '<a class="pagination" href="' . $_SERVER['PHP_SELF'] . '?topic=' . $topicID . '&page=' . $i . '" >' . $i . '</a>';
			}
			if($curPage != $pages)
			{
				echo '<a class="pagination" href="' . $_SERVER['PHP_SELF'] . '?topic=' . $topicID . '&page=' . $pages . '">Last &#8250;&#8250;</a>';
			}
		}// end of if
	}
	?>
<?php
	include("DATA/footer.php");
?>
