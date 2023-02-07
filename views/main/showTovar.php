<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <table border="1">
            <tr><th>№</th><th>Photo</th><th>Name</th><th><a href="/tovar/show/<?=$activePage?>/<?=$sort?>/1/<?=$idMark?>">Price</a></th><th>amount</th><th>Management</th></tr>
            <?php foreach($tovars as $tmp): ?>
            <tr><td><?=$num?></td><td><img width="150px" src="/templates/img/<?=$tmp['photo']?>"> </td><td><?=$tmp['name']?></td><td><?=$tmp['price']?></td><td><a href="/basket/add/<?=$tmp['id']?>/<?=$activePage?>">Buy</a>&nbsp; <?=$tmp['amount']?></td><td><a href="/tovar/showPodrobnee/<?=$tmp['id']?>/<?=$activePage?>">Подробнее</a></td></tr>
            <?php $num++; endforeach; ?>
        </table>
        <br><br>
        <table><tr>
                <?php if($activePage == 1) { ?>
                    <td> << &nbsp;&nbsp;</td>
                <?php } elseif($idMark != 0) {?>
                    <td><a href="/tovar/show/<?=($activePage-1)?>/<?=$sort?>/0/<?=$idMark?>"> <<</a>&nbsp;&nbsp; </td>
                    <?php } else { ?>
                    <td><a href="/tovar/show/<?=($activePage-1)?>/<?=$sort?>/0/0"> <<</a>&nbsp;&nbsp; </td>
                <?php }    ?>
                <?php for($i = 1; $i <= $pageNum; $i++){
                    if($activePage == $i) { ?>
                        <td><?=$i?>&nbsp;&nbsp;</td>
                    <?php } elseif($idMark != 0) { ?>
                        <td><a href="/tovar/show/<?=$i?>/<?=$sort?>/0/<?=$idMark?>"><?=$i?></a> &nbsp;&nbsp;</td>
                    <?php } else { ?>
                        <td><a href="/tovar/show/<?=$i?>/<?=$sort?>/0/0"><?=$i?></a> &nbsp;&nbsp;</td>
                <?php } }
                if($activePage == $pageNum) { ?>
                    <td> >> </td>
                <?php } elseif($idMark != 0) { ?>
                    <td><a href="/tovar/show/<?=($activePage+1)?>/<?=$sort?>/0/<?=$idMark?>"> >> </a> </td>
                    <?php } else { ?>
                    <td><a href="/tovar/show/<?=($activePage+1)?>/<?=$sort?>/0/0"> >> </a> </td>
                <?php } ?>
            </tr></table>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>