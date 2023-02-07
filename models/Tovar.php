<?php
require_once (ROOT."/components/Db.php");

class Tovar
{
    public static function getTovars($skip ,$limit, $sort, $idMark){
        $db = Db::getConnection();
        if($idMark != 0)
            $query = "select id, name, price, amount, photo from tovar where idMark = {$idMark} order by price $sort limit $skip, $limit";
        else
            $query = "select id, name, price, amount, photo from tovar order by price $sort limit $skip, $limit";
        $res = $db->query($query);
        $tovars = [];
        $i = 0;
        $res->setFetchMode(PDO::FETCH_ASSOC);
        while($rows = $res->fetch()){
            $tovars[$i]['id'] = $rows['id'];
            $tovars[$i]['name'] = $rows['name'];
            $tovars[$i]['price'] =$rows['price'];
            $tovars[$i]['amount'] = $rows['amount'];
            $tovars[$i]['photo'] = $rows['photo'];
            $i++;
        }
        return $tovars;
    }

    public static function getTovarsNum($idMark){
        $db = Db::getConnection();
        if($idMark != 0)
            $query = "select id from tovar where idMark = {$idMark}";
        else
            $query = "select id from tovar";
        $res = $db->query($query);
        $numRows = $res->rowCount();
        return $numRows;
    }

    public static function getTovarById($id){
        $db = Db::getConnection();
        $query = "select name, price, amount, fullDescription, photo from tovar where id = {$id}";
        $res = $db->query($query);
        $tovar = [];
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $res->fetch();
        $tovar['id'] = $id;
        $tovar['name'] = $rows['name'];
        $tovar['price'] = $rows['price'];
        $tovar['amount'] = $rows['amount'];
        $tovar['fullDescription'] = $rows['fullDescription'];
        $tovar['photo'] = $rows['photo'];
        return $tovar;
    }

    public static function getSearchedTovar($searchData){
        $db = Db::getConnection();
        $query = "select id, name, price, amount, fullDescription, photo from tovar where $searchData";
//        echo"<br><br>".$query;
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $tovars = [];
        $i = 0;
        while($rows = $res->fetch()){
            $tovars[$i]['id'] = $rows['id'];
            $tovars[$i]['name'] = $rows['name'];
            $tovars[$i]['price'] = $rows['price'];
            $tovars[$i]['amount'] = $rows['amount'];
            $tovars[$i]['fullDescription'] = $rows['fullDescription'];
            $tovars[$i]['photo'] = $rows['photo'];
            $i++;
        }
        return $tovars;
    }

    public static function getMaxAmount($array){
        $db = Db::getConnection();
        $maxValue = [];
        $i = 0;
        foreach ($array as $tmp) {
            $query = "select amount from tovar where id = {$tmp['id']}";
            $res = $db->query($query);
            $res->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $res->fetch();
            $maxValue[$i]['amount'] = $rows['amount'];
            $i++;
        }
        return $maxValue;
    }

    public static function getTovarsByRelationId($array){
        $db = Db::getConnection();
        $order = [];
        $cost = 0;
        $sum = 0;
        for($i = 0; $i < count($array); $i++){
            $query = "select name, price, photo from tovar where id = {$array[$i]['idTovar']}";
            $res = $db->query($query);
            $rows = $res->fetch();
            $cost = $array[$i]['amount']*$rows['price'];
            $sum += $cost;
            $order[$i]['id'] = $array[$i]['idTovar'];
            $order[$i]['name'] = $rows['name'];
            $order[$i]['price'] = $rows['price'];
            $order[$i]['amount'] = $array[$i]['amount'];
            $order[$i]['photo'] = $rows['photo'];
            $order[$i]['cost'] = $cost;
        }
//        print_r($order);
        $_SESSION['sum'] = $sum;
        return $order;
    }
}