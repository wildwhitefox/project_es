<?php

function addUsuario($usuario, $nome,$senha,$email,$telefone) {
  /*if (!isset($user)) $GLOBALS["users"] = [];
  $users[$usuario] =true;*/
}
function addtransacao($t) {
  /*if (!isset($trans)) $GLOBALS["trans"] = [];
  $trans[$t] =true;*/
}
function remove(){
  /*$users = [];
  $trans = [];*/
}
function excluirUsario($usuarios) {
  $users = ["valido1","valido2","valido3"];
  if($usuarios==null || gettype($usuarios) != "array") return -1;
  foreach($usuarios as $k => $usuario) {
    if (gettype($usario) != "string" ) return -2;
    if (!$users[$usuario]) return 0;
    $users[$usuario] = null;
  }
  return 1;
}

function excluirTransacao($transacoes) {
  $trans = [1,2,3,4,5,6,7,8];
  if($transacoes==null || gettype($transacoes) != "array") return -1;
  foreach($transacoes as $k => $t) {
    if (gettype($t) != "integer" ) return -2;
    if (!$trans[$t]) return 0;
    $trans[$t] = null;
  }
  return 1;
}
?>
