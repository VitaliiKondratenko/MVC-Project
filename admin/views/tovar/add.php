<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <form action="/admin/tovar/addRes" method="post" enctype="multipart/form-data">
            <label>Enter tovar name</label><br>
            <input type="text" name="name" placeholder="Name"><br><br>
            <label>Enter tovar price</label><br>
            <input type="text" name="price" placeholder="Price"><br><br>
            <label>Enter tovar amount</label><br>
            <input type="text" name="amount" placeholder="Amount"><br><br>
            <label>Enter tovar fullDesc</label><br>
            <textarea name="fullDescription" placeholder="full description"></textarea><br><br>
            <label>Enter tovar photo</label><br>
            <input type="file" name="photo"><br><br>
            <label>Choose tovar brand</label><br>
            <select name="idMark">
                <?php foreach ($catigories as $tmp): ?>
                <option value="<?=$tmp['id']?>"><?=$tmp['name']?></option>
                <?php endforeach; ?>
            </select><br><br>
            <input type="submit" name="send" value="Add">
        </form>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>