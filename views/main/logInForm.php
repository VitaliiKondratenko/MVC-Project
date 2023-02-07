<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid" style="text-align: center; margin-top: 15%">
        <!-- Разные содержимые -->
        <form action="/client/sessionLogIn" method="post">
            <lable>Enter email</lable><br>
            <input type="text" name="email" placeholder="Email"><br><br>
            <lable>Enter password</lable><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="submit" name="send" value="Log in">
        </form>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>
