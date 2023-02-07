<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <table border="1">
        <?php foreach ($archive as $tmp):
        if($clientId != $tmp['idClient']){
            if($clientId != 0){ ?>
            <tr><th colspan="4">Over All sum</th><th colspan="3"><?=$sum?></th></tr>
            <?php } ?>
            <tr><th>№</th><th>Client name</th><th>Date of birth</th><th>address</th><th>Primechanie</th><th colspan="2">Management</th></tr>
            <tr><td><?=$num?></td><td><?=$tmp['client_name']?></td><td><?=$tmp['dr']?></td><td><?=$tmp['address']?></td><td><?=$tmp['primechanie']?></td><td colspan="2"><a href="/admin/order/recovery/<?=$tmp['idClient']?>">Recovery order</a></td></tr>
            <tr><th colspan="3">Photo</th><th>Tovar name</th><th>amount</th><th>Price</th><th>Cost</th></tr>
            <?php $num++; $sum = 0;  } $clientId = $tmp['idClient']; $sum += $tmp['cost']; ?>
            <tr><td colspan="3"><img width="150px" src="/templates/img/<?=$tmp['photo']?>"></td><td><?=$tmp['tovar_name']?></td><td><?=$tmp['amount']?></td><td><?=$tmp['price']?></td><td><?=$tmp['cost']?></td></tr>
            <?php endforeach; ?>
            <tr><th colspan="4">Over All sum</th><th colspan="3"><?=$sum?></th></tr>
        </table>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>