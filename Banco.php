<?php

class Banco {
    
    private $pdo;
    
    function __construct() {
        
        $user = 'root';
        $pass = 'nutrifoods';

        $this->pdo = new PDO ('mysql:host=localhost:3307;dbname=nutrifoods' ,$user ,$pass); // No Windows 10 tem que colocar o número da porta
    }
    
    /**
     * Metodo Query
     * Realiza uma consulta ao banco de dados
     * @example comando select do sql
     **/

    function query($sql){
        return $this->pdo->query($sql);
    }
    
    /**
     * Metodo Exec
     * Realiza uma acao ao banco de dados
     * @example comandos : insert, update e delete do sql
     **/
     
    function exec($sql){
        return $this->pdo->exec($sql);
    }
    
}
?>