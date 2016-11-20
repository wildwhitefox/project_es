<?php

function limpar() {
  /*$mine = [];
  $pedidos = [];
  $emprestados = [];
  $count = 0;*/
}
function adcionarLivro($usuario,$livro) {
//  $pedidos[$usuario][$livro] = true;
}
function pedir($usuario,$livro, $user2) {
//  if ($pedidos[$usuario] == null) $pedidos[$usuario] = [];
//  $pedidos[$usuario][$livro] = $user2;
}
function adicionarEmprestimo($proprietario, $usuario,$livro) {
//  if ($emprestados[$usuario] == null) $emprestados[$usuario] = [];
//  $emprestados[$usuario][$livro] = $proprietario;
}
function adicionarDevolucao($proprietario, $usuario,$livro) {
//  if ($emprestados[$proprietario] == null) $emprestados[$proprietario] = [];
//  $emprestados[$proprietario][$livro] = $usuario;
}
function emprestar($usuario, $emprestarUsuarios, $action){
  usleep(150);
  $pedidos = [
    1 => ["livro1" => 2, "livro2" => 2, "livro3" => 3],
    2 => ["livro4" => 1, "livro5" => 3],
    3 => ["livro6" => 2]
  ];
  if($emprestarUsuarios==null || $usuario==null || $action==null || gettype($emprestarUsuarios) != "array"|| gettype( $usuario) != "interger"|| gettype($action) != "string")
      return -1;
  if($action == 'remover') {
    foreach($emprestarUsuarios as $k => $emprestarLivro) {
        if (gettype($emprestarLivro) != "string") return -1;
        $stringDuplicada = $emprestarLivro;
        $stringDuplicada = explode("'",$stringDuplicada);

        $usuarioPedidoID = $stringDuplicada[0];
        $livroPedido = $stringDuplicada[1];

        if (!($pedidos[$usuario][$livroPedido] == $usuarioPedidoID))
          return 0;
        $pedidos[$usuario][$livroPedido] = null;
    }
    return 1;
  }

  elseif($action == 'aceita'){

    foreach($emprestarUsuarios as $k => $emprestarLivro) {
        if (gettype($emprestarLivro) != "string") return -1;
        $stringDuplicada = $emprestarLivro;
        $stringDuplicada = explode("'",$stringDuplicada);
        $livroPedido = $stringDuplicada[1];

        if ($mine[$livroPedido] == null) return 0;
        $mine[$livroPedido] = null;
    }
    return 1;
  }
  return -1;
}

function excluir($usuario, $livrosPedidos) {
  usleep(150);
  $pedidos = [
    1 => ["livro1" => true, "livro2" => true, "livro3" => true],
    2 => ["kamasutra" => true],
  ];
  if($livrosPedidos==null || $usuario ==null || gettype($livrosPedidos) != "array" || gettype($usuario) != "integer")
  return -1;
  else {
    foreach($livrosPedidos as $k => $livro) {
        if ($pedidos[$usuario][$livro] == null)
          return 0;
        $pedidos[$usuario][$livro] = null;
    }
    return 1;
  }
}

function  devolver($usuario, $livrosPedidos) {
  usleep(150);
  $emprestados = [
    2 => [
     "livro1" => 1,
     "livro2" => 3,
     "livro3" => 4,
     "livro4" => 5
    ]
  ];
  if($livrosPedidos==null || $usuario ==null || gettype($livrosPedidos) != "array") {
      return -1;
  }
  foreach($livrosPedidos as $k => $livroPedido) {
      $proprietario = $emprestados[$usuario][$livroPedido];
      if($proprietario == null)
        return 0;
      $emprestados[$usuario][$livroPedido] = null;
  }
  return 1;
}

function  deletarSolicitacoes($usuario, $livrosPedidos) {
  usleep(100);
  $pedidos = [
    1 => ["livro1" => 2, "livro2" => 2, "livro3" => 3],
    2 => ["livro4" => 1, "livro5" => 3],
    3 => ["livro6" => 2]
  ];
  if($livrosPedidos==null || $usuario ==null) {
      return -1;
  }
  foreach($livrosPedidos as $k => $livroPedido) {
      if ($pedidos[$usuario][$livroPedido] == null) return 0;
      $pedidos[$usuario][$livroPedido] == null;
  }
  return 1;
}

function cadastrarLivro($usuario, $titulo, $edicao, $editora, $autor, $genero){
  usleep(300);
  if (!isset($count)) $GLOBALS["count"] = 0;
  if($usuario==null) {
      return -1;
  };

  if ($titulo==null||$autor==null||$editora==null||$edicao==null) {
      return -1;
  }
  else if(strpos($titulo, "'") !== false || strpos($autor, "'") !== false || strpos($editora, "'") !== false ||
          strpos($genero, "'") !== false) {
      return -2;
  }
  else if(!is_numeric($edicao)) {
      return -3;
  }
  else {
      if($count >= 10) {
          return 0;
      }
      else {
          $count=$count+1;
          return 1;
      }
  }
}

function pedirEmprestado($usuario, $pedinte, $livrosPedidos) {
  usleep(150);
  $emprestados = [
    1 => [
     "best livro" => 2
    ]
  ];
  if($livrosPedidos==null || $usuario == null) {
      return -1;
  }

  $existeTupla = false;
  foreach($livrosPedidos as $k => $livroPedido) {

      if($emprestados[$usuario][$livroPedido]) {
          $existeTupla=true;
      }
      $emprestado[$usuario][$livroPedido] = $pedinte;
  }
  if($existeTupla==true) {
      return 0;
  }
  else {
      return 1;
  }
}

function removerDaLista($usuario,$usuariosDevolucoes) {
  $pedidos =[
    1 =>  ["algum livro" => 2, "outro livro" => 3]
  ];
  if($usuariosDevolucoes==null || $usuario == null) {
      return -1;
  }

  $stringDuplicada;
  foreach($usuariosDevolucoes as $k => $usuarioDevolveu) {
      $stringDuplicada = $usuarioDevolveu;
      $stringDuplicada = explode("'",$stringDuplicada);

      $usuarioDevolveuID = $stringDuplicada[0];
      $livroDevolveuID = $stringDuplicada[1];
      if (!($pedidos[$usuario][$livroDevolveuID] == $usuarioDevolveuID))
        return 0;
      $pedidos[$usuario][$livroDevolveuID] = null;
  }
  return 1;
}

?>
