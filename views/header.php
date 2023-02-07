
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:">Dashboard</a>
                <form action="/search/0" method="post">
                    <input type="text" name="search" placeholder="Item to search">
                    <input type="submit" name="send" value="Search">
                </form>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/client/showForm/LogIn">
                            <i class="material-icons">Log In</i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/registration/editProfile/<?=$_SESSION['userId']?>">
                            <i class="material-icons">Edit profile</i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/basket/">
                            <a href="/basket/show"> <img title="basket" width="80px" src="/templates/img/basket.png"> </a> <?php if(!empty($_SESSION['overAllOrders'])) { ?> <span><?=$_SESSION['overAllOrders']?></span> <?php } else { ?> <span>0</span> <?php } ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/client/exit">
                            <i class="material-icons">eXit</i>
                        </a>
                    </li>
                    <!-- your navbar here -->
                </ul>
            </div>
        </div>
    </nav>