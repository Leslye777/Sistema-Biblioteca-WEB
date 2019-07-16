function footer(){
	var elemento = document.getElementsByTagName("body")[0];
	var foot = document.getElementsByTagName("footer")[0];
	var tamScreen =  window.innerHeight;
	elemento = elemento.clientHeight;
	if (elemento<tamScreen) {
		foot.style.position = "absolute";
	} else {
		foot.style.position = "static";
	};
}





function validaLogin(form){
	var elementos = form.elements;
	var erro = "não";
	for(var i=0; i<elementos.length;i++){
		if(elementos[i].getAttribute("type")=="text"||elementos[i].getAttribute("type")=="password"){
			if(elementos[i].getAttribute("exige")=="sim"){
				if(elementos[i].value==""){
					div = document.getElementById("mensagemLogin");
					div.innerHTML = "Há campos vazios!";
					elementos[i].focus();
					erro = "sim";
					
				}
			}
		}
	}
	if(erro =="sim"){
		return false;
	}
	return true;
}



window.onload = function(){
	footer();
}

window.onresize = function(){
   	footer();
};