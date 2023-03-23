<?php
header('Content-Type: text:html; charset=utf-8');
date_default_timezone_set('Europe/Moscow');
session_start();
if (!isset($_SESSION['session_username']))
{
    header('location:login.php');
}
require ('../development_mode_control.php');


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dastyle - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/jquery-ui.min.css" rel="stylesheet">
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="dark-sidenav">
        <!-- Left Sidenav -->
    <?php include "adminmenu.php";?>

        <!-- end left-sidenav-->
        <section class="container-fluid">
            <div class="page-wrapper">
        <!-- Top Bar Start -->
                <div class="topbar">
            <!-- Navbar -->
            <nav class="navbar-custom">
                <ul class="list-unstyled topbar-nav float-right mb-0">
                    <li class="dropdown hide-phone">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i data-feather="search" class="topbar-icon"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-lg p-0">
                            <!-- Top Search Bar -->
                            <div class="app-search-topbar">
                                <form action="#" method="get">
                                    <input type="search" name="search" class="from-control top-search mb-0" placeholder="Type text...">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="image/admin-avatar.png" alt="profile-user" class="rounded-circle" />
                            <span class="ml-1 nav-user-name hidden-sm"><?php echo $_SESSION['session_id'];?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <a class="dropdown-item" href="#"><i data-feather="user" class="align-self-center icon-xs icon-dual mr-1"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i data-feather="settings" class="align-self-center icon-xs icon-dual mr-1"></i> Settings</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="logaut.php"><i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i> Logout</a>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <button class="nav-link button-menu-mobile">
                            <i data-feather="menu" class="align-self-center topbar-icon"></i>
                        </button>
                    </li>

                </ul>
            </nav>
            <!-- end navbar-->
        </div>
                <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <h2>Управление постами</h2>

                </div><!--end card-header-->
            </div><!--end card-->
        </div> <!-- end col -->

                <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <h4>Внести изменение категориям</h4>

                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark mb-0">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Название</th>
                                <th>Действия</th>
                                <th>
                                    <a href="insert_category.php"><<button type="button" class="btn btn-outline-success">Добавить</button></a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $result = $DB->query("SELECT * FROM categories");
                            foreach ($result as $row):
                                ?>
                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['catname']?></td>
                                    <td>
                                        <a href="edit_category.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-outline-primary">Редактировать</button></a>
                                        <a href="delete.php?id=<?php echo $row['id']?>&dbname=categories&url=index.php&row=id"><<button type="button" class="btn btn-outline-danger">Удалить</button></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->
                <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <h4>Внести изменение постам</h4>

                </div><!--end card-header-->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark mb-6">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Категория</th>
                                <th>Темы</th>
                                <th>Текст под темой</th>
                                <th>Фото</th>
                                <th>Автор</th>
                                <th>Дата публикации</th>
                                <th>Дата изменение</th>
                                <th>Действия </th>
                                <th>
                                    <a href="insert_posts.php"><<button type="button" class="btn btn-outline-success">Добавить</button></a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php //
                            $result = $DB->query("SELECT p.*, ct.id as ctid, ct.catname as catname FROM posts AS p LEFT JOIN categories AS ct ON p.cat_id=ct.id");
                            foreach ($result as $row):
                                ?>
                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['catname']?></td>
                                    <td><?php echo $row['title']?></td>
                                    <td style=""><?php echo $row['posttext']?></td>
                                    <td>
                                        <img src="<?php echo $row["location"];?>" width="50px" height="50px"
                                             onerror="this.onerror=null;this.src='postimages/nophoto.png';">
                                    </td>
                                    <td><?php echo $row['author']?></td>
                                    <td><?php echo $row['postdate']?></td>
                                    <td><?php echo $row['editdate']?></td>
                                    <td>
                                        <a href="edit_posts.php?image=<?php echo $row['location'];?>&id=<?php echo $row['id'];?>"><button type="button" class="btn btn-outline-primary">Редактировать</button></a>
                                        <a href="delete.php?id=<?php echo $row['id']?>&dbname=posts&secdbname=categories&url=index.php&row=id"><button type="button" class="btn btn-outline-danger">Удалить</button></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
                </div><!--end card-body-->
            </div><!--end card-->
        </div>
        <!-- end page content -->
        <!-- end page-wrapper -->
</section>


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>

    <script src="../plugins/apex-charts/apexcharts.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="assets/pages/jquery.analytics_dashboard.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    </body>

</html>