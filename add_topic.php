<?php
	
	include("DATA/header_open.php");
?>
	<title>Forum - New Topic</title>
    <link href="DATA/CSS/postStyles.css" rel="stylesheet" type="text/css"/>
<?php
	include("DATA/header_close.php");
?>
<!--Add New Topic Page content made by Durwin Barcenas-->
	<h1 class="header">New Topic</h1>
	<div>
		<form method='post' action='DATA/Classes/updateTopic.php'>
				<input type='hidden' value='allowed' name='check' />
				<input type='hidden' value='add' name='mode' />
				<table>
					<tr>
						<td class='form'><label>Topic Title</label></td>
						<td class='form'><input type='text' name='title' /></td>
					</tr>
					<tr>
						<td class='form'><label>Content</label></td>
						<td class='form'><textarea rows='20' cols='70' name='content' ></textarea></td>
					</tr>
					<tr>
						<td class='form' ><input type="button" name="b1" value="Previous" onclick='parent.history.back();return false;' /></td>
						<td class='form'><input type='submit' value='Add Topic'  /></td>
					</tr>
				</table>
				</form>
	</div>
	<!--End of New Topic Page-->
<?php
	include("DATA/footer.php");
?>
