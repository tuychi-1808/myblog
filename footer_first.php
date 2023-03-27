<?php
require ('development_mode_control.php') ;

 $result = $DB->query("SELECT * FROM footer_firsttitle");?>
<div class="col-md-4 fotter-info">
        <?php foreach ($result as $row): ?>
            <h3><?php echo $row['title'];?></h3>
            <p><?php echo $row['text'];?></p>
<?php endforeach;?>
</div>

