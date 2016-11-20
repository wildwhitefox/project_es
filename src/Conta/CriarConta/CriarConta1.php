<?php

function check($nome,$email,$usuario,$telefone,$senha,$repeticaoSenha) {

    if(!is_numeric($telefone) && $telefone!=null) {
        return -1;
    }
    if(strpos($nome, "'") !== false) {
        return -1;
    }
    if(strpos($email, "'") !== false) {
        return -1;
    }
    if(strpos($usuario, "'") !== false) {
        return -1;
    }
    if(strpos($senha, "'") !== false) {
        return -1;
    }
    if($senha != $repeticaoSenha) {
        return -2;
    }
    if($nome==null || $email==null || $usuario==null || $senha==null || $repeticaoSenha==null) {
        return -3;
    }
    return insere($email,$usuario);
}
function insere($email,$usuario) {
	if ($email=="usado@fake.com") {
		return -4;
	}
	if ($usuario=="usado"){
		return -5;
	}
	return 1;
}
?>
