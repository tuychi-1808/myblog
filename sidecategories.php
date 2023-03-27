<?php
require ('development_mode_control.php') ;

$result = $DB->query("SELECT * FROM sidecategories");
?>
<div class="categories">
    <?php foreach ($result as $row): ?>
    <h3><?php echo $row['title']; ?></h3>
    <li class="active"><a href="#"><?php echo $row['theme']; ?></a></li>
    <?php endforeach;?>
</div>
