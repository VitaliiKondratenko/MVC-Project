<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($res){ ?>
        <p>Удаление успешно выполнено</p>
        <?php } else { ?>
        <p>Удаление отменено</p>
        <?php } ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>