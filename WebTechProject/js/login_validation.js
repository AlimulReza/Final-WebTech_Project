function getElement(id){
	return document.getElementById(id);
}
function login_validate()
{
	refreshLog();
	var hasError=false;
	var username=getElement("username");
	var err_username=getElement("err_username");
    var pass=getElement("pass");
    var err_password=getElement("err_password");
	
	
	
	if(username.value==""){
        hasError=true;
        err_username.innerHTML="*Username Required";
        username.focus();
		return !hasError;
    }
    if(pass.value==""){
        hasError=true;
        err_password.innerHTML="*Password Required";
        pass.focus();
		return !hasError;
    }
	return !hasError;	
	
}
function refreshLog(){
	var err_username = getElement("err_username");
    var err_password = getElement("err_password");
	err_username.innerHTML = "";
    err_password.innerHTML = "";
}