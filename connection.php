<?php
class DB{

    public static function getConnect(){
        $conectar=new PDO('mysql:host=bfc1uvd9pvvsfxcmhw0u-mysql.services.clever-cloud.com; port=3306; dbname=bfc1uvd9pvvsfxcmhw0u','u6zd7xy4kh2fyl0c','iTSLnsNEs5TWgrDB4sjY');
        return $conectar;
    }

}// cierra clase
