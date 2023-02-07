<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <table border="1">
            <tr><th>№</th><th>Photo</th><th>Name</th><th>Price</th><th>Amount</th><th>Cost</th></tr>
            <?php $num = 1; foreach ($orders as $tmp): ?>
            <tr><td><?=$num?></td><td><img width="150px" src="/templates/img/<?=$tmp['photo']?>"></td><td><?=$tmp['name']?></td><td><?=$tmp['price']?></td><td><?=$tmp['amount']?></td><td><?=$tmp['cost']?></td></tr>
            <?php $num++; endforeach; ?>
        </table>
        <br><br>
        <a href="/admin/order/clientShow">Back</a>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>