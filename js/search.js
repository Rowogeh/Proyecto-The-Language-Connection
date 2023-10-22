function validarForm(formulario) 
{
	if(formulario.var.value.length==0) 
	{ //¿Tiene 0 caracteres?

	    formulario.var.focus();  			 // Damos el foco al control
	    alert('Debes completar este campo'); //Mostramos el mensaje

	     return false; 

	 } //devolvemos el foco  
	 
	    return true; //Si ha llegado hasta aquí, es que todo es correcto 
}