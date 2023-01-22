<?php

class Database{
    private $mysql;

    function __construct(){
        $this->mysql = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
        
        if (mysqli_connect_errno()){
            echo 'Failed to connect to MySQL: '.mysqli_connect_error();
            return;
        }

        mysqli_set_charset($this->mysql, 'utf8');
    }

    function exe_query($query){
        $res = mysqli_query($this->mysql, $query);

        if (!$res){ 
            echo 'Failed to execute query: '.mysqli_error($this->mysql);
        }

        return $res;
    }

    function get_rows($mysqli_result){
        $rows = array();
        while ($row = mysqli_fetch_object($mysqli_result)){
            $rows[] = $row;
        }

        return $rows;
    }

    function sanitize_string($str){
        return mysqli_real_escape_string($this->mysql, $str);
    }
}