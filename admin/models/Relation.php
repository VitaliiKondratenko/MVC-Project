<?php


class Relation
{
    public static function getAllOrders(){
        $db = Db::getConnection();
        $query = "SELECT client.id as client_id, client.name as client_name, dr, address, primechanie, tovar.name as tovar_name, price, relation.amount as relation_amount, orderDate, photo from client INNER join relation on client.id = relation.idClient INNER join tovar on relation.idTovar = tovar.id where status = 0 order by orderDate asc, client.name DEsc";
        $res = $db->query($query);
        $orders = [];
        $cost = 0;
        $sum = 0;
        $i = 0;
        while($rows = $res->fetch()){
            $cost = $rows['relation_amount']*$rows['price'];
            $orders[$i]['client_id'] = $rows['client_id'];
            $orders[$i]['client_name'] = $rows['client_name'];
            $orders[$i]['dr'] = $rows['dr'];
            $orders[$i]['address'] = $rows['address'];
            $orders[$i]['primechanie'] = $rows['primechanie'];
            $orders[$i]['tovar_name'] = $rows['tovar_name'];
            $orders[$i]['price'] = $rows['price'];
            $orders[$i]['amount'] = $rows['relation_amount'];
            $orders[$i]['orderDate'] = $rows['orderDate'];
            $orders[$i]['photo'] = $rows['photo'];
            $orders[$i]['cost'] = $cost;
            $i++;
        }
        return $orders;
    }

    public static function deleteClientOrders($id){
        $db = Db::getConnection();
        $query = "delete from relation where idClient = {$id}";
        $res = $db->query($query);
        return $res;
    }

    public static function updateAmount($id){
        $db = Db::getConnection();
        $query = "select idTovar, amount from relation where idClient = {$id}";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        while($rows = $res->fetch()){
            $query1 = "update tovar set amount = amount - {$rows['amount']} where id = {$rows['idTovar']}";
            $res1 = $db->query($query1);
        }
        return $res1;
    }

    public static function runClientOrder($id){
        $db = Db::getConnection();
        $query = "update relation set status = 1 where idClient = {$id}";
        $res = $db->query($query);
        return $res;
    }

    public static function getArchivedOrders(){
        $db = Db::getConnection();
        $query = "select client.name as client_name, dr, address, primechanie, idClient, relation.amount as relation_amount, orderDate, tovar.name as tovar_name, price, photo from client INNER join relation on client.id = relation.idClient INNER JOIN tovar on relation.idTovar = tovar.id where status = 1 order by orderDate desc, client.id asc ";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $archive = [];
        $i = 0;
        $cost = 0;
        while($rows = $res->fetch()){
            $cost = $rows['relation_amount']*$rows['price'];
            $archive[$i]['client_name'] = $rows['client_name'];
            $archive[$i]['dr'] = $rows['dr'];
            $archive[$i]['address'] = $rows['address'];
            $archive[$i]['primechanie'] = $rows['primechanie'];
            $archive[$i]['idClient'] = $rows['idClient'];
            $archive[$i]['amount'] = $rows['relation_amount'];
            $archive[$i]['date'] = $rows['orderDate'];
            $archive[$i]['tovar_name'] = $rows['tovar_name'];
            $archive[$i]['price'] = $rows['price'];
            $archive[$i]['photo'] = $rows['photo'];
            $archive[$i]['cost'] = $cost;
            $i++;
        }
        return $archive;
    }

    public static function recoveryClientOrder($id){
        $db = Db::getConnection();
        $query = "update relation set status = 0 where idClient = {$id}";
        $res = $db->query($query);
        return $res;
    }

    public static function updateRecoveryAmount($id){
        $db = Db::getConnection();
        $query = "select idTovar, amount from relation where idClient = {$id}";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        while($rows = $res->fetch()){
            $query = "update tovar set amount = amount + {$rows['amount']} where id = {$rows['idTovar']}";
            $res1 = $db->query($query);
        }
        return $res1;
    }

    public static function getClientOrder($idClient){
        $db = Db::getConnection();
        $query = "select idTovar, sum(amount) as amount from relation where idClient = {$idClient} group by idTovar";
        $res = $db->query($query);
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $order = [];
        $i = 0;
        while($rows = $res->fetch()) {
            $query1 = "select id, name, price, photo, fullDescription from tovar where id = {$rows['idTovar']}";
            $res1 = $db->query($query1);
            $rows1 = $res1->fetch();
            $order[$i]['id'] = $rows1['id'];
            $order[$i]['cost'] = $rows1['price']*$rows['amount'];
            $order[$i]['name'] = $rows1['name'];
            $order[$i]['price'] = $rows1['price'];
            $order[$i]['amount'] = $rows['amount'];
            $order[$i]['photo'] = $rows1['photo'];
            $order[$i]['fullDesc'] = $rows1['fullDescription'];
            $i++;
        }
        return $order;
    }
}