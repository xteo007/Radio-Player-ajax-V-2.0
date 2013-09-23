var rootdomain="http://"+window.location.hostname

// Ricava le var da un file
function ajaxvalure(url,id) {
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
return writevalure(page_request,id);
}

function writevalure(page_request,id){
//alert(id);
//alert(page_request);
	if (id) {
		   //document.write(page_request.responseText);
		   var tmp = page_request.responseText;
		   //alert('tpm ='+tmp);
		   bloccoo = tmp.split("&");
		   //alert(bloccoo);
		   for (i=0;i<bloccoo.length;i++) {
			   briciolaa=bloccoo[i].split("=");
			   //alert(briciolaa);
				   if ( briciolaa[0] == id) {
					   //alert("variabile=" + briciolaa[0] + " \nvalore=" + briciolaa[1]);
					   valore = briciolaa[1];
					   //alert(valore);
					   return valore;
				   }
		   }
	} else {
		//alert(page_request.responseText);
		return page_request.responseText;
	}
} 