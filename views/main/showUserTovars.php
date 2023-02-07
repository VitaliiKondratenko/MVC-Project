<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($status){ ?>
        <table border="1">
            <tr><th>№</th><th>Photo</th><th>Name</th><th>Price</th><th>Amount</th><th>Cost</th></tr>
        <?php foreach ($orders as $tmp): ?>
            <tr><td><?=$num?></td><td><img width="150px" src="/templates/img/<?=$tmp['photo']?>"></td><td><?=$tmp['name']?></td><td><?=$tmp['price']?></td><td><?=$tmp['amount']?></td><td><?=$tmp['cost']?></td></tr>
        <?php $num++; endforeach; ?>
            <tr><td colspan="4">Over All sum</td><td colspan="2"><?=$_SESSION['sum']?></td></tr>
        </table>
        <?php } else{ ?>
        <p>You must log in before checking your orders</p>
        <a href="/client/showForm/LogIn">Log In</a>
        <?php } ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>
