<?php
    $host = '127.0.0.1';
    $user = 'lbdprojeto';                     
    $pass = ''; 
    $db = 'projeto';                            //Your database name you want to connect to
    $port = 3306;                               //The port #. It is always 3306
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    
    $usuario = $_REQUEST['usuario'];
    $senha = $_REQUEST['senha'];
    
    $mensagemErro = '';
    
                  
    if($usuario=='admin' && $senha=='admin') {
        include('/home/ubuntu/workspace/src/Admin/LogadoComSucesso.html');
        return;
    }
    if ($usuario==null && $senha==null) {
        $connection -> close();
        $mensagemErro = 'Digite um usuario e uma senha';
        include('../../Usuario/Autentica/Autentica.html');
        return;
    }
    else if(strpos($usuario, "'") !== false || strpos($senha, "'") !== false) {
        $connection -> close();
        $mensagemErro = 'Digite apenas caracteres alfanumericos nos campos';
        include('../../Usuario/Autentica/Autentica.html');
        return;
    }
    else if($usuario==null) {
        $connection -> close();
        $mensagemErro = 'Digite um usuario ou email';
        include('../../Usuario/Autentica/Autentica.html');
        return;
    }
    else if($senha==null) {
        $connection -> close();
        $mensagemErro = 'Digite uma senha';
        include('../../Usuario/Autentica/Autentica.html');
        return;
    }
    else {
        $query = "SELECT *
                  FROM Usuario 
                  WHERE Email='".$usuario."'";
        $result = mysqli_query($connection, $query);
        $existeCadastro = false;
        while ($row = mysqli_fetch_assoc($result)) {
            $existeCadastro = true;
            break;
        }
        if(!$existeCadastro) {
            $query = "SELECT *
                  FROM Usuario 
                  WHERE ID='".$usuario."'";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $existeCadastro = true;
                break;
            }
            if(!$existeCadastro) {
                $mensagemErro = 'Conta inexistente do usuario ou email';
                include ('../../Usuario/Autentica/Autentica.html');
                return;
            }
        }
        
        $query = "SELECT *
                  FROM Usuario 
                  WHERE Email='".$usuario."' AND Senha='".$senha."';";
        $result = mysqli_query($connection, $query);
        $existeTupla = false;
        
        if($result!=null) { //Procurando dados pelo Email
            while ($row = mysqli_fetch_assoc($result)) {
                $nome = $row['Nome'];
                $usuario = $row['ID'];
                $existeTupla = true;
                break;
            }
        }
        if($existeTupla==false) { //Procurando dados Pelo Usuario
            $query = "SELECT *
                      FROM Usuario 
                      WHERE ID='".$usuario."' AND Senha='".$senha."';";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $nome = $row['Nome'];
                $existeTupla = true;
            }
        }    
        $connection -> close();
        
        if($existeTupla==false) {
            $mensagemErro = 'Usuario ou senha incorreto(s)';
            include('../../Usuario/Autentica/Autentica.html');
        }
        else {
            include('../../Usuario/LogadoComSucesso/LogadoComSucesso.html');
        }        
    }
    //include ('../../Usuario/LogadoComSucesso/LogadoComSucesso.html')
?>