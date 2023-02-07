<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <table border="1"><tr><th>№</th><th>Photo</th><th>Brand name</th><th colspan="2">Management</th></tr>
        <?php foreach($categories as $tmp): ?>
        <tr><td><?=$num?></td><td><img width="150px" height="100px" src="/admin/templates/img/<?=$tmp['photo']?>"> </td><td><?=$tmp['name']?></td><td><a href="/admin/categories/edit/<?=$tmp['id']?>">Edit</a></td><td><a href="/admin/categories/del/<?=$tmp['id']?>/<?=$tmp['name']?>">Delete</a></td></tr>
        <?php $num++; endforeach;?>
        </table>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>