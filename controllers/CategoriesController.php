<?php
echo ROOT;
require_once (ROOT."/models/Categories.php");

class CategoriesController
{
    public function actionShow(){
        $categories = [];
        $categories = Categories::getCategories();
        $num1 = 1;
        require_once (ROOT."/views/main/categoriesShow.php");
        return true;
    }
}