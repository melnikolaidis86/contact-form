<?php


class PDOClient extends Database
{
    protected $dsn;
    protected $options;
    
    public function __construct($driver, $host, $db_name, $db_user, $db_password)
    {
        parent::__construct($host, $db_name, $db_user, $db_password);
        $this->dsn = "{$driver}:host={$this->host};dbname={$this->db_name}";
        $this->options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
    }
    
    public function connect()
    {
        try{
            $this->_handler = new PDO($this->dsn, $this->db_user, $this->db_password, $this->options);
        }catch (PDOException $ex){
            die($ex->getMessage());
        }
        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function query($sql)
    {
        $this->statement = $this->_handler->prepare($sql);
    }

    public function bind($param, $value, $type = null) 
    {
        if(is_null($type)) {
            switch (true) {
                case is_int($value) : 
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) : 
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) : 
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::STRING;
            }
        }
    }

    public function execute() 
    {
        return $this->statement->execute();
    }

    public function resultset() 
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->statement->rowCount();
    }

    public function lastInsertId()
    {
        return $this->_handler->lastInsertId();
    }

    public function beginTransaction()
    {
        return $this->_handler->beginTransaction();
    }

    public function endTransaction()
    {
        return $this->_handler->commit();
    }

    public function cancelTransaction()
    {
        return $this->_handler->rollback();
    }
}