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
                 if (isset($_GET['page']))
                 {
                    $page = $_GET['page'];
                 }
                 else{
                    $page = 1;
                 }
                 $limit = 3;
                 $offset = ($page-1)*$limit;
                 $select_stmt =$conn->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT ?,?");
                 $select_stmt->bindValue(1,$offset, PDO::PARAM_INT);
                 $select_stmt->bindValue(2,$limit, PDO::PARAM_INT);
                 $select_stmt->execute();
                 while ($row=$select_stmt->fetch(PDO::FETCH_ASSOC)) {

                 ?>
				 <div class="content-grid-sec">

					 <div class="content-grid-info">
						 <h3><a href="single.php?id=<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></a></h3>
						 <p><?php echo $row["posttext"]; ?>.</p>
						 <img src="adminpanel/<?php echo $row["location"]; ?>" alt=""/>
						 <a class="bttn" href="single.php?id=<?php echo $row["id"]; ?>">ДАЛЕЕ</a>
					</div>
				 </div>
                 <?php }; ?>

				 <div class="pages">
                     <?php
                        $select_stmt=$conn->query("SELECT * FROM posts");
                        $select_stmt->execute();
                        $total_records =$select_stmt->fetchAll(PDO::FETCH_ASSOC);
                        if ($select_stmt->rowCount() > 0)
                        {
                            $total_page = ceil(count($total_records)/$limit);
                            echo "<ul class='pagination'>";
                            if ($page>1)
                            {
                                echo '<li><a href="index.php?page='.($page-1).'">Предыдущий</a></li>' ;
                            }
                            for ($i=1; $i<=$total_page; $i++)
                            {
                                if ($i == $page){
                                    $active = "active";
                                }else{
                                    $active= "";
                                }
                                echo '<li class="page-item '.$active.'">
                                <a class="page-link" href="index.php?page='.$i.'">'.$i.'</a>
                                </li>';
                            }
                            if ($total_page>$page) {
                                echo ' <li><a href="index.php?page='.($page+1).'">Следующий пост</a></li>';
                            }
                            echo ' </ul>';
                        }
                     ?>
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