<?php

class usuario {
    
    private $id;
    private $email, $senha, $nome;
    private $tabela;
    
    public function __construct($data=null){
       $this->tabela="usuario";
       
       if ( ! empty($data)  ) {
            $this->hydration($data);
       }
        
    }
    
    public function hydration($data) {
        
        if (isset($data["id"])) {
            $this->id = $data["id"];
        }
        if (isset($data["email"])) {
            $this->email = $data["email"];
        }
        if (isset($data["senha"])) {
            $this->senha = $data["senha"];
        }
        if (isset($data["nome"])) {
            $this->nome = $data["nome"];
        }
    }
    
    function getInsert() {
        $sql = "insert into ".$this->tabela." (email,senha,nome) 
        values ('".$this->email."','".$this->senha."','".$this->nome."')";
        return $sql;
    }
    function getUpdate() {
        return "update ".$this->tabela.
                " set email='".$this->email."', "."senha='".$this->senha."', nome='".$this->nome."', ".
                " where id = ".$this->id;
    }
    function getDelete() {
        return "delete  from ".$this->tabela.
                " where id = ".$this->id;
    }
    
    function getSelect() {
        $sql = "select * from ".$this->tabela;
    }
    
    function getSelectById($id) {
        return "select * from ".$this->tabela." where id = $id ";
    }
}

?>