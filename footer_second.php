<?php
require ('development_mode_control.php') ;

    $result = $DB->query("SELECT * FROM footer_secondtitle");?>
<div class="col-md-4 fotter-list">
         <?php foreach ($result as $row): ?>
        <h3><?php echo $row['article']?></h3>
            <ul>
                <li><a href=""><?php echo $row['title']?></a></li>
            </ul>
<?php endforeach;?>
</div>
