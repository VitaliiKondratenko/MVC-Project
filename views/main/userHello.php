<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <?php if($flag) { ?>
        <h2>Hello - <?=$client['name']?></h2>
        <p>We are glad to see you</p>
        <?php } else { ?>
        <p>Wrong password or email</p>
        <?php } ?>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>
