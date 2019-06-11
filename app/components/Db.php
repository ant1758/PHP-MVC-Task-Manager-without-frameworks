<?php

class Db
{
    private $connect_settings = [
        "host" => "localhost",
        "user" => "user_name",
        "password" => "pass",
        "db" => "db_name"
    ];

    private $db_connect;

    public function __construct($connect_settings = null)
    {
        if (!is_null($connect_settings)){
            $this->connect_settings = $connect_settings;
        }
    }

    private function connect(){
        if($this->db_connect instanceof \mysqli && $this->db_connect->ping()){
            return true;
        }

        $resConnect = new \mysqli($this->connect_settings["host"],$this->connect_settings["user"],$this->connect_settings["password"],$this->connect_settings["db"]);

        if($resConnect->connect_error){
            throw new \Exception($resConnect->connect_error);
        }

        $this->db_connect = $resConnect;

    }

    private function disconnect()
    {
        if($this->db_connect instanceof \mysqli && $this->db_connect->ping()){
            $this->db_connect->close();
        }
    }

    public function insert($table, $values, $close = false)
    {
        $this->connect();
        $cols = array_keys($values);
        $sql = "INSERT INTO ".$table." (".implode(",", $cols).") VALUES ('".implode("','", $values)."')";
        $resQuery = $this->db_connect->query($sql);
        if(!$resQuery){
            throw new \Exception($this->db_connect->error);
        }
        if($close){
            $this->disconnect();
        }

        return $this;

    }

    public function delete($table, $where, $close = false)
    {
        $this->connect();
        $sql = "DELETE FROM ".$table." WHERE ".$where;
        $resQuery = $this->db_connect->query($sql);
        if(!$resQuery){
            throw new \Exception($this->db_connect->error);
        }
        if($close){
            $this->disconnect();
        }

        return $this;

    }

    public function update($table, $values, $where, $close = false)
    {
        $this->connect();
        $forSql = [];
        foreach ($values as $key => $value){
            $forSql[] = $key."='".$value."'";
        }
        $sql = "UPDATE ".$table." SET ".implode(",", $forSql)." WHERE ".$where;
        $resQuery = $this->db_connect->query($sql);
        if(!$resQuery){
            throw new \Exception($this->db_connect->error);
        }
        if($close){
            $this->disconnect();
        }

        return $this;

    }

    public function get_row($sql, $close = false)
    {
        $this->connect();

        $resQuery = $this->db_connect->query($sql);
        if(!$resQuery){
            throw new \Exception($this->db_connect->error);
        }

        if($resQuery->num_rows > 0)
        {
            $result = $resQuery->fetch_assoc();
            if($close){
                $this->disconnect();
            }
            return $result;
        }else{
            if($close){
                $this->disconnect();
            }
            return false;
        }

    }

    public function get_rows($sql, $close = false)
    {
        $this->connect();

        $resQuery = $this->db_connect->query($sql);
        if(!$resQuery){
            throw new \Exception($this->db_connect->error);
        }

        if($resQuery->num_rows > 0)
        {
            $result = $resQuery->fetch_all(MYSQLI_ASSOC);
            if($close){
                $this->disconnect();
            }
            return $result;
        }else{
            if($close){
                $this->disconnect();
            }
            return false;
        }

    }

}