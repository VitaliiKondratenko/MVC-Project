<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($res){ ?>
            <p>Категория успешно добавлена</p>
        <?php } else{ ?>
            <p>Ошибка добавления</p>
        <?php } ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>

