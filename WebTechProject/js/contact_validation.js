function getElement(id){
	return document.getElementById(id);
}
function contact_validate()
{
	refreshContact();
	var hasError=false;
	var name=getElement("name");
	var err_name=getElement("err_name");
	var email=getElement("email");
	var err_email=getElement("err_email");
    var message=getElement("message");
    var err_message=getElement("err_message");
	
	
	
	if(name.value ==""){
        hasError=true;
        err_name.innerHTML=" *Name Required";
		name.focus();
		return !hasError;
    }
    else if(name.value.search("1")!=-1 || name.value.search("2")!=-1 || name.value.search("3")!=-1 || name.value.search("4")!=-1 || name.value.search("5")!=-1 || name.value.search("6")!=-1 || name.value.search("7")!=-1 || name.value.search("8")!=-1 || name.value.search("9")!=-1 || name.value.search("0")!=-1){
        hasError=true;
        err_name.innerHTML=" *Name cannot contain numbers";
		name.focus();
		return !hasError;
    }
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
	if(message.value ==""){
        hasError=true;
        err_message.innerHTML=" *Message Required";
		message.focus();
		return !hasError;
    }
	return !hasError;	
	
}
function refreshContact(){
	var err_name=getElement("err_name");
	var err_email=getElement("err_email");
    var err_message=getElement("err_message");
	err_name.innerHTML = "";
    err_email.innerHTML = "";
	err_message.innerHTML = "";
}