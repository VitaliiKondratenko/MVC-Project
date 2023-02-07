<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <form action="/admin/tovar/delRes" method="post">
            <h2><label>Are you sure you want to delete tovar - <?=$name?></label></h2>
            <input type="radio" name="del" value="Yes" checked>Yes
            <input type="radio" name="del" value="No">No
            <input type="hidden" name="id" value="<?=$id?>"><br><br>
            <input type="submit" name="send" value="Delete">
        </form>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>