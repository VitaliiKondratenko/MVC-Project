<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <p>Hello user <?= $_SESSION['userFIO'] ?> </p><img width="150px" src="<?= "/admin/templates/img/".$_SESSION['userAvatar'] ?>">
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>