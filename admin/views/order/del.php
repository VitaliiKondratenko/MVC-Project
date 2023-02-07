<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($res) { ?>
        <p>Покупатель успешно удален</p>
        <?php } else{ ?>
        <p>Ошибка удаления</p>
        <?php } header("refresh:2;url=/admin/order/show"); ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>