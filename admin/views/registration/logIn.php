<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <form action="/admin/registration/logInRes" method="post">
            <label>Enter your email</label><br>
            <input type="text" name="email" placeholder="Email"><br><br>
            <label>Enter your password</label><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="submit" name="send" value="Log in">
        </form>
    </div>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>