function validateSignup()//makes sure all spaces are filled, the email is an ipfw one, and the passwords match
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
			
function validateLogin(){//makes sure the email and password are filled in
	if (document.forms.login.email.value == "")
	{
		alert("You must provide your email!");
		return false;
	}
		if (document.forms.login.password.value == "")
	{
		alert("You must provide your password!");
		return false;
	}
	return true;
}

function validateCreateCourse() {//makes sure there are no blank fields when creating a course
	if (document.forms.createcourse.courseNumber.value == "")
	{
		alert("You must provide the course number!");
		return false;
	}
		if (document.forms.createcourse.section.value == "")
	{
		alert("You must provide the section!");
		return false;
	}if (document.forms.createcourse.courseName.value == "")
	{
		alert("You must provide the course name!");
		return false;
	}if (document.forms.createcourse.professor.value == "")
	{
		alert("You must provide the professor!");
		return false;
	}
	return true;
}

function validateCreateThread(){//makes sure there are no blank fields when creating a thread
	if (document.forms.createthread.thread_subject.value == "")
	{
		alert("You must provide a subject!");
		return false;
	}if (document.forms.createthread.thread_content.value == "")
	{
		alert("You must provide content!");
		return false;
	}
	return true;
}

function validateReply(){//makes sure there is text in replies on a thread
	if (document.forms.createreply.thread_reply.value == "")
	{
		alert("You must enter text to reply!");
		return false;
	}
	return true;
}