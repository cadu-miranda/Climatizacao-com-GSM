<?php

include_once('../classes/connection.php');
include_once('../classes/sql_classe.php');

if (isset($_GET['c']) && isset($_GET['c'])) {

  $dados = [
    "c" => $_GET['c'],
    "u" => $_GET['u']
  ];

  $sql = new sql_classe();
  $resultado = $sql->registra($dados);

  if ($resultado) {
    return true;
  }
}

return false;
