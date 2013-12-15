/**
	Programmer: Durwin Barcenas
	Date: December 13, 2013
*/
//method to validate name to be prompted on the html contact page 
function validateName()
{
	//variable name is set by element id contactName from the form
	var name = document.getElementById("contactName").value; 
	
	//validation for name
	if(name.length == 0)
	{
		producePrompt("Name is Required", "namePrompt", "red"); 
		return false; 
	}
	if(!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/))
	{
		producePrompt("First and Last name Please", "namePrompt", "red"); 
		return false; 
	}
	producePrompt("Welcome " + name, "namePrompt", "green"); 
		return true; 
	
}

//method to validate Phone to be prompted on the html contact page 
function validatePhone()
{
//variable phone is set by element id contactPhone from the form
	var phone = document.getElementById("contactPhone").value; 
	
	//validation for phone
	if(phone.length == 0)
	{
		producePrompt("Phone Number is Required ", "phonePrompt", "red"); 
		return false; 
	}
	if(!phone.match(/^[0-9]{10}$/)) {
		producePrompt("Digits Only And Include Area Code", "phonePrompt", "red"); 
		return false; 
	}
	producePrompt("Valid Phone Number " + name, "phonePrompt", "green"); 
		return true; 
	
}

//method to validate Email to be prompted on the html contact page 
function validateEmail()
{
//variable email is set by element id contactEmail from the form
	var email = document.getElementById("contactEmail").value; 
	
	//validation for email
	if(email.length == 0)
	{
		producePrompt("Email is Required", "emailPrompt", "red"); 
		return false; 
	}
	if(!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)){
		producePrompt("Email Address is Invalid", "emailPrompt", "red"); 
		return false; 
	}
	producePrompt("Valid Email", "emailPrompt", "green"); 
		return true; 
}

//method to validate Message to be prompted on the html contact page 
function validateMessage()
{
//variable contactMessage is set by element id contactMessage from the form
	var contactMessage = document.getElementById("contactMessage").value; 
	//validation for contactMessage
	if(contactMessage.length == 0)
	{
		producePrompt("Message is Required", "messagePrompt", "red"); 
		return false; 
	}
	producePrompt("Now press send, you will be contacted shortly. ", "messagePrompt", "green"); 
		return true; 

}

//this method is called to each validaiton funcitons
//to set the prompt message, location and color
function producePrompt(message, promptLocation, color)
{
	document.getElementById(promptLocation).innerHTML = message; 
	document.getElementById(promptLocation).style.color = color; 
}