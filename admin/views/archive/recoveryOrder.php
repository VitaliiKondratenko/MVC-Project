<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($res && $res1){ ?>
        <p>Заказ востановлен</p>
        <?php } else{ ?>
        <p>Ошибка востановления заказа</p>
        <?php } header("refresh:2;url=/admin/order/archive") ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>