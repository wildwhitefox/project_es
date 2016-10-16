<?php
    $host = '127.0.0.1';
    $user = 'lbdprojeto';                     
    $pass = ''; 
    $db = 'projeto';                            //Your database name you want to connect to
    $port = 3306;                               //The port #. It is always 3306
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    
    $usuario = $_REQUEST['usuario'];
    
    if($usuario==null) {
        include('../../Usuario/Autentica/Autentica.html');
        return;
    }
    
    $nome = "pattern";
    $query = "SELECT *
              FROM Usuario 
              WHERE ID='".$usuario."';";
              $result = mysqli_query($connection, $query);
        
    while ($row = mysqli_fetch_assoc($result)) {
        $nome = $row['Nome'];
    }
    include('LogadoComSucesso.html');
?>