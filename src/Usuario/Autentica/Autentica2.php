<?php
    function autentica($usuario, $senha) {
    if($usuario==null) {
        return 0;
    }
    
    $mensagemErro = '';
    
                  
    if($usuario=='admin' && $senha=='admin') {
        return 1;
    }
    
 
     if(strpos($usuario, "'") !== false || strpos($senha, "'") !== false) {
        $mensagemErro = 'Digite apenas caracteres alfanumericos nos campos';
	   return -1;
    }
    else if($senha==null) {
        $mensagemErro = 'Digite uma senha';
	   return -2;
    }
    else {
      if(!($usuario == "valido")) {
         return -3;
      }
      if(!($senha == "valido")) {
           $mensagemErro = 'Usuario ou senha incorreto(s)';
		return -4;
      }
      else {
		return 2;
        }        
    }
}
?>
