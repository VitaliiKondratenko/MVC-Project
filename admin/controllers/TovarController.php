<?php
require_once (ROOT."/models/Tovar.php");
require_once (ROOT."/models/Catigories.php");

class TovarController
{
    public function actionAdd(){
        $catigories = [];
        $catigories = Catigories::selectCatigories();
        require_once (ROOT."/views/tovar/add.php");
        return true;
    }

    public function actionAddRes(){
        Db::cookieProtect();
        if(isset($_SESSION['userId'], $_SESSION['userFIO'], $_SESSION['userPrava'], $_SESSION['userAvatar'])) {
            if (isset($_POST['name'], $_POST['price'], $_POST['amount'], $_POST['fullDescription'], $_POST['idMark'])) {
                $array = [];
                $array = Db::myProtect($_POST);
                $path = str_replace('\admin', '/', ROOT);
                if ($_FILES['photo']['error'] == 0) {
                    $fileNameTmp = $_FILES['photo']['tmp_name'];
                    $fileName = time() . $_FILES['photo']['name'];
                    move_uploaded_file($fileNameTmp, $path . "/templates/img/{$fileName}");
                } else {
                    $fileName = '';
                }
                $array['photo'] = $fileName;
                $res = Tovar::addTovar($array);
                require_once(ROOT . "/views/tovar/addRes.php");
            }
            return true;
        }
    }

    public function actionShow($id){
//        echo $id;
        $categories = [];
        $categories = Catigories::selectCatigories();
        if($id != 0){
            $tovars = [];
            $tovars = Tovar::getTovarsByCatId($id);
        }
        else {
            $tovars = [];
            $tovars = Tovar::getTovars();
        }
        $num = 1;
        require_once(ROOT . "/views/tovar/show.php");
        return true;
    }

    public function actionEdit($id){
            $tovar = [];
            $tovar = Tovar::getEditTovarById($id);
            $categories = [];
            $categories = Catigories::selectCatigories();
            $path = str_replace('\admin', "/", ROOT);
            require_once (ROOT."/views/tovar/edit.php");
            return true;
    }

    public function actionEditRes(){
        if(isset($_POST['send'], $_POST['name'], $_POST['id'], $_POST['price'], $_POST['amount'], $_POST['fullDescription'], $_POST['idMark'])
        && !empty($_POST['name']) && !empty($_POST['id']) && !empty($_POST['price']) && !empty($_POST['amount']) && !empty($_POST['fullDescription'])
            && !empty($_POST['idMark'])){
            $array = [];
            $array = Db::myProtect($_POST);
            $path = str_replace('\admin', '/', ROOT);
            if($_FILES['newPhoto']['error'] == 0){
                $fileNameTmp = $_FILES['newPhoto']['tmp_name'];
                $fileName = time().$_FILES['newPhoto']['name'];
                if($_POST['oldPhoto'] != 'noPhoto.webp')
                    unlink($path."/templates/img/".$_POST['oldPhoto']);
                move_uploaded_file($fileNameTmp, $path."/templates/img/{$fileName}");
            }
            else {
                $fileName = '';
            }
            $array['newPhoto'] = $fileName;
            $res = Tovar::tovarEdit($array);
            require_once (ROOT."/views/tovar/editRes.php");
            return true;
        }
    }

    public function actionDel($id,  $name){

        require_once (ROOT."/views/tovar/del.php");
        return true;
    }

    public function actionDelRes(){
        if(isset($_POST['id'], $_POST['del']) && $_POST['del'] == "Yes"){
            $array = [];
            $array = Tovar::selectTovarPhoto($_POST['id']);
            if(!empty($array['photo'])){
                unlink(ROOT."/../templates/img/".$array['photo']);
            }
            $res = Tovar::tovarDel($_POST['id']);
            require_once (ROOT."/views/tovar/delRes.php");
            return true;
        }
        else{
            $res = false;
            require_once (ROOT."/views/tovar/delRes.php");
            return true;
        }
    }
}