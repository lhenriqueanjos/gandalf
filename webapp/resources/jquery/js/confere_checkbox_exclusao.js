function testaCheckExc(){	

//declaração de vars. A var checados irá contar quantos estão checados.	
var inputs,i,retorno_,checados=0;	

//pegando os inputs e jogando num array	
inputs = document.getElementsByTagName("input");	

//varrendo o array que tem os inputs	
for(i=0;i<inputs.length;i++){
	if(inputs[i].type=="checkbox"){ 
	//se os inputs forem checkbox	
		if(inputs[i].checked==true){				
			checados++;			
		}		
	}	
}	

//escrevendo o resultado	
if (checados == 0){

	alert("Você não selecionou nenhum registro!");	
	$("form").attr('onsubmit', 'return false');

}else{
	$("form").attr('onsubmit', 'return true');
}

}