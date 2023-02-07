<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <form action="/admin/categories/editRes" method="post" enctype="multipart/form-data">
            <label>Edit category name</label><br>
            <input type="text" name="name" value="<?=$categories['name']?>"><br><br>
            <label>Edit category Photo</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img width="150px" src="<?="/admin/templates/img/".$categories['photo']?>"><br><br>
            <input type="file" name="newPhoto"><br><br>
            <input type="hidden" name="id" value="<?=$categories['id']?>">
            <input type="hidden" name="id" value="<?=$categories['id']?>">
            <input type="submit" name="send" value="Edit">
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>