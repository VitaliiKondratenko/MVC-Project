<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <table border="1">
        <?php foreach ($orders as $tmp){
        if($clientId != $tmp['client_id']){
        if($clientId != 0){ ?>
            <tr><td colspan="5">Over all Sum</td><td colspan="3"><?=$sum?></td></tr>
        <?php } ?>
            <tr><th>№</th><th>Client name</th><th>Address</th><th>Date of birth</th><th>Order Date</th><th>Primechanie</th><th colspan="2">Management</th></tr>
            <tr><td><?=$num1?></td><td><?=$tmp['client_name']?></td><td><?=$tmp['address']?></td><td><?=$tmp['dr']?></td><td><?=$tmp['orderDate']?></td><td><?=$tmp['primechanie']?></td><td><a href="/admin/order/delete/<?=$tmp['client_id']?>">Delete</a></td><td><a href="/admin/order/runOrder/<?=$tmp['client_id']?>">Run order</a></td></tr>
            <tr><th colspan="3">Photo</th><th>Tovar name</th><th>Price</th><th>Amount</th><th colspan="2">Cost</th></tr>
            <?php $num1++; $sum = 0; } ?>
            <tr><td colspan="3"><img width="150px" src="/../templates/img/<?=$tmp['photo']?>"></td><td><?=$tmp['tovar_name']?></td><td><?=$tmp['price']?></td><td><?=$tmp['amount']?></td><td colspan="2"><?=$tmp['cost']?></td></tr>
            <?php $clientId = $tmp['client_id']; $sum += $tmp['cost']; ?>
        <?php  } ?>
            <tr><td colspan="5">Over all Sum</td><td colspan="3"><?=$sum?></td></tr>
        </table>
    </div>
</div>

<?php include(ROOT . "/views/footer.php"); ?>
