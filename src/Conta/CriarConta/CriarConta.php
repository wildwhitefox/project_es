<?php
    $host = '127.0.0.1';
    $user = 'lbdprojeto';                     
    $pass = ''; 
    $db = 'projeto';                            //Your database name you want to connect to
    $port = 3306;
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());

    $nome = $_REQUEST['nome'];
    $email = $_REQUEST['email'];
    $usuario = $_REQUEST['usuario'];
    $telefone = $_REQUEST['telefone'];
    $senha = $_REQUEST['senha'];
    $repeticaoSenha = $_REQUEST['repeticaoSenha'];

    $error = false;
    $mensagemErro = null;
    if(!is_numeric($telefone) && $telefone!=null) {
        $telefone=null;
        $mensagemErro = "Digite apenas caracteres numericos no campo Telefone";
    }
    if(strpos($nome, "'") !== false) {
        $nome=null;
        $mensagemErro = "Digite apenas caracteres alfanumericos nos campos";
    }
    if(strpos($email, "'") !== false) {
        $email=null;
        $mensagemErro = "Digite apenas caracteres alfanumericos nos campos";
    }
    if(strpos($usuario, "'") !== false) {
        $usuario=null;
        $mensagemErro = "Digite apenas caracteres alfanumericos nos campos";
    }
    if(strpos($senha, "'") !== false) {
        $mensagemErro = "Digite apenas caracteres alfanumericos nos campos";
    }
    if($senha != $repeticaoSenha) {
        $mensagemErro =  "As senhas digitadas sao diferentes";
    }
    if($nome==null || $email==null || $usuario==null || $senha==null || $repeticaoSenha==null) {
        if($error==false) {
            $mensagemErro = "Os campos assinalados com '*' devem ser preenchidos";
        }
    }
    
    if($mensagemErro!=null) {
        $connection -> close();
        include('CriarConta.html');
    }
    else {
        $query = "INSERT INTO Usuario VALUES('".$usuario."','".$nome."','".$email."','".$senha."','".$telefone."',10,0);";
        if ($connection->query($query) === TRUE) {
            $connection -> close();
            
            include('CriacaoBemSucedida.html');
        }
        else {
            $query = "SELECT *
                  FROM Usuario 
                  WHERE Email='".$email."'";
            $result = mysqli_query($connection, $query);
            $existeTupla = false;
            while ($row = mysqli_fetch_assoc($result)) {
                $nome = $row['Nome'];
                $existeTupla = true;
            }
            $connection -> close();
            
            if($existeTupla==true) { //Email ja existente
                $mensagemErro = "Este Email ja esta cadastrado";
                include('CriarConta.html');
            }
            else { //Usuario ja existente
                $mensagemErro = "Este Usuario ja esta cadastrado";
                include('CriarConta.html');   
            }
        }
    }
?>