function getElement(id){
	return document.getElementById(id);
}
function update_validate()
{
	refreshUpdate();
	var hasError=false;
	var email=getElement("email");
	var err_email=getElement("err_email");
	var cpass=getElement("cpass");
	var err_cpass=getElement("err_cpass");
	var npass=getElement("npass");
	var err_npass=getElement("err_npass");
    var cnpass=getElement("cnpass");
    var err_cnpass=getElement("err_cnpass");
	
	
    if(email.value==""){
        hasError=true;
        err_email.innerHTML=" *Email Required";
        email.focus();
		return !hasError;
    }
    else if(email.value.search("@gmail.com")==-1 && email.value.search("@yahoo.com")==-1){
        hasError=true;
        err_email.innerHTML=" *Invalid Email";
        email.focus();
		return !hasError;
    }
	if(cpass.value ==""){
        hasError=true;
        err_cpass.innerHTML=" *Current Password Required";
		cpass.focus();
		return !hasError;
    }
	if(npass.value==""){
        hasError=true;
        err_npass.innerHTML=" *New Password Required";
        npass.focus();
		return !hasError;
    }
	else if(npass.value.length<8){
        hasError=true;
        err_npass.innerHTML=" *Password must be 8 characters";
        npass.focus();
		return !hasError;
    }
	if(cnpass.value==""){
        hasError=true;
        err_cnpass.innerHTML=" *Confirm New Password Required";
        cnpass.focus();
		return !hasError;
    }
	else if(npass.value!=cnpass.value){
        hasError=true;
        err_cnpass.innerHTML=" *Password not matched";
        cnpass.focus();
		return !hasError;
    }
	return !hasError;	
	
}
function refreshUpdate(){
	var err_email=getElement("err_email");
	var err_cpass=getElement("err_cpass");
	var err_npass=getElement("err_npass");
    var err_cnpass=getElement("err_cnpass");
	err_email.innerHTML = "";
	err_cpass.innerHTML = "";
    err_npass.innerHTML = "";
	err_cnpass.innerHTML = "";
}