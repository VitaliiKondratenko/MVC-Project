<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <table border="1">
            <tr><th>Photo</th><th>Name</th><th>Price</th><th>Amount</th><th>fullDescription</th></tr>
            <tr><td><img width="150px" src="/templates/img/<?=$tovar['photo']?>"></td><td><?=$tovar['name']?></td><td><?=$tovar['price']?></td><td><?=$tovar['amount']?></td><td><?=$tovar['fullDescription']?></td></tr>
        </table><br><br>
        <?php if (isset($tovar['activePage'])) { ?>
            <a href="/tovar/show/<?=$tovar['activePage']?>/asc/1/0">Back</a>
        <?php } else{ ?>
            <a href="/search/<?=$searchedData?>">Back</a>
        <?php } ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>
