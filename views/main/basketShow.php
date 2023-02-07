<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <form action="/basket/recountAmount" method="post" >
        <table border="1">
            <tr><td>№</td><td>Photo</td><td>Name</td><td>Price</td><td>Amount</td><td>Cost</td><td>Delete</td></tr>
        <?php foreach ($_SESSION['basket'] as $tmp): ?>
            <tr><td><?=$num?></td><td><img width="150px" src="/templates/img/<?=$tmp['photo']?>"></td><td><?=$tmp['name']?></td><td><?=$tmp['price']?></td><td style="text-align: center"><input type="number" name="amount<?=$tmp['id']?>" min="1" max="<?=$array[$i]['amount']?>" value="<?=$tmp['amount']?>"></td><td><?=$tmp['cost']?></td><td style="text-align: center"><a href="/basket/delItem/<?=$tmp['id']?>">X</a></td></tr>
            <?php  $i++; $num++; endforeach; ?>
            <tr><td colspan="4">Over all price</td><td colspan="3"><?=$sum?></td></tr>
            <tr><th colspan="7" style="text-align: center"><input type="submit" name="send" value="Recount"></th></tr>
        </table><br><br>
            <br><br><p><span style="padding: 100px"><a href="/basket/basketClean">Basket full clean</a> </span><span><a href="/basket/submitOrder">Submit order</a> </span></p>
        </form>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>