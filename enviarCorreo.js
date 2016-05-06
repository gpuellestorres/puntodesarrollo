function enviarCorreo()
{
	var http = new XMLHttpRequest();
	var url = "contact_me.php";
	
	var valorNombre=document.getElementById("nombre").value;
	var valorCorreo=document.getElementById("correo").value;
	var valorMensaje=document.getElementById("mensaje").value;
	
	if(valorNombre=="" || valorCorreo="" || valorMensaje="")
	{
		alert("No puede dejar vacíos los campos solicitados.");
		return 0;
	}
	
	var params = "name="+valorNombre+"&email="+valorCorreo+"&message="+valorMensaje;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.setRequestHeader("Content-length", params.length);
	http.setRequestHeader("Connection", "close");

	http.onreadystatechange = function() {//Call a function when the state changes.
		if(http.readyState == 4 && http.status == 200) {			
			var respuesta=http.responseText;
			
			alert(respuesta);
			
			clearThis(document.getElementById("nombre"));
			clearThis(document.getElementById("correo"));
			clearThis(document.getElementById("mensaje"));
		}
	}
	http.send(params);
	return 0;
}

function clearThis(target){    
	target.value= "";
}