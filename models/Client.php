<?php


class Client
{
    public static function getClientInfo($email, $pass){
        $db = Db::getConnection();
        $query = "select id, name, dr, address, primechanie from client where email = '{$email}' and password = sha1('{$pass}')";
        $res = $db->query($query);
        $client = [];
        if($res->rowCount() == 1){
            $rows = $res->fetch();
            $client['id'] = $rows['id'];
            $client['name']= $rows['name'];
            $client['dr'] = $rows['dr'];
            $client['address'] = $rows['address'];
            $client['primechanie'] = $rows['primechanie'];
            return $client;
        }
        else{
            return $client;
        }
    }

    public static function relationInsert($idClient){
        $db = Db::getConnection();
        for($i = 0; $i < count($_SESSION['basket']); $i++){
            $query = "insert into relation(idClient, idTovar, amount, orderDate) values(:idClient, :idTovar, :amount, now())";
            $res = $db->prepare($query);
            $res->execute(array(":idClient"=>$idClient, ":idTovar"=>$_SESSION['basket'][$i]['id'], ":amount"=>$_SESSION['basket'][$i]['amount']));
            if(!$res){
                die("Something went wrong!!!");
            }
        }
    }

    public static function clientInsert($array){
        $db = Db::getConnection();
        $query = "insert into client(email, password, name, dr, address, primechanie) values (:email, sha1(:password), :name, :dr, :address, :primechanie)";
        $res = $db->prepare($query);
        $res->execute(array(":email" => $array['email'], ":password" => $array['password1'], ":name" => $array['name'], ":dr" => $array['dr'], ":address" => $array['address'], ":primechanie" => $array['primechanie']));
        $idClient = $db->lastInsertId();
        if(!$res){
            die("Something went wrong!!!");
        }

        return $idClient;

    }

    public static function getIdTovar(){
        $db = Db::getConnection();
        $query = "select idTovar, amount from relation where idClient = {$_SESSION['userId']}";
        $res = $db->query($query);
        $idTovar = [];
        $i = 0;
        while ($rows = $res->fetch()) {
           $idTovar[$i]['idTovar'] = $rows['idTovar'];
           $idTovar[$i]['amount'] = $rows['amount'];
           $i++;
        }
        return $idTovar;
    }
}