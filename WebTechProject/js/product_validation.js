function getElement(id){
	return document.getElementById(id);
}
function product_validate()
{
	refreshProduct();
	var hasError=false;
	var pid=getElement("pid");
	var err_pid=getElement("err_pid");
	var pname=getElement("pname");
	var err_pname=getElement("err_pname");
    var price=getElement("price");
    var err_price=getElement("err_price");
	var ptype=getElement("ptype");
    var err_ptype=getElement("err_ptype");
	var description=getElement("description");
    var err_description=getElement("err_description");
	
	
	if(pid.value==""){
        hasError=true;
        err_pid.innerHTML=" *Product Id Required";
        pid.focus();
		return !hasError;
    }
	if(pname.value ==""){
        hasError=true;
        err_pname.innerHTML=" *Product Name Required";
		pname.focus();
		return !hasError;
    }
    else if(pname.value.search("1")!=-1 || pname.value.search("2")!=-1 || pname.value.search("3")!=-1 || pname.value.search("4")!=-1 || pname.value.search("5")!=-1 || pname.value.search("6")!=-1 || pname.value.search("7")!=-1 || pname.value.search("8")!=-1 || pname.value.search("9")!=-1 || pname.value.search("0")!=-1){
        hasError=true;
        err_pname.innerHTML=" *Product Name cannot contain numbers";
		pname.focus();
		return !hasError;
    }
	if(price.value==""){
        hasError=true;
        err_price.innerHTML=" *Price Required";
        price.focus();
		return !hasError;
    }
	if(ptype.value=="Product type"){
        hasError=true;
        err_ptype.innerHTML=" *Please Select Product type";
        ptype.focus();
		return !hasError;
    }
	if(description.value ==""){
        hasError=true;
        err_description.innerHTML=" *Description Required";
		description.focus();
		return !hasError;
    }
	return !hasError;	
	
}
function refreshProduct(){
	var err_pid=getElement("err_pid");
	var err_pname=getElement("err_pname");
    var err_price=getElement("err_price");
	var err_ptype=getElement("err_ptype");
	var err_description=getElement("err_description");
	err_pid.innerHTML = "";
    err_pname.innerHTML = "";
	err_price.innerHTML = "";
	err_ptype.innerHTML = "";
	err_description.innerHTML = "";
}

function searchproduct()
{
	var search_input = document.getElementById('product_search').value.toUpperCase();
	var table = document.getElementById('productstable');
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
	if(product_search.value==""){
        document.getElementById("search_result").innerHTML="";
        return;
    }
	http=new XMLHttpRequest();
	var search_word=document.getElementById("product_search").value;
	http.onreadystatechange=function()
	{
		if (http.readyState==4 && http.status==200) 
		{

			document.getElementById("search_result").innerHTML=http.responseText;
		}
	}
	http.open("GET","../controllers/ProductSearch.php?pname="+search_word,true);
	http.send();
}