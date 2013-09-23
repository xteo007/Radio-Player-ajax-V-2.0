var rootdomain="http://"+window.location.hostname

// Include un file nella pagina
function ajaxinclude(url,id) {
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.open('GET', url, false) //get page synchronously 
page_request.send(null)
writecontent(page_request,id)
}

function writecontent(page_request,id){
if (window.location.href.indexOf("http")==-1 || page_request.status==200)
//document.write(page_request.responseText)
document.getElementById(id).innerHTML = page_request.responseText;
}