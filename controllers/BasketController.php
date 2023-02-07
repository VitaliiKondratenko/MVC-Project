<?php
require_once (ROOT."/models/Tovar.php");

class BasketController
{
    public function countBasket(){
        $number = 0;
        for($i = 0; $i < count($_SESSION['basket']); $i++){
            $number += $_SESSION['basket'][$i]['amount'];
        }
        return $number;
    }
    public function actionAdd($id, $activePage){
        $exist = false;
        if(!isset($_SESSION['basket'])){
            $_SESSION['basket'] = [];
        }
        if(count($_SESSION['basket']) > 0){
            for($i = 0; $i < count($_SESSION['basket']); $i++){
                if($_SESSION['basket'][$i]['id'] == $id){
                    $_SESSION['basket'][$i]['amount']++;
                    $exist = true;
                    break;
                }
            }
        }
        if(!$exist){
            $tovar = [];
            $tovar = Tovar::getTovarById($id);
            if(empty($tovar['photo']))
                $tovar['photo'] = 'noPhoto.png';
            $_SESSION['basket'][] = array('id' => $id, 'name' => $tovar['name'], 'price'=>$tovar['price'], 'amount'=>1, 'photo' =>$tovar['photo']);
        }
        $_SESSION['overAllOrders'] = 0;
        $_SESSION['overAllOrders'] = $this->countBasket();
//        echo $_SESSION['overAllOrders'];
        header("location:/tovar/show/$activePage/asc/0/0");
        return true;
    }

    public function actionShow(){
        $array = [];
        $array = Tovar::getMaxAmount($_SESSION['basket']);
        $cost = 0;
        $sum = 0;
        for($i = 0; $i < count($_SESSION['basket']); $i++){
            $cost = $_SESSION['basket'][$i]['price']*$_SESSION['basket'][$i]['amount'];
            $_SESSION['basket'][$i]['cost'] = $cost;
            $sum += $cost;
        }
        $num = 1;
        $i = 0;
        require_once (ROOT."/views/main/basketShow.php");
        return true;
    }

    public function actionDelItem($id){
        for($i = 0; $i < count($_SESSION['basket']); $i++){
            if($id == $_SESSION['basket'][$i]['id']){
                unset($_SESSION['basket'][$i]);
            }
        }
        $items = [];
        foreach ($_SESSION['basket'] as $tmp){
            if(!empty($tmp)){
                $items[] = $tmp;
            }
        }
        $_SESSION['basket'] = [];
        $_SESSION['basket'] = $items;
        $_SESSION['overAllOrders'] = $this->countBasket();
        unset($items);
        header("location:/basket/show");
    }

    public function actionClean(){
        unset($_SESSION['basket']);
        $_SESSION['basket'] = [];
        $_SESSION['overAllOrders'] = $this->countBasket();
        header("location:/tovar/show/1/asc/0/0");
    }

    public function actionRecount(){
        if(isset($_POST['send'])){
            for($i = 0; $i < count($_SESSION['basket']); $i++){
                $itemName = "amount".$_SESSION['basket'][$i]['id'];
                $_SESSION['basket'][$i]['amount'] = $_POST[$itemName];
            }
        }
        header("location:/basket/show");
        return true;
    }

    public function actionSubmitOrder(){
        $sum = 0;
        $cost = 0;
        for($i = 0; $i < count($_SESSION['basket']); $i++){
            $cost = $_SESSION['basket'][$i]['price']*$_SESSION['basket'][$i]['amount'];
            $_SESSION['basket'][$i]['cost'] = $cost;
            $sum += $cost;
        }
        $num = 1;
        require_once (ROOT."/views/main/orderSubmit.php");
        return true;
    }

}