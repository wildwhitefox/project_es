<?php
    $host = '127.0.0.1';
    $user = 'lbdprojeto';                     
    $pass = ''; 
    $db = 'projeto';                            //Your database name you want to connect to
    $port = 3306;
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());

    $usuario = $_REQUEST['usuario'];
    
    $query = "SELECT * FROM Livro WHERE Proprietario='".$usuario."'
                                        AND ID NOT IN (SELECT Livro_ID FROM Livros_Adquiridos);";
    $listaLivros = mysqli_query($connection, $query);
    include('ExcluirLivros.html');
?>