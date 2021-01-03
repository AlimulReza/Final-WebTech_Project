function getElement(id){
	return document.getElementById(id);
}
function employee_validate()
{
	refreshEmployee();
	var hasError=false;
	var eid=getElement("eid");
	var err_eid=getElement("err_eid");
	var name=getElement("name");
	var err_name=getElement("err_name");
	var username=getElement("username");
	var err_username=getElement("err_username");
    var pass=getElement("pass");
    var err_pass=getElement("err_pass");
	var cpass=getElement("cpass");
    var err_cpass=getElement("err_cpass");
	var email=getElement("email");
    var err_email=getElement("err_email");
	var gender=getElement("gender");
    var err_gender=getElement("err_gender");
	var dbirth=getElement("dbirth");
	var err_dbirth=getElement("err_dbirth");
	var phone=getElement("phone");
	var err_phone=getElement("err_phone");
    var city=getElement("city");
    var err_city=getElement("err_city");
	var address=getElement("address");
    var err_address=getElement("err_address");
    var salary=getElement("salary");
	var err_salary=getElement("err_salary");
	
	
	if(eid.value ==""){
        hasError=true;
        err_eid.innerHTML=" *Id Required";
		eid.focus();
		return !hasError;
    }
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
	if(username.value==""){
        hasError=true;
        err_username.innerHTML=" *Username Required";
        username.focus();
		return !hasError;
    }
	else if(username.value.search(" ")!=-1 || username.value.length<6){
        hasError=true;
        err_username.innerHTML=" *Username cannot contain spaces and must be 6 characters";
        username.focus();
		return !hasError;
    }
    if(pass.value==""){
        hasError=true;
        err_pass.innerHTML=" *Password Required";
        pass.focus();
		return !hasError;
    }
	else if(pass.value.length<8){
        hasError=true;
        err_pass.innerHTML=" *Password must be 8 characters";
        pass.focus();
		return !hasError;
    }
	if(cpass.value==""){
        hasError=true;
        err_cpass.innerHTML=" *Confirm Password Required";
        cpass.focus();
		return !hasError;
    }
	else if(pass.value!=cpass.value){
        hasError=true;
        err_cpass.innerHTML=" *Password not matched";
        cpass.focus();
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
	if(gender.checked==false){
        hasError=true;
        err_gender.innerHTML=" *Gender Required";
        gender.focus();
		return !hasError;
    }
	if(dbirth.value==""){
        hasError=true;
        err_dbirth.innerHTML=" *DOB Required";
        dbirth.focus();
		return !hasError;
    }
	if(phone.value==""){
        hasError=true;
        err_phone.innerHTML=" *Phone Number Required";
        phone.focus();
		return !hasError;
    }
	else if(isNaN(phone.value)) {
        
		hasError=true;
        err_phone.innerHTML=" *only digit no alphabet";
        phone.focus();
		return !hasError;
    }
    else if(phone.value.length!=11) {
        
		hasError=true;
        err_phone.innerHTML=" *Phone number must be 11 digit";
        phone.focus();
		return !hasError;
    }
	if(city.value=="City"){
        hasError=true;
        err_city.innerHTML=" *Please Select city";
        city.focus();
		return !hasError;
    }
	if(address.value==""){
        hasError=true;
        err_address.innerHTML=" *Address Required";
        address.focus();
		return !hasError;
    }
    if(salary.value==""){
        hasError=true;
        err_salary.innerHTML=" *Salary Required";
        salary.focus();
		return !hasError;
    }
	return !hasError;	
	
}
function refreshEmployee(){
	var err_eid=getElement("err_eid");
	var err_name=getElement("err_name");
	var err_username=getElement("err_username");
    var err_pass=getElement("err_pass");
	var err_cpass=getElement("err_cpass");
	var err_email=getElement("err_email");
	var err_gender=getElement("err_gender");
    var err_dbirth=getElement("err_dbirth");
	var err_phone=getElement("err_phone");
	var err_city=getElement("err_city");
	var err_address=getElement("err_address");
	var err_salary=getElement("err_salary");
	
	err_eid.innerHTML = "";
    err_name.innerHTML = "";
	err_username.innerHTML = "";
	err_pass.innerHTML = "";
	err_cpass.innerHTML = "";
    err_email.innerHTML = "";
    err_gender.innerHTML = "";
	err_dbirth.innerHTML = "";
	err_phone.innerHTML = "";
	err_city.innerHTML = "";
	err_address.innerHTML = "";
	err_salary.innerHTML = "";
}
function searchemployee()
{
	var search_input = document.getElementById('employee_search').value.toUpperCase();
	var table = document.getElementById('employeestable');
	var tr = table.getElementsByTagName('tr');
	for(var i=0; i<tr.length; i++)
	{
		var td = tr[i].getElementsByTagName('td')[1];
		if (td) 
		{
			var textvalue = td.textContent || td.innerHTML;
			if (textvalue.toUpperCase().indexOf(search_input) > -1) 
			{
				tr[i].style.display = "";
			}
			else
			{
				tr[i].style.display = "none";
			}
		}
	}
	if(employee_search.value==""){
        document.getElementById("search_result").innerHTML="";
        return;
    }
	http=new XMLHttpRequest();
	var search_word=document.getElementById("employee_search").value;
	http.onreadystatechange=function()
	{
		if (http.readyState==4 && http.status==200) 
		{

			document.getElementById("search_result").innerHTML=http.responseText;
		}
	}
	http.open("GET","../controllers/EmployeeSearch.php?ename="+search_word,true);
	http.send();
}
