<?php
	$topicID = $_POST['topicID'];
	$endPage = $_POST['endPage'];
	include('/home/200176338/public_html/AdvancedWebProgrammingClass/Forum/DATA/GLOBALS.php');
?>
<div class="writtingBox">
	<form action="<?php echo URL . "topic_discussion.php?topic=" . $topicID . '&page=' . $endPage; ?>" method="post">
        <input type="submit" name="submit" value="Submit" class="button submit" />
    	<textarea name="response" required="required" spellcheck="true" placeholder="Type response here" maxLength="5000"></textarea>
    </form>
</div>