<?php
require ('development_mode_control.php') ;


$result = $DB->query("SELECT * FROM footer_icons");?>
<div class="col-md-4 fotter-media">
    <h3>FOLLOW US ON....</h3>
<div class="social-icons">
    <?php foreach ($result as $row): ?>
        <a href="<?php echo $row['icon_href']?>">
            <span class="<?php echo $row['icon_class']?>"></span>
        </a>
<?php endforeach;?>
</div>
</div>
<div class="clearfix"></div>