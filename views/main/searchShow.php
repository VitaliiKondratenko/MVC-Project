<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <table border="1">
            <tr><th>№</th><th>Photo</th><th>Name</th><th>Price</th><th>amount</th><th>Management</th></tr>
            <?php foreach($tovars as $tmp):
                if(isset($_POST['search'])) { ?>
                    <tr><td><?=$num?></td><td><img width="150px" src="/templates/img/<?=$tmp['photo']?>"> </td><td><?=$tmp['name']?></td><td><?=$tmp['price']?></td><td><?=$tmp['amount']?></td><td><a href="/tovar/showSearchPodrob/<?=$tmp['id']?>/<?=$_POST['search']?>">Подробнее</a></td></tr>
                <?php } else { ?>
                    <tr><td><?=$num?></td><td><img width="150px" src="/templates/img/<?=$tmp['photo']?>"> </td><td><?=$tmp['name']?></td><td><?=$tmp['price']?></td><td><?=$tmp['amount']?></td><td><a href="/tovar/showSearchPodrob/<?=$tmp['id']?>/<?=$search?>">Подробнее</a></td></tr>
            <?php } $num++; endforeach; ?>
        </table>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>