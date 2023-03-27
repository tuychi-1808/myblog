<?php
date_default_timezone_set('Europe/Moscow');
?>
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="" class="logo">
            <h3 style="color: white; margin: 20px;">Блог</h3>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0"><?php echo  $_SESSION['session_username'];?></li>
            <li>
                <a href="index.php"> <i data-feather="home" class="align-self-center menu-icon">
                    </i>
                    <span>Главная страница</span>
                </a>
            </li>
            <hr class="hr-dashed hr-menu">
            <li>
                <a href="category.php">
                    <span>Внести изменение категориям</span>
                </a>
            </li>
            <li>
                <a href="posts.php">
                    <span>Внести изменение постам</span>
                </a>
            </li>
            <li>
                <a href="footer_firsttitle.php">
                    <span> Внести изменение footerfirst</span>
                </a>
            </li>
            <li>
                <a href="footer_secondtitle.php">
                    <span> Внести изменение footersecond</span>
                </a>
            </li>
            <li>
                <a href="footer_icons.php">
                    <span> Внести изменение footericons</span>
                </a>
            </li>
        </ul>
    </div>

    <footer class="footer text-center text-sm-left">
        &copy;<?php echo date("Y-m-d") ;?> <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
    </footer>
</div>
