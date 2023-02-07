<?php
require_once (ROOT."/models/Registration.php");

class RegistrationController
{
    public function actionAddUser(){
        Db::cookieProtect();
        print_r($_SESSION);
        if(isset($_SESSION['userId'], $_SESSION['userFIO'], $_SESSION['userPrava'], $_SESSION['userAvatar']) && $_SESSION['userPrava'] == 1) {
            $res = true;
            require_once(ROOT . "/views/registration/addUser.php");
            return true;
        }
        else{
            $res = false;
            require_once(ROOT . "/views/registration/addUser.php");
            return true;
        }
    }

    public function actionAddUserRes(){
        Db::cookieProtect();
        if(isset($_SESSION['userId'], $_SESSION['userFIO'], $_SESSION['userPrava'], $_SESSION['userAvatar']) && $_SESSION['userPrava'] == 1) {
            $res1 = true;
            if (isset($_POST['email'], $_POST['password1'], $_POST['password2'], $_POST['prava'], $_POST['FIO'], $_POST['address']) && $_POST['password1'] == $_POST['password2']) {
                $array = [];
                $array = Db::myProtect($_POST);
                if ($_FILES['avatar']['error'] == 0) {
                    $fileNameTmp = $_FILES['avatar']['tmp_name'];
                    $fileName = time() . $_FILES['avatar']['name'];
                    move_uploaded_file($fileNameTmp, ROOT . "/templates/img/{$fileName}");
                } else {
                    $fileName = '';
                }
                $array['photo'] = $fileName;
                $res = Registration::addUser($array);
                require_once(ROOT . "/views/registration/addUserRes.php");
                return true;
            } else {
                $res = false;
                require_once(ROOT . "/views/registration/addUserRes.php");
                return true;
            }
        }
        else{
            $res1 = false;
            require_once (ROOT . "/views/registration/addUserRes.php");
            return true;
        }
    }

    public function actionLogIn(){
        require_once (ROOT."/views/registration/logIn.php");
        return true;
    }

    public function actionLogInRes(){
        if(isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $array = [];
            $array = Db::myProtect($_POST);
            $array = Registration::userLogIn($array);
            if(isset($array['id'], $array['FIO'], $array['prava'], $array['avatar'])){
                if(empty($array['avatar']))
                    $array['avatar'] = 'noPhotoAvatar.png';
                setcookie('userId', $array['id'], time()+60*60*24*30*3);
                setcookie('userFIO', $array['FIO'], time()+60*60*24*30*3);
                setcookie('userAvatar', $array['avatar'], time()+60*60*24*30*3);
                setcookie('userPrava', $array['prava'], time()+60*60*24*30*3);
                $_SESSION['userId'] = $array['id'];
                $_SESSION['userFIO'] = $array['FIO'];
                $_SESSION['userAvatar'] = $array['avatar'];
                $_SESSION['userPrava'] = $array['prava'];
            }
            require_once (ROOT."/views/registration/logInRes.php");
            return true;
        }
    }

    public function actionExit(){
        if(isset($_COOKIE['userId'])){
            setcookie('userId', '', time()-60*60*2);
        }
        if(isset($_COOKIE['userFIO'])){
            setcookie('userFIO', '', time()-60*60*2);
        }
        if(isset($_COOKIE['userAvatar'])){
            setcookie('userAvatar', '', time()-60*60*2);
        }
        if(isset($_COOKIE['userPrava'])){
            setcookie('userPrava', '', time()-60*60*2);
        }
        $_SESSION = [];
        session_destroy();
        header("location:/admin/registration/addUser");
    }

    public function actionEditProfile($id){
        $array = [];
        $array = Registration::selectUserById($id);
        if(empty($array['avatar'])){
            $array['avatar'] = 'noPhotoAvatar.png';
        }
        require_once (ROOT."/views/registration/editProfile.php");
        return true;
    }

    public function actionEditProfileRes(){
        if(isset($_POST['id'], $_POST['send'], $_POST['email'], $_POST['password1'], $_POST['password2'], $_POST['FIO'], $_POST['address'])
        && !empty($_POST['email']) && !empty($_POST['password2']) && !empty($_POST['password1']) && !empty($_POST['FIO']) && !empty($_POST['address'])
        && $_POST['password1'] == $_POST['password2']){
            $array = [];
            $array = Db::myProtect($_POST);
            $userAvatar = [];
            $userAvatar = Registration::getUserPhoto($array['id']);
            if($_FILES['newAvatar']['error'] == 0){
                $fileNameTmp = $_FILES['newAvatar']['tmp_name'];
                $fileName = time().$_FILES['newAvatar']['name'];
                if(!empty($userAvatar['avatar'])){
                    unlink(ROOT."/templates/img/{$userAvatar['avatar']}");
                }
                move_uploaded_file($fileNameTmp, ROOT."/templates/img/{$fileName}");
            }
            else{
                $fileName = '';
            }
            $array['avatar'] = $fileName;
            $res = Registration::updateUserProfile($array);
            require_once (ROOT."/views/registration/editProfileRes.php");
            return true;
            }
        else{
            $res = false;
            require_once (ROOT."/views/registration/editProfileRes.php");
            return true;
        }
    }
}