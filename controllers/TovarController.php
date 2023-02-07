<?php
require_once (ROOT."/models/Tovar.php");
require_once (ROOT."/models/Categories.php");

class TovarController
{
    public function actionShow($page, $sort, $flag, $idMark){
        if($flag != 0)
            switch ($sort){
                case 'asc':
                    $sort = 'desc';
                    break;
                case 'desc':
                    $sort = 'asc';
                    break;
                case 0:
                    break;
            }
        $listNum = 2;
        $tovarsNum = Tovar::getTovarsNum($idMark);
        $pageNum = ceil($tovarsNum / $listNum);

        if($page == 0){
            $activePage = 1;
        }
        else{
            $activePage = $page;
        }
        $skip = ($activePage-1)*$listNum;
        $tovars = [];
        $tovars = Tovar::getTovars($skip, $listNum, $sort, $idMark);
        $num = $skip + 1;
        $categories = [];
        $num1 = 1;
        $categories = Categories::getCategories();
        require_once (ROOT."/views/main/showTovar.php");
        return true;
    }

    public function actionShowPodrobnee($id, $activePage){
        $tovar = [];
        $tovar = Tovar::getTovarById($id);
        $tovar['activePage'] = $activePage;
        $categories = [];
        $num1 = 1;
        $categories = Categories::getCategories();
        require_once (ROOT."/views/main/showPodrobnee.php");
        return true;
    }

    public function actionSearch($searchedData){
//        echo"test<br>";
//        echo $searchedData;
        if(isset($_POST['search']) || !empty($searchedData)){
//            echo "TEst2";
            if(!empty($searchedData)){
                $search = $searchedData;
            }
            else {
                $search = $_POST['search'];
            }
            $search1 = str_replace(',',' ', $search);
            $words = explode(' ', $search1);

            $finaleWords = [];
            if(count($words) > 0){
                foreach ($words as $tmp){
                    if(!empty($tmp)){
                        $finaleWords[] = $tmp;
                    }
                }
            }
            $whereWords = [];
            if(count($finaleWords) > 0){
                foreach($finaleWords as $tmp){
                    $whereWords[] = " name like '%{$tmp}%'";
                }
            }

            $finaleResult = implode(" or ", $whereWords);
            $num = 1;
            $tovars = [];
//            echo$finaleResult."test";
            $tovars = Tovar::getSearchedTovar($finaleResult);
            require_once (ROOT."/views/main/searchShow.php");
            return true;
        }
    }

    public function actionShowSearchPodrob($id, $searchedData){
        $tovar = [];
        $tovar = Tovar::getTovarById($id);
        require_once (ROOT."/views/main/showPodrobnee.php");
        return true;
    }
}