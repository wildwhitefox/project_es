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
    
    
    $nome = $_REQUEST['nome'];
    $email = $_REQUEST['email'];
    $telefone = $_REQUEST['telefone'];
    $senha = $_REQUEST['senha'];
    $repeticaoSenha = $_REQUEST['repeticaoSenha'];
    $senhaAntiga = $_REQUEST['senhaAntiga'];
    
    $query = "SELECT * FROM Usuario WHERE ID='".$usuario."';";
    $result = mysqli_query($connection,$query);
    $existeTupla = false;
    
    if($senha != $repeticaoSenha) {
        $mensagemErro = "As senhas nao correspondem";
        include('Configuracoes.html');
        return;
    }
    while($row = mysqli_fetch_assoc($result)) {
        $existeTupla = true;
        
        if($nome==null) $nome = $row['Nome'];
        if($email==null) $email = $row['Email'];
        if($telefone==null) $telefone = $row['Telefone'];
        if($senha==null) $senha = $row['Senha'];
        
        if($senhaAntiga != $row['Senha']) { //Senha incorreta
            $mensagemErro = "A senha antiga digitada eh incorreta";
            $connection -> close();
            include('Configuracoes.html');
            return;
        }
        break;
    }
    $query = "UPDATE Usuario
              SET Nome='".$nome."',Email='".$email."',Telefone='".$telefone."',Senha='".$senha."'
              WHERE ID='".$usuario."';";
    
    if ($connection->query($query) === TRUE) {
        $mensagemSucesso = "Modificacao efetuada!";    
    }
    else {
        $mensagemErro = "Este email ja existe";
    }
    $connection -> close();
    include('Configuracoes.html');
?>