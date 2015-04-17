<?php
namespace yii\pdo;

use \PDO;

class Connection{

    private $connection;

    public function srv($name=null){

        if(!isset($this->servers[$name])) die('This server pdo is not configure');

        if(!$this->connection){
            $this->connection = new PDO(
                $this->servers[$name]['dsn'],
                $this->servers[$name]['user'],
                $this->servers[$name]['pass']
            );
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }

        return $this->connection;
    }

}
?>
