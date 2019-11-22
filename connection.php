<?php
class connection
{
  private $host = "";
  private $user = "";
  private $password = "";
  private $banco= "";
  protected $connection;
	
	public function __construct()
	{
		if (!isset($this->connection)) {
			
			$this->connection = new mysqli($this->host, $this->user, $this->password, $this->banco);
			
			if (!$this->connection) {
				return false;
			}
		}	
    return $this->connection;	
  }
  
}
