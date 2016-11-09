<?php
    $host = '127.0.0.1';
    $user = 'lbdprojeto';                     
    $pass = ''; 
    $db = 'projeto';                            //Your database name you want to connect to
    $port = 3306;
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());
    
    $usuario = $_REQUEST['usuario'];
    $solicitante = $_REQUEST['solicitante'];
    
    $query = "SELECT ID, Nota_Qualificacao, Total_Qualificantes
              FROM Usuario WHERE ID='".$solicitante."';";
    $result = mysqli_query($connection, $query);
    include('VerClassificacao.html');
?>