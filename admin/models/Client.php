<?php


class Client
{
    public static function getAllClients(){
        $db = Db::getConnection();
        $query = "select id, email, name, dr, address, primechanie from client";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $clients = [];
        $i = 0;
        while($rows = $res->fetch()){
            $clients[$i]['id'] = $rows['id'];
            $clients[$i]['email'] = $rows['email'];
            $clients[$i]['name'] = $rows['name'];
            $clients[$i]['dr'] = $rows['dr'];
            $clients[$i]['address'] = $rows['address'];
            $clients[$i]['primechanie'] = $rows['primechanie'];
            $i++;
        }
        return $clients;
    }

    public static function getAllClientsWithMaxAmount(){
        $db = Db::getConnection();
        $query = "select id, name, email, sum(relation.amount) as all_num from client inner join relation on client.id = relation.idClient  group by client.id";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        $clientOrders = [];
        while($rows = $res->fetch()){
            $clientOrders[$i]['id'] = $rows['id'];
            $clientOrders[$i]['email'] = $rows['email'];
            $clientOrders[$i]['name'] = $rows['name'];
            $clientOrders[$i]['tovar_num'] = $rows['all_num'];
            $i++;
        }
        return $clientOrders;
    }

    public static function getAllClientsWithNullAmount(){
        $db = Db::getConnection();
        $query = "select id, name, email, sum(relation.amount) as all_num from client left join relation on client.id = relation.idClient where relation.amount is null group by client.id";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        $clientOrders = [];
        while($rows = $res->fetch()){
            $clientOrders[$i]['id'] = $rows['id'];
            $clientOrders[$i]['email'] = $rows['email'];
            $clientOrders[$i]['name'] = $rows['name'];
            $i++;
        }
        return $clientOrders;
    }
}