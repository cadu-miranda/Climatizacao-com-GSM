<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Projeto Redes - Zabbix/Arduino/GSM </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js" integrity="sha256-Ac6pM19lP690qI07nePO/yY6Ut3c7KM9AgNdnc5LtrI=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha256-jfr3oM7h2TWPi2Q0O0vPuRh+pc0eSfWfpZ2nHXt8tFQ=" crossorigin="anonymous"></script>
</head>

<?php 

include_once('../classes/connection.php');
include_once('../classes/sql_classe.php');

$sql = new sql_classe();
$resultado = $sql->consulta("select c,u,data_hora from tb_clima order by id desc limit 1");
?>

<body>

</body>
  <div>
    <?php foreach($resultado as $linha){
      echo '<p><strong>1 </strong>' . $linha['c'] . '</p>';
      echo '<p><strong>2 </strong>' . $linha['u'] . '</p>';
      echo '<p><strong>Última Atualização: </strong> ' . date('d/m/Y H:i:s',strtotime($linha['data_hora'])) . '</p>';
    }?>    
  </div>
</html>
