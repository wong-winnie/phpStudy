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

        if (!($this->conn = @mysql_connect($host, $user, $password))) {
            postMysqlLog('dbDriverMySQL->dbOpen(): Could not connect to MySQL database');
        }

        if ($db) {
            if (!@mysql_select_db($db, $this->conn)) {
                postMysqlLog("dbDriverMySQL->dbOpen(): Could not select database '$db'" . $this->getError($this->conn));
            }
        }

        @mysql_query(sprintf("SET NAMES '%s'", $this->encoding), $this->conn);
        return (null);
    }

    function query($query)
    {
        $cursor = &$this->cursors[$this->cursor];
        if (!($cursor = @mysql_query($query, $this->conn))) {
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

    //MYSQL_ASSOC - 关联数组
    //MYSQL_NUM - 数字数组
    //MYSQL_BOTH - 默认。同时产生关联和数字数组
    function getOne($sql, $field = '', $type = MYSQL_ASSOC)
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

    function getAll($sql, $field = '', $type = MYSQL_ASSOC)
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
        @mysql_free_result($cursor);
    }

    function getError()
    {
        $errno = @mysql_errno($this->conn);

        if (strlen($errno) != 0) {
            $error = @mysql_error($this->conn);
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
                    $data[$key] = mysql_real_escape_string($data[$key]);
                    $i++;
                }
            }
        } else {
            $data = $this->CleanData($data, $types);
            $data = mysql_real_escape_string($data);
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
        return @mysql_insert_id();
    }

    function fetchOne(&$results)
    {
        $results = array();
        $cursor  = &$this->cursors[$this->cursor];

        if (!($results = mysql_fetch_row($cursor))) {
            if ($cursor == "") {
                postMysqlLog('dbDriverMySQL->fetchOne():' . $this->cursor);
            }
            return ($this->getError());
        }
        return (null);
    }

    function fetchArray(&$results, $type)
    {
        $results = array();
        $cursor  = &$this->cursors[$this->cursor];

        if (!($results = @mysql_fetch_array($cursor, $type))) {
            if ($cursor == "") {
                postMysqlLog('dbDriverMySQL->fetchArray():' . $this->cursor);
            }
            return ($this->getError());
        }
        return (null);
    }

}