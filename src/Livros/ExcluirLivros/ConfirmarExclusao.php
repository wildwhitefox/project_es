<?php

function connectDB()
{
    $host = '127.0.0.1';
    $user = 'lbdprojeto';
    $pass = '';
    $db = 'projeto';                            //Your database name you want to connect to
    $port = 3306;

    return mysqli_connect($host, $user, $pass, $db, $port) or die(mysql_error());
}

function excluir($livrosPedidos,$usuario) {
    if($livrosPedidos==null) {
        $mensagemErro = "Selecione uma ou mais livros!";
    }
    else {
        $connection = connectDB();
        $connection->query("BEGIN;");

        foreach($livrosPedidos as $k => $livroPedido) {
            $query = "DELETE
                      FROM Livro
                      WHERE ID=".$livroPedido.";";
            if ($connection->query($query) === TRUE) {
                $mensagemSucesso = "Livro(s) excluido(s)!";
                $query = "INSERT INTO Livros_Deletados VALUES(".$livroPedido.");";
                $connection -> query($query);
            }
            else $mensagemErro = "Este livro ja foi excluido!";

            $connection->query("COMMIT;");
        }
    }
    $query = "SELECT * FROM Livro WHERE Proprietario='".$usuario."'
                                        AND ID NOT IN (SELECT Livro_ID FROM Livros_Adquiridos);";
    $listaLivros = mysqli_query($connection, $query);

    include('ExcluirLivros.html');
}
if(!isset($_ENV["TRAVIS"]) || !$_ENV["TRAVIS"]) {
    $livrosPedidos = $_REQUEST['IDLivro'];
    $usuario = $_REQUEST['usuario'];
    excluir($livrosPedidos,$usuario);
}
?>
