<?php
$users = [];
$trans = [];
function addUsuario($usuario, $nome,$senha,$email,$telefone) {
  $users[$usuario] =true;
}
function addtransacao($t) {
  $trans[$t] =true;
}
function remove(){
  $users = [];
  $trans = [];
}
function excluirUsario($usuarios) {
  if($usuariosPedidos==null || gettype($usuariosPedidos) != "array") return -1;
  foreach($usuariosPedidos as $k => $usuario) {
    if (gettype($usario) != "string" ) return -2;
    if (!$users[$usuario]) return 0;
    $users[$usuario] = null;
  }
  return 1;
}

function excluirTransacao($transacoes) {
  if($transacoes==null || gettype($transacoes) != "array") return -1;
  foreach($transacoes as $k => $t) {
    print(gettype($t));
    if (gettype($t) != "integer" ) return -2;
    if (!$trans[$t]) return 0;
    $trans[$t] = null;
  }
  return 1;
}
?>
