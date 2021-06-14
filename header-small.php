<!--Page Title-->
<section class="page-title text-center" style="background-image:url(images/background/3.jpg);">
    <div class="container">
        <div class="title-text">
            <?php if($_SESSION['login']==1) : ?>
            <h1>Log in</h1>
            <ul class="title-menu clearfix">
                <li>
                    <a href="index.php">home &nbsp;/</a>
                </li>
                <li>Log in</li>
            </ul>
            <?php elseif($_SESSION['profile']==1) : ?>
            <h1>Profile</h1>
            <ul class="title-menu clearfix">
            <li>
                <a href="index.php">home &nbsp;/</a>
            </li>
            <li>Profile</li>
            </ul>
            <?php elseif($_SESSION['donate']==1) : ?>
            <h1>Donate</h1>
            <ul class="title-menu clearfix">
            <li>
                <a href="index.php">home &nbsp;/</a>
            </li>
            <li>Donate</li>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--End Page Title-->