<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($flag){ $_SESSION['overAllOrders'] = 0; ?>
        <h2>Hello - <?=$client['name']?></h2>
        <p>Ваш заказ отправлен в обработку</p>
        <?php } else{ ?>
        <p>Вы должны зарегестрироватся проежде чем входить</p>
        <?php } ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>