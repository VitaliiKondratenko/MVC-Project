<?php


class Categories
{
    public static function getCategories(){
        $db = Db::getConnection();
        $query = "select id, name, photo from catigories";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        $categories =[];
        while($rows = $res->fetch()){
            $categories[$i]['id'] = $rows['id'];
            $categories[$i]['name'] = $rows['name'];
            $categories[$i]['photo'] = $rows['photo'];
            $i++;
        }
        return $categories;
    }
}