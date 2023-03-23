<?php     header("Content-Type: text/html; charset=utf-8");
require ('development_mode_control.php') ;
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo showTitle() ; ?></title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!----webfonts
        <link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,300italic,400italic,600italic' rel='stylesheet' type='text/css'>
        <!----//webfonts---->
    <script src="js/jquery.js"></script>		<!--end slider -->
    <!--script-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
            });
        });
    </script>
    <!---->

</head>
<body>
<!---strat-banner---->
<?php include 'banner.php' ;?>

<!---//End-banner---->
<div class="content">
    <div class="container">
        <div class="content-grids">
            <div class="col-md-8 content-main">
                <?php
                $id = $_GET['id'] ;
                $result = $DB->query("SELECT * FROM posts WHERE cat_id ='$id' ORDER BY id DESC");
                foreach ($result as $row) :
                    ?>
                    <div class="content-grid-sec">

                        <div class="content-grid-info">
                            <h3><a href="single.php?id=<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></a></h3>
                            <p><?php echo $row["posttext"]; ?>.</p>
                            <img src="adminpanel/postimages/<?php echo $row["location"]; ?>" alt=""/>
                            <a class="bttn" href="single.php?id=<?php echo $row["id"]; ?>">ДАЛЕЕ</a>
                        </div>
                    </div>

                <?php endforeach; ?>

                <div class="pages">
                    <ul>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">Previous</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
            <?php include "sidebar.php"; ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--fotter-->
<?php include "footer.php"; ?>
<!---fotter/-->

<!---->
<script type="text/javascript">
    $(document).ready(function() {
        /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear'
        };
        */
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


</body>
</html>