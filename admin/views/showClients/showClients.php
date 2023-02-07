<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <table border="1">
            <tr><th>№</th><th>Name</th><th>Email</th><th>Tovars num</th></tr>
            <?php foreach ($clientOrders as $tmp): ?>

                <tr><td><?=$num?></td><td><?=$tmp['name']?></td><td><?=$tmp['email']?></td><td><a href="/admin/order/showClientTovars/<?=$tmp['id']?>"><?=$tmp['tovar_num']?></a></td></tr>

            <!--           --><?php //foreach ($clients as $tmp): $i = 0; $idClient = 0; ?>
<!--            <tr><td>--><?//=$num?><!--</td><td>--><?//=$tmp['name']?><!--</td><td>--><?//=$tmp['email']?><!--</td><td>--><?//=$tmp['dr']?><!--</td><td>--><?//=$tmp['address']?><!--</td><td>--><?//=$tmp['primechanie']?><!--</td></tr>-->
<!--            --><?php //while($tmp['id'] == $orders[$i]['client_id']){
//                if($idClient != $orders[$i]['client_id']){ ?>
<!--            <tr><th colspan="3">Photo</th><th>Tovar name</th><th>Price</th><th>Amount</th><th colspan="2">Cost</th></tr>-->
<!--            --><?php //} $idClient = $orders[$i]['client_id'] ?>
<!--            <tr><td colspan="3"><img width="150px" src="/../templates/img/--><?//=$orders[$i]['photo']?><!--"></td><td>--><?//=$orders[$i]['tovar_name']?><!--</td><td>--><?//=$orders[$i]['price']?><!--</td><td>--><?//=$orders[$i]['amount']?><!--</td><td colspan="2">--><?//=$orders[$i]['cost']?><!--</td></tr>-->
<!--            --><?php //$i++; } ?>

        <?php $num++; endforeach; ?>
        </table>
        <br><br><br>
        <table border="1">
            <tr><th>№</th><th>Name</th><th>Email</th></tr>
            <?php $num = 1; foreach ($clientOrders1 as $tmp): ?>
            <tr><td><?=$num?></td><td><?=$tmp['name']?></td><td><?=$tmp['email']?></td></tr>
            <?php $num++; endforeach; ?>
        </table>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>