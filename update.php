

<?php
$conn = mysqli_connect('webdesign4.georgianc.on.ca', 'db200176338', '99939', 'db200176338') or die(mysqli_error());

			$fname =  $row['first_name'];
			$lname =  $row['last_name'];
			$id = $row['user_id'];
			$birthdate = $row['birthdate'];
			$country = $row['Country'];

	
	if (is_numeric($id)) {
		$sql = "UPDATE forum_user_info SET first_name = '$fname', last_name = '$lname', birthdate = '$birthdate' Country = '$country' WHERE user_id = $id";
		mysqli_query($conn, $sql) or die('Error updating database.');
		mysqli_close($conn);
  
		header('Location: index.php');
	}
	?>