<?php
    $host = '127.0.0.1';
    $user = 'lbdprojeto';                     
    $pass = ''; 
    $db = 'projeto';                            //Your database name you want to connect to
    $port = 3306;                               //The port #. It is always 3306
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    
    $usuario = $_REQUEST['usuario'];
    //modificado
    if($usuario==null) {
        include('../../Usuario/Autentica/Autentica.html');
        return;
    }
    
    $query = "DROP VIEW emprestar".$usuario.";";
    $connection -> query($query);
    
    $query = "DROP VIEW livrosPegos".$usuario.";";
    $connection -> query($query);
    
    $query = "DROP VIEW minhasSolicitacoes".$usuario.";";
    $connection -> query($query);
    
    $query = "DROP VIEW livrosRecebidos".$usuario.";";
    $connection -> query($query);
    
    $query = "DROP VIEW pedir".$usuario.";";
    $connection -> query($query);
    
    $query = "DELETE FROM Usuario WHERE ID='".$usuario."';";
    $connection -> query($query);
    $connection -> close();
    $mensagemSucesso = "Conta excluida com sucesso";
    include('../../Usuario/Autentica/Autentica.html');
    return;
?>