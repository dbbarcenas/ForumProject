<?php
include ("DATA/header_open.php");
?>
<?php
	include ("DATA/header_close.php");
?>
<form id="signup" method="post" action="saveuser.php">

    <label for="firstname">First name:</label>
    <input type="text" name="firstname"><br>
    <label for="lastname">Last name:</label>
    <input type="text" name="lastname"><br>
    <label for="birthdate">Birthdate:</label>
    <input type="datetime" name="birthdate" placeholder="(YYYY/MM/DD)" required><br> 
    <label for="username">Username:</label>
    <input type="text" maxlength="20" autofocus autocomplete="on" name="username"><br>
    <label for="password">Password:</label>
	<input type="password" autocomplete="on" name="password"><br>
    <label for="password">Re-enter Password:</label>
    <input type="password" name="confirm_password"><br>
    <input type="submit" class="button" name="signup" value="Signup" />
</form>

<?php
	include ("DATA/footer.php");
?>
