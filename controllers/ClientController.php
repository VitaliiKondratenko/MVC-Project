<?php
require_once (ROOT.'/models/Client.php');
require_once (ROOT.'/models/Tovar.php');

class ClientController
{
    public function actionLogIn(){
        if(isset($_POST['send'], $_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $client = [];
            $client = Client::getClientInfo($_POST['email'], $_POST['password']);
            if(count($client) > 0){
                $flag = 1;
                Client::relationInsert($client['id']);
                unset($_SESSION['basket']);
                $_SESSION['basket'] = [];
                require_once (ROOT.'/views/main/confirmOrder.php');
            }
            else{
                $flag = 0;
                require_once (ROOT.'/views/main/confirmOrder.php');
            }
            return true;
        }
    }

    public function actionRegistr(){
        if(isset($_POST['send'], $_POST['email'], $_POST['password1'], $_POST['password2'], $_POST['name'], $_POST['dr'], $_POST['address'], $_POST['primechanie'])
        && !empty($_POST['email']) && !empty($_POST['password1']) && !empty($_POST['name']) && !empty($_POST['dr']) && !empty($_POST['address']) && $_POST['password1'] == $_POST['password2']){
            $client = [];
            $client = Db::myProtect($_POST);
            $idClient = Client::clientInsert($client);
            if($idClient){
                $flag = 1;
                Client::relationInsert($idClient);
                unset($_SESSION['basket']);
                $_SESSION['basket'] = [];
                require_once (ROOT.'/views/main/confirmOrder.php');
            }

        }
    }


    public function actionShowFormLogIn(){
        require_once (ROOT."/views/main/logInForm.php");
        return true;
    }

    public function actionSessionLogIn(){
        if(isset($_POST['email'], $_POST['send'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $client = [];
            $client = CLient::getClientInfo($_POST['email'], $_POST['password']);
            if(count($client) > 0){
                $flag = 1;
                $_SESSION['userId'] = $client['id'];
                $_SESSION['userName'] = $client['name'];
                setcookie("userId", $client['id'], time()+60*60*24*30*3);
                setcookie("userName", $client['name'], time()+60*60*24*30*3);
                require_once (ROOT."/views/main/userHello.php");
            }
            else{
                $flag = 0;
                require_once (ROOT."/views/main/userHello.php");
            }
            return true;
        }
    }

    public function actionUserOrders(){
        if(isset($_SESSION['userId'], $_SESSION['userName'])) {
            $status = true;
            $idTovar = [];
            $idTovar = Client::getIdTovar();
            $orders = [];
            $orders = Tovar::getTovarsByRelationId($idTovar);
            $num = 1;
            require_once(ROOT . "/views/main/showUserTovars.php");
            return true;
        }
        else{
            $status = false;
            require_once(ROOT . "/views/main/showUserTovars.php");
            return true;
        }
    }

    public function actionExit(){
        if(isset($_COOKIE['userId'])){
            setcookie('userId', '', time()-60*60*2);
        }
        if(isset($_COOKIE['userName'])){
            setcookie('userName', '', time()-60*60*2);
        }
        $_SESSION = [];
        if(isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-60*60*2);
        }
        session_destroy();
        header("location:/client/showForm/LogIn");
    }
}