    function valida() {
        var comboNome = document.getElementById('selTAG');
        if (comboNome.options[comboNome.selectedIndex].value == '' ){
                alert("Selecione uma TAG antes de prosseguir");
				var comboNome = document.getElementById('selTAGform');
				comboNome.setAttribute('onsubmit', 'return false');
        }else{
			var comboNome = document.getElementById('selTAGform');
			comboNome.setAttribute('onsubmit', 'return true');
		}
    }