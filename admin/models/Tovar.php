<?php


class Tovar
{

    public static function addTovar($array){
    $db = Db::getConnection();
    $query = "insert into tovar (name, price, amount, fullDescription, idMark, photo) values (:name, :price, :amount, :fullDescription, :idMark, :photo)";
    $res = $db->prepare($query);
    $res->execute(array(":name"=>$array['name'], ":price" => $array['price'], ":amount" => $array['amount'], ":fullDescription" => $array['fullDescription'], ":idMark" => $array['idMark'], ":photo" => $array['photo']));
    return $res;
    }

    public static function getTovars(){
        $db = Db::getConnection();
        $query = "select id, name, price, amount, fullDescription, idMark, photo from tovar";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        $tovars = [];
        while($rows = $res->fetch()){
            $tovars[$i]['id'] = $rows['id'];
            $tovars[$i]['name'] = $rows['name'];
            $tovars[$i]['price'] = $rows['price'];
            $tovars[$i]['fullDescription'] = $rows['fullDescription'];
            $tovars[$i]['idMark'] = $rows['idMark'];
            $tovars[$i]['photo'] = $rows['photo'];
            $i++;
        }
        return $tovars;
    }

    public static function getTovarsByCatId($id){
        $db = Db::getConnection();
        $query = "select id, name, price, amount, fullDescription, photo from tovar where idMark = {$id}";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        $tovars = [];
        while($rows = $res->fetch()){
            $tovars[$i]['id'] = $rows['id'];
            $tovars[$i]['name'] = $rows['name'];
            $tovars[$i]['price'] = $rows['price'];
            $tovars[$i]['fullDescription'] = $rows['fullDescription'];
            $tovars[$i]['photo'] = $rows['photo'];
            $i++;
        }
        return $tovars;
    }

    public static function getEditTovarById($id){
        $db = Db::getConnection();
        $query = "select name, price, amount, fullDescription, idMark, photo from tovar where id = {$id}";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $tovar = [];
        $rows = $res->fetch();
        $tovar['id'] = $id;
        $tovar['name'] = $rows['name'];
        $tovar['price'] = $rows['price'];
        $tovar['amount'] = $rows['amount'];
        $tovar['fullDescription'] = $rows['fullDescription'];
        $tovar['idMark'] = $rows['idMark'];
        $tovar['photo'] = $rows['photo'];
        return $tovar;
    }

    public static function tovarEdit($array){
        $db = Db::getConnection();
        $query = "update tovar set name = :name, price = :price, amount = :amount, fullDescription = :fullDescription, idMark = :idMark, photo = :photo where id = :id";
        $res = $db->prepare($query);
        $res->execute(array(":name"=>$array['name'], ":price"=>$array['price'], ":amount"=>$array['amount'], ":fullDescription"=>$array['fullDescription'], ":idMark"=> $array['idMark'], ":photo"=>$array['newPhoto'],":id"=>$array['id']));
        return $res;
    }

    public static function selectTovarPhoto($id){
        $array = [];
        $db = Db::getConnection();
        $query = "select photo from tovar where id = {$id}";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $res->fetch();
        $array['photo'] = $rows['photo'];
        return $array;
    }
    public static function tovarDel($id){
        $db = Db::getConnection();
        $query = "delete from tovar where id = {$id}";
        $res = $db->query($query);
        return $res;
    }
}