<?php
require ('development_mode_control.php') ;

 $result = $DB->query("SELECT * FROM footer_first_h");?>
<div class="col-md-4 fotter-info">
        <?php foreach ($result as $row): ?>
            <h3><?php echo $row['title'];?></h3>
        <?php endforeach;?>
    <?php $result = $DB->query("SELECT * FROM footer_firsttitle");
       foreach ($result as $row): ?>
            <p><?php echo $row['text'];?></p>
    <?php endforeach;?>
</div>

