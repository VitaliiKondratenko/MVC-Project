<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($res && $res1){ ?>
        <p>Заказ отправлен в обработку</p>
        <?php } else{ ?>
        <p>Ошибка выполнения заказа</p>
        <?php } header("refresh:2;url=/admin/order/show"); ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>