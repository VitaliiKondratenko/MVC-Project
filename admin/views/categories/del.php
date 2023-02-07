<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <form action="/admin/categories/delRes" method="post">
            <h2><label>Are you sure you want to delete category - <?=$name?></label></h2><br><br>
            <input type="radio" name="del" value="Yes" checked>Yes
            <input type="radio" name="del" value="No">No<br><br>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" name="send" value="Delete">
        </form>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>