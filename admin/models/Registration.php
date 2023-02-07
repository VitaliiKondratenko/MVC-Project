<?php


class Registration
{
    public static function addUser($array){
        $db = Db::getConnection();
        $query = "insert into users (email, pass, FIO, address, regDate, avatar, prava) values(:email, sha1(:pass), :FIO, :address, now(), :avatar, :prava)";
        $res = $db->prepare($query);
        $res->execute(array(":email"=>$array['email'], ":pass"=>$array['password1'], ":FIO"=>$array['FIO'], ":address" => $array['address'], ":avatar" => $array['photo'], ':prava'=> $array['prava']));
        return $res;
    }

    public static  function userLogIn($array){
        $db = Db::getConnection();
        $query = "select id, FIO, avatar, prava from users where email = '{$array['email']}' and pass = sha1('{$array['password']}')";
//        echo $query;
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $res->fetch();
        $userLogIn = [];
        $userLogIn['id'] = $rows['id'];
        $userLogIn['FIO'] = $rows['FIO'];
        $userLogIn['avatar'] = $rows['avatar'];
        $userLogIn['prava'] = $rows['prava'];
        return $userLogIn;
    }

    public static function selectUserById($id){
        $db = Db::getConnection();
        $query = "select email, pass, FIO, address, avatar from users where id = {$id}";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $res->fetch();
        $array = [];
        $array['email'] = $rows['email'];
        $array['pass'] = $rows['pass'];
        $array['FIO'] = $rows['FIO'];
        $array['address'] = $rows['address'];
        $array['avatar'] = $rows['avatar'];
        return $array;
    }

    public static function updateUserProfile($array){
        $db = Db::getConnection();
        $query = "update users set email = :email, pass = sha1(:pass), FIO = :FIO, address = :address, avatar = :avatar where id = :id";
        $res = $db->prepare($query);
        $res->execute(array(":email" => $array['email'], ":pass" => $array['password1'], ":FIO" => $array['FIO'], ":address" => $array['address'], ":avatar" => $array['avatar'], ":id" => $array['id']));
        return $res;
    }

    public static function getUserPhoto($id){
        $db = Db::getConnection();
        $query = "select avatar from users where id = {$id}";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $res->fetch();
        $array = [];
        $array['avatar'] = $rows['avatar'];
        return $array;
    }
}