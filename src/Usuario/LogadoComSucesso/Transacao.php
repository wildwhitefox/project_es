<?php
    $usuario = $_REQUEST['usuario'];
    
    if($usuario==null) {
        include('../../Usuario/Autentica/Autentica.html');
        return;
    }
    
    $transacao = $_REQUEST['transacao'];
    include($transacao);
?>