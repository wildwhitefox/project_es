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
    
    $query = "SELECT ID, Nota_Qualificacao, Total_Qualificantes
              FROM Usuario
              WHERE ID='".$usuario."';";
    $result = mysqli_query($connection, $query);
    include('MinhaReputacao.html');
?>