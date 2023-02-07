<?php
require_once (ROOT."/models/Catigories.php");

class CategoriesController
{
    public function actionAdd(){
        require_once(ROOT . "/views/categories/add.php");
//        require_once (ROOT."/views/content.php");
        return true;
    }

    public function actionAddRes(){
        if(isset($_POST['send'], $_POST['name']) && !empty($_POST['name'])){
            $array = [];
            $array = Db::myProtect($_POST);
            if($_FILES['photo']['error'] == 0){
                $fileNameTmp = $_FILES['photo']['tmp_name'];
                $fileName = time().$_FILES['photo']['name'];
                move_uploaded_file($fileNameTmp, ROOT."/templates/img/{$fileName}");
            } else{
                $fileName = '';
            }
            $array['photo'] = $fileName;
            $res = Catigories::addItem($array);
            require_once (ROOT."/views/categories/addRes.php");
            return true;
        }
    }

    public function actionShow(){
        $categories = [];
        $categories = Catigories::selectCatigories();
        $num = 1;
        require_once (ROOT."/views/categories/show.php");
        return true;
    }

    public function actionEdit($id){
        $categories = [];
        $categories = Catigories::selectCategoriesById($id);
        require_once (ROOT."/views/categories/edit.php");
        return true;
    }

    public function actionEditRes(){
        if(isset($_POST['name'], $_POST['send'], $_POST['id']) && !empty($_POST['name'])){
            $array = [];
            $array = Db::myProtect($_POST);
            $oldPhoto = Catigories::getCategoryPhoto($_POST['id']);
            if($_FILES['newPhoto']['error'] == 0){
                $fileNameTmp = $_FILES['newPhoto']['tmp_name'];
                $fileName = time().$_FILES['newPhoto']['name'];
                if(!empty($oldPhoto['photo'])){
                    unlink(ROOT."/templates/img/{$oldPhoto['photo']}");
                }
                move_uploaded_file($fileNameTmp, ROOT."/templates/img/{$fileName}");
            }
            else{
                $fileName = '';
            }
            $array['photo'] = $fileName;
            $res = Catigories::editCategory($array);
            require_once (ROOT."/views/categories/editRes.php");
            return true;
        }
    }

    public function actionDel($id, $name){
        require_once (ROOT."/views/categories/del.php");
        return true;
    }

    public function actionDelRes(){
        if(isset($_POST['send'], $_POST['del'], $_POST['id']) && $_POST['del'] == "Yes"){
            $photoDel = [];
            $photoDel = Catigories::getCategoryPhoto($_POST['id']);
            if(!empty($photoDel['photo'])){
                unlink(ROOT."/templates/img/{$photoDel['photo']}");
            }
            $res = Catigories::categoryDel($_POST['id']);
            require_once (ROOT."/views/categories/delRes.php");
            return true;
        }
        else{
            $res = false;
            require_once (ROOT."/views/categories/delRes.php");
            return true;
        }
    }
}