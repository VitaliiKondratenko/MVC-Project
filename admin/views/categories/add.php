
<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <form action="/admin/categories/addRes" method="post" enctype="multipart/form-data">
            <label>Enter Category name</label><br>
            <input type="text" name="name" placeholder="Name"><br><br>
            <label>Choose category Photo</label><br>
            <input type="file" name="photo"><br><br>
            <input type="submit" name="send" value="Add">
        </form>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>

