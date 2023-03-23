<div class="banner">
    <div class="header">
        <div class="container">
            <div class="logo">
                <a style="color: white !important;" href="index.php"> <h2 ><?php echo showTitle() ?></h2> </a>
            </div>
            <!---start-top-nav---->
<?php include 'topmenu.php' ;?>
            <div class="clearfix"></div>
            <script>
                $("span.menu").click(function(){
                    $(".top-menu ul").slideToggle("slow" , function(){
                    });
                });
            </script>
            <!---//End-top-nav---->
            </div>
    </div>
    <div class="container">
        <div class="banner-head">
            <h1><?php echo showTitle() ?></h1>
            <h2><?php echo showHead() ?></h2>
        </div>
        <?php include 'category_menu.php' ;?>

    </div>
</div>