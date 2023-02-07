<?php
require_once (ROOT."/models/Relation.php");
require_once (ROOT."/models/Client.php");

class OrderController
{
    public function actionShow(){
        $orders = [];
        $orders = Relation::getAllOrders();
        $num1 = 1;
        $sum = 0;
        $clientId = 0;
        require_once (ROOT."/views/order/showOrders.php");
        return true;
    }

    public function actionDelete($client_id){
//        $res = Relation::Delete
        $res = Relation::deleteClientOrders($client_id);
        require_once (ROOT."/views/order/del.php");
        return true;
    }

    public function actionRunOrder($client_id){
        $res = Relation::runClientOrder($client_id);
        $res1 = Relation::updateAmount($client_id);
        require_once (ROOT."/views/order/runOrder.php");
        return true;
    }

    public function actionArchiveShow(){
        $archive = [];
        $archive = Relation::getArchivedOrders();
        $clientId = 0;
        $num = 1;
        $sum = 0;
        require_once (ROOT."/views/archive/showOrders.php");
        return true;
    }

    public function actionRecovery($clintId){
        $res = Relation::recoveryClientOrder($clintId);
        $res1 = Relation::updateRecoveryAmount($clintId);
        require_once (ROOT."/views/archive/recoveryOrder.php");
        return true;
    }

    public function actionClientShow(){
//        $clients = [];
//        $clients = Client::getAllClients();
//        $orders = [];
//        $orders = Relation::getAllOrders();
        $clientOrders = [];
        $clientOrders = Client::getAllClientsWithMaxAmount();
        $clientOrders1 = [];
        $clientOrders1 = Client::getAllClientsWithNullAmount();
        $num = 1;
        require_once (ROOT."/views/showClients/showClients.php");
        return true;
    }

    public function actionShowClientTovars($idClient){
        $orders = [];
        $orders = Relation::getClientOrder($idClient);
        require_once (ROOT."/views/showClients/showTovarForEachClient.php");
        return true;
    }
}