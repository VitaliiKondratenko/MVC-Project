<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <table><tr>
            <?php foreach ($categories as $tmp): ?>
                <td><a href="/admin/tovar/show/<?=$tmp['id']?>"><img width="200px" title="<?=$tmp['name']?>" src="/admin/templates/img/<?=$tmp['photo']?>"></a></td>
            <?php endforeach; ?>
                <td><a href="/admin/tovar/show/0"> <img width="200px" title="show all" src="/admin/templates/img/showAll.png"></a></td>
            </tr></table>
        <table border="1">
            <tr><th>№</th><th>Photo</th><th>Model</th><th>Price</th><th colspan="2">Management</th></tr>
            <?php foreach ($tovars as $tmp): ?>
                <tr><td><?=$num?></td><td><img width="150px" src="/templates/img/<?=$tmp['photo']?>"> </td><td><?=$tmp['name']?></td><td><?=$tmp['price']?></td><td><a href="/admin/tovar/edit/<?=$tmp['id']?>">Edit</a> </td><td><a href="/admin/tovar/del/<?=$tmp['id']?>/<?=$tmp['name']?>">Delete</a></td></tr>
            <?php $num++; endforeach; ?>
        </table>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>