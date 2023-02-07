<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <form action="/admin/registration/editProfileRes" method="post" enctype="multipart/form-data">
            <label>Edit your email</label><br>
            <input type="text" name="email" value="<?=$array['email']?>"><br><br>
            <label>Enter new password</label><br>
            <input type="password" name="password1" placeholder="New password"><br><br>
            <label>Repeat password</label><br>
            <input type="password" name="password2" placeholder="Repeat new password"><br><br>
            <label>Edit your FIO</label><br>
            <input type="text" name="FIO" value="<?=$array['FIO']?>"><br><br>
            <label>Edit your address</label><br>
            <input type="text" name="address" value="<?=$array['address']?>"><br><br>
            <label>if you want you can choose new avatar</label>&nbsp;&nbsp;&nbsp;&nbsp;<img width="150px" src="/admin/templates/img/<?=$array['avatar']?>"><br> <br>
            <input type="file" name="newAvatar"><br><br>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="oldAvatar" value="<?=$array['avatar']?>">
            <input type="submit" name="send" value="Edit">

        </form>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>