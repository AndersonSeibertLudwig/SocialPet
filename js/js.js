function verificaCadastro(){
    if(document.forms["formCadastro"].elements["nome"].value.length<3){
        alert ("Preencha todos os campos corretamente");
        document.forms["formCadastro"].elements["nome"].focus();
        document.forms["formCadastro"].elements["nome"].style.background = 'red';
        return false;
    }
    if(document.forms["formCadastro"].elements["area"].value == ""){
        alert ("Preencha todos os campos corretamente");
        document.forms["formCadastro"].elements["nome"].focus();
        document.forms["formCadastro"].elements["nome"].style.background = 'red';
        return false;
    }
    if(document.forms["formCadastro"].elements["senha"].value.length<6){
        alert ("A senha deve ter no mínimo 6 caracteres");
        document.forms["formCadastro"].elements["senha"].focus();
        document.forms["formCadastro"].elements["senha"].style.background = 'red';
        return false;
    }	
    if(document.forms["formCadastro"].elements["confirma"].value != document.forms["formCadastro"].elements["senha"].value){
        alert ("Preencha todos os campos corretamente");
        document.forms["formCadastro"].elements["confirma"].focus();
        document.forms["formCadastro"].elements["confirma"].style.background = 'red';
        return false;
    }
}
		
