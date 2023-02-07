<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($res) { ?>
            <p>User успешно добавлен</p>
        <?php } elseif(!$res1){ ?>
            <p>Увы, У вас не достаточно прав для регистрации пользователя</p>
        <?php } else { ?>
            <p>Пароли не совпадают. либо чтото пошло не так</p>
        <?php } ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>