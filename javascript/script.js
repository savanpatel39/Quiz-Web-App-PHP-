function validatePassword() 
{
        var pass1 = document.getElementById("pwd").value;
        var pass2 = document.getElementById("cnfrmpwd").value;
        if (pass1 != pass2) 
        {
           alert("Passwords do not match");    
        }
}

function disableAll_edit()
{
	disable_first_name();
	disable_last_name();
	disable_email();
	disable_address();
	disable_phn();
	disable_old_pwd();
}


function disable_first_name()
{
	document.getElementById("fname").readOnly = true;
	document.getElementById("fname").style.backgroundColor = "#D3D3D3";
	document.getElementById("fname").style.borderColor = "#D3D3D3";
	document.getElementById("edit_first_name").value = "Edit";
}

function disable_last_name()
{
	document.getElementById("lname").readOnly = true;
	document.getElementById("lname").style.backgroundColor = "#D3D3D3";
	document.getElementById("lname").style.borderColor = "#D3D3D3";
	document.getElementById("edit_last_name").value = "Edit";
}

function disable_email()
{
	document.getElementById("email").readOnly = true;
	document.getElementById("email").style.backgroundColor = "#D3D3D3";
	document.getElementById("email").style.borderColor = "#D3D3D3";
	document.getElementById("edit_email").value = "Edit";
}

function disable_address()
{
	document.getElementById("address").readOnly = true;
	document.getElementById("address").style.backgroundColor = "#D3D3D3";
	document.getElementById("address").style.borderColor = "#D3D3D3";
	document.getElementById("edit_address").value = "Edit";
}

function disable_phn()
{
	document.getElementById("phn").readOnly = true;
	document.getElementById("phn").style.backgroundColor = "#D3D3D3";
	document.getElementById("phn").style.borderColor = "#D3D3D3";
	document.getElementById("edit_phn").value = "Edit";
}

function disable_old_pwd()
{
	document.getElementById("old_pwd").readOnly = true;
	document.getElementById("old_pwd").style.backgroundColor = "#D3D3D3";
	document.getElementById("old_pwd").style.borderColor = "#D3D3D3";
	document.getElementById("edit_old_pwd").value = "Edit";
	
	document.getElementById("new_pwd").readOnly = true;
	document.getElementById("new_pwd").style.backgroundColor = "#D3D3D3";
	document.getElementById("new_pwd").style.borderColor = "#D3D3D3";
	
	document.getElementById("cnfrmpwd").readOnly = true;
	document.getElementById("cnfrmpwd").style.backgroundColor = "#D3D3D3";
	document.getElementById("cnfrmpwd").style.borderColor = "#D3D3D3";
}

///////////////////////////////////////////////////////////////////////////////

function enable_first_name()
{
	document.getElementById("fname").readOnly = false;
	document.getElementById("fname").style.backgroundColor = "#FFFFFF";
	document.getElementById("fname").style.borderColor = "#FFFFFF";
	document.getElementById("edit_first_name").value = "Done";
}

function enable_last_name()
{
	document.getElementById("lname").readOnly = false;
	document.getElementById("lname").style.backgroundColor = "#FFFFFF";
	document.getElementById("lname").style.borderColor = "#FFFFFF";
	document.getElementById("edit_last_name").value = "Done";
}

function enable_email()
{
	document.getElementById("email").readOnly = false;
	document.getElementById("email").style.backgroundColor = "#FFFFFF";
	document.getElementById("email").style.borderColor = "#FFFFFF";
	document.getElementById("edit_email").value = "Done";
}

function enable_address()
{
	document.getElementById("address").readOnly = false;
	document.getElementById("address").style.backgroundColor = "#FFFFFF";
	document.getElementById("address").style.borderColor = "#FFFFFF";
	document.getElementById("edit_address").value = "Done";
}


function enable_phn()
{
	document.getElementById("phn").readOnly = false;
	document.getElementById("phn").style.backgroundColor = "#FFFFFF";
	document.getElementById("phn").style.borderColor = "#FFFFFF";
	document.getElementById("edit_phn").value = "Done";
}

function enable_old_pwd()
{
	document.getElementById("old_pwd").readOnly = false;
	document.getElementById("old_pwd").style.backgroundColor = "#FFFFFF";
	document.getElementById("old_pwd").style.borderColor = "#FFFFFF";
	document.getElementById("edit_old_pwd").value = "Done";
	
	document.getElementById("new_pwd").readOnly = false;
	document.getElementById("new_pwd").style.backgroundColor = "#FFFFFF";
	document.getElementById("new_pwd").style.borderColor = "#FFFFFF";
	
	document.getElementById("cnfrmpwd").readOnly = false;
	document.getElementById("cnfrmpwd").style.backgroundColor = "#FFFFFF";
	document.getElementById("cnfrmpwd").style.borderColor = "#FFFFFF";
}


var flag_fname = "false";
var flag_lname = "false";
var flag_email = "false";
var flag_address = "false";
var flag_phn = "false";
var flag_old_pwd = "false";

function enable_edit(id)
{	
	if(id == "fname")
	{
		if(flag_fname == "false")
		{
			enable_first_name();
			flag_fname = "true";
		}
		else
		{
			disable_first_name();
			flag_fname = "false";
		}
	}
	else if(id == "lname")
	{
		if(flag_lname == "false")
		{
			enable_last_name();
			flag_lname = "true";
		}
		else
		{
			disable_last_name();
			flag_lname = "false";
		}	
	}
	else if(id == "email")
	{
		if(flag_email == "false")
		{
			enable_email();
			flag_email = "true";
		}
		else
		{
			disable_email();
			flag_email = "false";
		}	
	}
	else if(id == "address")
	{
		if(flag_address == "false")
		{
			enable_address();
			flag_address = "true";
		}
		else
		{
			disable_address();
			flag_address = "false";
		}	
	}
	else if(id == "phn")
	{
		if(flag_phn == "false")
		{
			enable_phn();
			flag_phn = "true";
		}
		else
		{
			disable_phn();
			flag_phn = "false";
		}	
	}
	else if(id == "old_pwd")
	{
		if(flag_old_pwd == "false")
		{			enable_old_pwd();
			flag_old_pwd = "true";
		}
		else
		{
			disable_old_pwd();
			flag_old_pwd = "false";
		}
	}
}

function check_buttons()
{
	if( (document.getElementById("edit_first_name").value == "Done") || (document.getElementById("edit_last_name").value == "Done") || (document.getElementById("edit_email").value == "Done") || (document.getElementById("edit_address").value == "Done") || (document.getElementById("edit_phn").value == "Done") || (document.getElementById("edit_old_pwd").value == "Done") )
	{
		alert("Please complete profile by clicking Done button!");
		return false;
	}
	else
	{
		return true;
	}
}
