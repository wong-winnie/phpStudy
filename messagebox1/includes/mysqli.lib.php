<?php

class dbDriverMySQL
{
    var $host = 'localhost';
    var $user = '';
    var $password = '';
    var $db = '';
    var $prefix = '';
    var $encoding = '';

    var $conn = '';
    var $cursor = '_default';
    var $cursors = array();

    function dbDriverMySQL($host, $user, $password, $database, $prefix, $encoding)
    {
        $this->host     = $host;
        $this->user     = $user;
        $this->password = $password;
        $this->db       = $database;
        $this->prefix   = $prefix;
        $this->encoding = $encoding;
    }

    function dbOpen()
    {
        $host     = $this->host;
        $user     = $this->user;
        $password = $this->password;
        $db       = $this->db;

        if (!($this->conn = @mysqli_connect($host, $user, $password))) {
            postMysqlLog('dbDriverMySQL->dbOpen(): Could not connect to MySQL database');
        }

        if ($db) {
            if (!@mysqli_select_db($this->conn, $db)) {
                postMysqlLog("dbDriverMySQL->dbOpen(): Could not select database '$db'" . $this->getError($this->conn));
            }
        }

        @mysqli_query($this->conn, sprintf("SET NAMES '%s'", $this->encoding));
        return (null);
    }

    function query($query)
    {
        $cursor = &$this->cursors[$this->cursor];
        if (!($cursor = @mysqli_query($this->conn, $query))) {
            postMysqlLog('dbDriverMySQL->query(): Could not query database' . $this->getError($this->conn));
        }
        return (null);
    }

    public function getInsert($table, $listarray, $exclude = '', $datatypes = array())
    {
        if ($exclude == '') {
            $exclude = array();
        }
        $listarray = $this->SecureData($listarray, $datatypes);

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

    //MYSQLI_ASSOC - 关联数组
    //MYSQL_NUM - 数字数组
    //MYSQL_BOTH - 默认。同时产生关联和数字数组
    function getOne($sql, $field = '', $type = MYSQLI_ASSOC)
    {
        $data = array();
        if (!$error = $this->query($sql)) {
            $results = array();
            if ($field) {
                if (!($error = $this->fetchArray($results, $type))) {
                    $data = $results[$field];
                }
            } else {
                if (!($error = $this->fetchArray($results, $type))) {
                    $data = $results;
                }
            }
        }
        $this->free();
        return $data;
    }

    function getAll($sql, $field = '', $type = MYSQLI_ASSOC)
    {
        $data = array();
        if (!$error = $this->query($sql)) {
            $results = array();
            while (!($error = $this->fetchArray($results, $type))) {
                if (empty($field)) {
                    $data[] = $results;
                } else {
                    $data[] = $results[$field];
                }
            }
        }
        $this->free();
        return $data;
    }

    function free()
    {
        $cursor = &$this->cursors[$this->cursor];
        @mysqli_free_result($cursor);
    }

    function getError()
    {
        $errno = @mysqli_errno($this->conn);

        if (strlen($errno) != 0) {
            $error = @mysqli_error($this->conn);
            return ("(MySQL Error $errno: $error)");
        }
        return (null);
    }

    private function SecureData($data, $types = array())
    {
        if (is_array($data)) {
            $i = 0;
            foreach ($data as $key => $val) {
                if (!is_array($data[$key])) {
                    $data[$key] = $this->CleanData($data[$key], $types[$i]);
                    $data[$key] = mysqli_real_escape_string($this->conn, $data[$key]);
                    $i++;
                }
            }
        } else {
            $data = $this->CleanData($data, $types);
            $data = mysqli_real_escape_string($this->conn, $data);
        }
        return $data;
    }

    private function CleanData($data, $type = '')
    {
        switch ($type) {
            case 'none':
                break;
            case 'str':
            case 'string':
                settype($data, 'string');
                break;
            case 'int':
            case 'integer':
                settype($data, 'integer');
                break;
            case 'float':
                settype($data, 'float');
                break;
            case 'datetime':
                $data = trim($data);
                $data = preg_replace('/[^\d\-: ]/i', '', $data);
                preg_match('/^([\d]{4}-[\d]{2}-[\d]{2} [\d]{2}:[\d]{2}:[\d]{2})$/', $data, $matches);
                $data = $matches[1];
                break;
            default:
                break;
        }
        return $data;
    }

    function getInsertID()
    {
        return @mysqli_insert_id($this->conn);
    }

    function fetchOne(&$results)
    {
        $results = array();
        $cursor  = &$this->cursors[$this->cursor];

        if (!($results = mysqli_fetch_row($cursor))) {
            if ($cursor == "") {
                postMysqIlLog('dbDriverMySQL->fetchOne():' . $this->cursor);
            }
            return ($this->getError());
        }
        return (null);
    }

    function fetchArray(&$results, $type)
    {
        $results = array();
        $cursor  = &$this->cursors[$this->cursor];

        if (!($results = @mysqli_fetch_array($cursor, $type))) {
            if ($cursor == "") {
                postMysqlLog('dbDriverMySQL->fetchArray():' . $this->cursor);
            }
            return ($this->getError());
        }
        return (null);
    }

}