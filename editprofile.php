<?php
	// Open header and set any specific files for this pages
	include("DATA/header_open.php");
?>
<?php
	// close header and set any specific files for this pages
	include("DATA/header_close.php");
?>

<?php
		
	
		$conn = mysqli_connect('webdesign4.georgianc.on.ca', 'db200176338', '99939', 'db200176338') or die(mysqli_error());
		
		  $sql = "SELECT * FROM forum_user_info";
  		  $result = mysqli_query($conn, $sql) or die('Error querying database.');
		  
		  while ($row = mysqli_fetch_array($result)) {
			$fname =  $row['first_name'];
			$lname =  $row['last_name'];
			$birthdate = $row['birthdate'];
			$country = $row['Country'];
			
				
		} 
		mysqli_close($conn);
		
?>
<form method="post" action="update.php">
    
    <div>
	<label>First name:</label>
	<input name="firstname" value="<?php echo $fname; ?>" />
</div>
<div>
	<label>Last name:</label>
	<input name="lastname" value="<?php echo $lname; ?>" />
</div>
<div>
	<label>Birthdate: </label>
	<input name="birthdate" value="<?php echo $birthdate; ?>" />
</div>
<div>
	<label>Country</label>
	<input name="country" value="<?php echo $country; ?>" />
</div>

	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<input type="submit" value="Save" />
    
    </form>
<?php
	
	include("DATA/footer.php");
?>