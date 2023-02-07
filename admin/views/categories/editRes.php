<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($res){ ?>
        <p>Редактирование выполнено успешно</p>
        <?php } else { ?>
        <p>Редактирование строки не удалось</p>
        <?php } ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>
