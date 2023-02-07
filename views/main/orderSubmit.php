<!-- End Navbar -->
<?php
include(ROOT."/views/menu.php");
include(ROOT . "/views/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <!-- Разные содержимые -->
        <table border="1">
            <tr><td>№</td><td>Photo</td><td>Name</td><td>Price</td><td>Amount</td><td>Cost</td></tr>
        <?php foreach ($_SESSION['basket'] as $tmp): ?>
        <tr><td><?=$num?></td><td><img width="150px" src="/templates/img/<?=$tmp['photo']?>"></td><td><?=$tmp['name']?></td><td><?=$tmp['price']?></td><td><?=$tmp['amount']?></td><td><?=$tmp['cost']?></td></tr>
        <?php $num++; endforeach; ?>
            <tr><th colspan="3">Over all price</th><th colspan="3"><?=$sum?></th></tr>
        </table>
            <div style="position: absolute; top: 100px; left:600px">
                <h4>Log In</h4>
                <form action="/client/logIn" method="post">
                    <label>Enter login</label><br>
                    <input type="text" name="email" placeholder="Email"><br><br>
                    <label>Enter password</label><br>
                    <input type="password" name="password" placeholder="Password"><br><br>
                    <input type="submit" name="send" value="Submit">
                </form>
            </div>
            <div style="position: absolute; top: 100px; left:850px">
                <h4>Registration</h4>
                <form action="/client/registration" method="post">
                    <label>Enter email(login)</label><br>
                    <input type="text" name="email" placeholder="Email"><br><br>
                    <label>Enter password</label><br>
                    <input type="password" name="password1" placeholder="Password"><br><br>
                    <label>Repeat password</label><br>
                    <input type="password" name="password2" placeholder="Repeat password"><br><br>
                    <label>Enter name</label><br>
                    <input type="text" name="name" placeholder="name"><br><br>
                    <label>Enter date of birth</label><br>
                    <input type="date" name="dr" placeholder="date"><br><br>
                    <label>Enter address</label><br>
                    <input type="text" name="address" placeholder="Your address"><br><br>
                    <label>Enter some information about your location</label><br>
                    <textarea name="primechanie" placeholder="Details"></textarea><br><br>
                    <input type="submit" name="send" value="Redistr">
                </form>
            </div>
    </div>
</div>
<?php include(ROOT . "/views/footer.php"); ?>