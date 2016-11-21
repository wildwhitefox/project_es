  <?php
    $connection = mysqli_connect('127.0.0.1', 'lbdprojeto','', 'projeto',3306) or die(mysql_error());
    
    function adicionarEmprestimo($proprietario, $usuario,$livro){ 
        $horaLimite = date('H', strtotime("-3 hours +1 day"));
        $dataLimite = date('Y-m-d', strtotime("-3 hours +1 day"));
        $dataAtual = date('Y-m-d', strtotime("-3 hours"));
        $query = "INSERT INTO Livros_Adquiridos VALUES(".$usuario.",".$proprietario.",'".$livroPedido."',
                                                        '".$dataLimite."',".$horaLimite.");";
        $connection->query($query);
     }
     function limpa() {
          $query = "DELETE FROM Pedir_Emprestado;
                    DELETE FROM Livros_Adquiridos;
                    DELETE FROM meus_Livros;
                    DELETE FROM Livros_Recebidos_De_Volta;";
          $connection->query($query);
      }
    function adcionarLivro($usuario,$livro) {
        $query = "INSERT INTO meus_Livros VALUES(".$usuario.",'".$livro."');"
        $connection->query($query);
    }
    function pedir($usuario,$livro, $user2) {
         $query = "INSERT INTO Pedir_Emprestado VALUES(".$usuario.",'".$livroPedido."',".$user2.");";
         $connection->query($query);
    }
    function adicionarDevolucao($proprietario, $usuario,$livro) {
         $query = "INSERT INTO Livros_Recebidos_De_Volta VALUES(".$proprietario.",".$usuario.",'".$livro."');";
         $connection->query($query);
    }
 ?>
