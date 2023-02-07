<?php
require_once (ROOT."/models/Categories.php");

class MainController
{
    public function actionIndex(){
        $categories = [];
        $num1 = 1;
        $categories = Categories::getCategories();
        require_once (ROOT."/views/main/index.php");
        return true;
    }

    public function actionContacts(){
        $categories = [];
        $num1 = 1;
        $categories = Categories::getCategories();
        require_once (ROOT."/views/main/contacts.php");
        return true;
    }
}