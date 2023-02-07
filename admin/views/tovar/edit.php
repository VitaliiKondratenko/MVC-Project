<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <form action="/admin/tovar/editRes" method="post" enctype="multipart/form-data">
            <label>Edit tovar name</label><br>
            <input type="text" name="name" value="<?=$tovar['name']?>"><br><br>
            <label>Edit tovar price</label><br>
            <input type="text" name="price" value="<?=$tovar['price']?>"><br><br>
            <label>Edit tovar amount</label><br>
            <input type="text" name="amount" value="<?=$tovar['amount']?>"><br><br>
            <label>Edit tovar fullDesc</label><br>
            <textarea name="fullDescription"><?=$tovar['fullDescription']?></textarea><br><br>
            <label>Edit tovar idMark</label><br>
            <select name="idMark">
                <?php foreach ($categories as $tmp):
                if($tovar['idMark'] == $tmp['id']){ ?>
                    <option value="<?=$tovar['idMark']?>" selected><?=$tmp['name']?></option>
                <?php } else { ?>
                    <option value="<?=$tmp['id']?>"><?=$tmp['name']?></option>
                <?php } endforeach; ?>
            </select><br><br>
            <label>Edit tovar photo</label>&nbsp;&nbsp;&nbsp;&nbsp;<img width="150px" src="<?="/../templates/img/".$tovar['photo']?>"><br>
            <input type="file" name="newPhoto"><br><br>
            <input type="hidden" name="id" value="<?=$tovar['id']?>">
            <input type="hidden" name="oldPhoto" value="<?=$tovar['photo']?>">
            <input type="submit" name="send" value="Edit">
        </form>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>