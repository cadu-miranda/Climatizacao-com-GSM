<?php
  
class sql_classe extends connection{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function consulta($strQuery)
  {
    $consulta = $this->connection->query($strQuery);

    if(!$consulta){
      return false;
    }else{
      while($linha = $consulta->fetch_assoc()){
        $linhas[] = $linha;
      }
    }
    return $linhas;
  }

  public function registra($dados){

    $temp_c = $dados['c']; // Temperatura (em graus Celsius) 
    $ura = $dados['u']; // Umidade Relativa do Ar
    $strInsert = "insert into tb_clima(c,u) values($temp_c,$ura)";
    $result = $this->connection->query($strInsert);
    if(!$result){
      return false;
    }
    
    return true;
  }
}
