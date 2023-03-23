<div class="banner-links">
    <ul>
        <?php
        $result = $DB->query("SELECT id, catname FROM categories ");
        foreach ($result as $row) :
        ?>
        <li><a href="categoriespost.php?id=<?php echo $row["id"]; ?>"><?php echo $row["catname"]; ?></a></li>
        <?php endforeach; ?>
        <div class="clearfix"></div>
    </ul>
</div>