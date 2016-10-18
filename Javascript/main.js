function validateSignup()

{

	if (document.forms.signup.name.value == "")

	{

		alert("You must provide your name!");

		return false;

	}

	else if (!document.forms.signup.email.value.match(/.+@ipfw.edu$/) && !document.forms.signup.email.value.match(/.+@students.ipfw.edu$/) )

	{

		alert("You must provide an IPFW email adddress!");

		return false;

	}

	else if (document.forms.signup.password1.value == "")

	{

		alert("You must provide a password!");

		return false;					

	}

	else if (document.forms.signup.password1.value != document.forms.signup.password2.value)

	{

		alert("You must provide the same password twice!");

		return false;

	}


	return true;

}

function validateCreateThread()

{
	
	if (document.forms.createthread.thread_subject.value == "")
		
	{
		
		alert("You must provide a thread subject.");
		
		return false;
		
	}

}