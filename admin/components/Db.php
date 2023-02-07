<?php


class Db
{
    public static function getConnection(){
        $paramPath = ROOT."/config/param.php";
        $param = [];
        $param = include($paramPath);
        $dcn = "mysql:host={$param['host']};dbname={$param['dbName']}";
        $db = new PDO($dcn, $param['user'], $param['pass']);
        return $db;
    }

    public static function myProtect($arrayData){
        foreach ($arrayData as $key => $value) {
            $value = trim($value);
            if(get_magic_quotes_gpc()){//Проверяет включина на сервере ли возможность добавления спец символов
                $value = stripcslashes($value);// Убирает слеши
            }
            $value = htmlspecialchars($value, ENT_QUOTES);// ЗАменяет служебные символы аштмл на эквиваленты(на Аски код символа)
            $arrayData[$key] = $value;
        }
        return $arrayData;
    }

    public static function cookieProtect(){
        if(isset($_COOKIE['userId'], $_COOKIE['userFIO'], $_COOKIE['userPrava'], $_COOKIE['userAvatar'])){
            $_SESSION['userId'] = $_COOKIE['userId'];
            $_SESSION['userFIO'] = $_COOKIE['userFIO'];
            $_SESSION['userPrava'] = $_COOKIE['userPrava'];
            $_SESSION['userAvatar'] = $_COOKIE['userAvatar'];
        }
    }
}