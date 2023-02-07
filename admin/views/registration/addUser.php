<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($res){ ?>
            <form action="/admin/registration/addUserRes" method="post" enctype="multipart/form-data">
                <label>Enter email</label><br>
                <input type="text" name="email" placeholder="Email"><br><br>
                <label>Enter password</label><br>
                <input type="password" name="password1" placeholder="Password"><br><br>
                <label>Repeat password</label><br>
                <input type="password" name="password2" placeholder="Repeat password"><br><br>
                <label>Enter FIO</label><br>
                <input type="text" name="FIO" placeholder="FIO""><br><br>
                <label>Enter address</label><br>
                <input type="text" name="address" placeholder="Your address""><br><br>
                <label>Choose your avatar</label><br>
                <input type="file" name="avatar"><br><br>
                <label>Choose user prava</label><br>
                <select name="prava">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select><br><br>
                <input type="submit" name="send" value="End registration">
            </form>
        <?php } else { ?>
            <p>У вас не достаточно прав для регистрации пользователя</p>
        <?php } ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>