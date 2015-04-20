<?php
namespace yii\pdo;

use \PDO;

class Connection{

    private $connection;

    public function createConnection(){

        if(!isset($this->servers[$name])) die('This server pdo is not configure');

        if(!$this->connection){
            $this->connection = new PDO(
                $this->dsn,
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }

        return $this->connection;
    }
    
    public function fetch($sql){
        $cn = $this->createConnection();
        $q = $cn->query($sql);
        if($q) return $q->fetch();
    }
    
    public function fetchAll($sql){
        $cn = $this->createConnection();
        $q = $cn->query($sql);
        if($q) return $q->fetchAll();
    }

    public function exec($sql){
        $cn = $this->createConnection();
        return $cn->exec($sql);
    }

}
?>
