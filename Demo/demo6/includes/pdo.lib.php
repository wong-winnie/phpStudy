<?php

class dbDriverMySQL
{
    var $host = 'localhost';
    var $user = '';
    var $password = '';
    var $db = '';
    var $prefix = '';
    var $encoding = '';
    var $port = '';

    var $conn = '';
    var $cursor = '_default';
    var $cursors = array();

    function dbDriverMySQL($host, $user, $password, $database, $prefix, $encoding, $port)
    {
        $this->host     = $host;
        $this->user     = $user;
        $this->password = $password;
        $this->db       = $database;
        $this->prefix   = $prefix;
        $this->encoding = $encoding;
        $this->port     = $port;
    }

    function dbOpen()
    {
        $host     = $this->host;
        $user     = $this->user;
        $password = $this->password;
        $db       = $this->db;
        $type     = __MYSQL_TYPE;
        $port     = $this->port;

        //PDO 提供了一个 数据访问 抽象层，这意味着，不管使用哪种数据库，都可以用相同的函数（方法）来查询和获取数据
        try {
            $this->conn = new PDO("$type:host=$host;port=$port;dbname=$db", $user, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
    }

    function query($query)
    {
        $this->conn->query($query);
    }

    public function getInsert($table, $listarray, $exclude = '')
    {
        if ($exclude == '') {
            $exclude = array();
        }

        $query = "INSERT INTO `{$table}` SET ";

        foreach ($listarray as $key => $value) {
            if (in_array($key, $exclude)) {
                continue;
            }
            $query .= "`{$key}` = '{$value}', ";
        }
        $query = trim($query, ', ');

        $this->query($query);
    }

    function getUpdate($sql)
    {
        $this->query($sql);
    }


    function getOne($query)
    {
        return $this->conn->query($query)->fetch();
    }

    function getAll($query)
    {
        return $this->conn->query($query)->fetchAll();
    }

}