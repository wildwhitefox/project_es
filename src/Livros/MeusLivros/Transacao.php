<?php
    $host = '127.0.0.1';
    $user = 'lbdprojeto';                     
    $pass = ''; 
    $db = 'projeto';                            //Your database name you want to connect to
    $port = 3306;
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    
    $usuario = $_REQUEST['usuario'];
    $transacao = $_REQUEST['transacao'];
    
    
    $query = "DROP VIEW livrosRecebidos".$usuario.";";
    $connection -> query($query);
    $query = "DROP VIEW emprestar".$usuario.";";
    $connection -> query($query);
    
    $connection -> close();
    include($transacao);
?>