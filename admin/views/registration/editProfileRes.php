<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($res){ ?>
        <p>Профиль успешно отредактирован</p>
        <?php } else { ?>
        <p>Пароли не совпадают либо чтото пошло не так</p>
        <?php } ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>