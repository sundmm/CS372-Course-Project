function validateSignup()

{
	if (document.forms.signup.name.value.trim() == "")

	{

		alert("You must provide your name!");

		return false;

	}

	else if (!document.forms.signup.email.value.trim().match(/.+@ipfw.edu$/) && !document.forms.signup.email.value.trim().match(/.+@students.ipfw.edu$/) )

	{

		alert("You must provide an IPFW email adddress!");

		return false;

	}

	else if (document.forms.signup.password1.value.trim() == "")

	{

		alert("You must provide a password!");

		return false;					

	}

	else if (document.forms.signup.password1.value.trim() != document.forms.signup.password2.value.trim())

	{

		alert("You must provide the same password twice!");

		return false;

	}

	return true;

}

function validateCreateThread()

{
	
	if (document.forms.createthread.thread_subject.value.trim() == "")
		
	{
		
		alert("You must provide a thread subject.");
		
		return false;
		
	}

}