function valida_form (){
	if(document.getElementById("txtChave").value.length == 0){
		alert('Por favor, preencha a chave');
		document.getElementById("txtChave").focus();
		var comboNome = document.getElementById('preencheChave');
		comboNome.setAttribute('onsubmit', 'return false');
		return false
	}else{
		if (document.getElementById("txtChave").value.length < 9 || document.getElementById("txtChave").value.length > 9){
			alert('A chave deve ter 9 números');
			document.getElementById("txtChave").focus();
			var comboNome = document.getElementById('preencheChave');
			comboNome.setAttribute('onsubmit', 'return false');
			return false			
		}else{
			var comboNome = document.getElementById('preencheChave');
			comboNome.setAttribute('onsubmit', 'return true');
			return true
		}
	}
}