<?php
    $host = '127.0.0.1';
    $user = 'lbdprojeto';                     
    $pass = ''; 
    $db = 'projeto';                            //Your database name you want to connect to
    $port = 3306;
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());
    $usuario = $_REQUEST['usuario'];
    
    $buscaTitulo = $_REQUEST['buscaTitulo'];
    $buscaAutor = $_REQUEST['buscaAutor'];
    $buscaEditora = $_REQUEST['buscaEditora'];
    $buscaGenero = $_REQUEST['buscaGenero'];
    $buscaDevolvedor = $_REQUEST['buscaDevolvedor'];
    
    if($buscaTitulo==null) $buscaTitulo="";
    if($buscaAutor==null) $buscaAutor="";
    if($buscaEditora==null) $buscaEditora="";
    if($buscaGenero==null) $buscaGenero="";
    if($buscaDevolvedor==null) $buscaDevolvedor="";
    
    $maxTamanho = 0;
    $maxPaginas = 0;
    $paginaAtual = 1;
    //$listaLivros
    //$listaPaginas
    

    $query = "CREATE OR REPLACE VIEW livrosRecebidos".$usuario." 
                                        AS (SELECT *
                                            FROM Livros_Recebidos_De_Volta, Livro
                                            WHERE Proprietario='".$usuario."' AND
                                            
                                            Titulo LIKE '%".$buscaTitulo."%' AND
                                            Autor LIKE '%".$buscaAutor."%' AND
                                            Editora LIKE '%".$buscaEditora."%' AND
                                            Genero LIKE '%".$buscaGenero."%' AND
                                            Usuario_Que_Devolveu LIKE '%".$buscaDevolvedor."%' AND
                                            Livro_ID = ID);";
    $connection -> query($query);    
    $query = "SELECT *
              FROM livrosRecebidos".$usuario." LIMIT 0,10;";
    $listaLivros = mysqli_query($connection, $query);
    
    $query = "SELECT COUNT(*)
              FROM livrosRecebidos".$usuario.";";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $maxTamanho = $row['COUNT(*)'];
        break;
    }
    $connection -> close();
    
    $maxPaginas = ceil($maxTamanho/10);
    $auxMaxTamanho = $maxTamanho-10; 
    if($auxMaxTamanho <= 0) { //10 Livros disponiveis ou menos
        include('ListarPossiveis.html'); //Apenas 1 pagina
    }
    else {
        $listaPaginas = array($paginaAtual);
        $valorInicio = $paginaAtual - 1;
        $valorFim = $paginaAtual + 1;
    
        while(count($listaPaginas) < 5) {
            if($valorInicio < 1 && $valorFim > $maxPaginas) break;
        
            if($valorInicio >= 1) array_unshift($listaPaginas, $valorInicio); //Inserir no inicio da lista
            if($valorFim <= $maxPaginas) array_push($listaPaginas, $valorFim); //Inserir no fim da lista
            $valorInicio--;
            $valorFim++;
        }
        include('ListarPossiveis.html');
    }
?>