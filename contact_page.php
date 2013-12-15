<?php
include ("DATA/header_open.php");
?>
<title>Forum - Contact Us</title>
<link href="DATA/CSS/contactStyle.css" rel="stylesheet" type="text/css"/>
<?php
	include ("DATA/header_close.php");
?>
<!--Contact Page content made by Durwin Barcenas-->
	
<div id="contactWrapper">
<section>
<h2>Contact Us</h2>
<table>
	<tbody>
		<tr>
			<th>Mobile </th>
			<td><a href="tel:705-770-7306">1(705)770-7306</a></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><a href="mailto:200203740@student.georgianc.on.ca">info@ourforum.com</a></td>
		</tr>
		<tr>
			<th>Twitter</th>
			<td><a href="#">twitter.com/ourforum</a></td>
		</tr>
		<tr>
			<th>Facebook</th>
			<td><a href="#">facebook.com/ourforum</a></td>
		</tr>
	</tbody>
</table>
</section>
	
	<form method="post" action="DATA/Classes/contact_send.php" >
	<fieldset class="first">
		<label class="labelName" for="name">Name:</label>
		<input onkeyup="validateName()" id="contactName" type="text" autofocus autocomplete="on" name="name">
		<!--Prompts an Error or Valid Name when field is filled out-->
		<label id="namePrompt"> </label><br/>
		<label for="phone">Phone:</label>
		<input onkeyup="validatePhone()" id="contactPhone" type="text" autofocus autocomplete="on" name="phone">
		<!--Prompts an Error or Valid Phone number when field is filled out-->
		<label id="phonePrompt"> </label><br/>
		<label for="email">Email:</label>
		<input  onkeyup="validateEmail()" id="contactEmail" type="text" autofocus autocomplete="on" name="email">
		<!--Prompts an Error or Valid Email when field is filled out-->
		<label id="emailPrompt"> </label><br/>
		<label for="message">Message:</label>
		<textarea onkeyup="validateMessage()" id="contactMessage" name="message" ></textarea>
		<!--Prompts an Error or Valid Message if field is empty or not-->
		<label id="messagePrompt">  </label>
	</fieldset>
	
	<fieldset>
		<input class="btn" type="submit" name="send" value="Send"  />
	</fieldset>
	</form>
<!--Javascript made for the functionality of this page-->
<script type="text/javascript" src="DATA/JavaScripts/contactPage.js"></script>
</div>

<!--End of Contact Page-->
<?php
	include ("DATA/footer.php");
?>
