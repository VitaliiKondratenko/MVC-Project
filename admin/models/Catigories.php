<?php


class Catigories
{
    public static function addItem($array){
        $db = Db::getConnection();
        $query = "insert into catigories (name, photo) values(:name, :photo)";
        $res = $db->prepare($query);
        $res->execute(array(':name'=>$array['name'], ':photo' => $array['photo']));
        return $res;
    }

    public static function selectCatigories(){
        $db = Db::getConnection();
        $query = "select id, name, photo from catigories";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $catigories = [];
        $i = 0;
        while($rows = $res->fetch()){
            $catigories[$i]['id'] = $rows['id'];
            $catigories[$i]['name'] = $rows['name'];
            $catigories[$i]['photo'] = $rows['photo'];
            $i++;
        }
        return $catigories;
    }

    public static function selectCategoriesById($id){
        $db = Db::getConnection();
        $query = "select id, name, photo from catigories where id = {$id}";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $categories = [];
        $rows = $res->fetch();
        $categories['name'] = $rows['name'];
        $categories['id'] = $id;
        $categories['photo'] = $rows['photo'];
        return $categories;
    }

    public static function getCategoryPhoto($id){
        $db = Db::getConnection();
        $query = "select photo from catigories where id = {$id}";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $res->fetch();
        $array = [];
        $array['photo'] = $rows['photo'];
        return $array;
    }

    public static function editCategory($array){
        $db = Db::getConnection();
        $query = "update catigories set name = :name, photo = :photo where id = :id";
        $res = $db->prepare($query);
        $res->execute(array(":name" => $array['name'], ":photo"=>$array['photo'], ":id"=>$array['id']));
        return $res;
    }

    public static function categoryDel($id){
        $db = Db::getConnection();
        $query = "delete from catigories where id = {$id}";
        $res = $db->query($query);
        return $res;
    }
}