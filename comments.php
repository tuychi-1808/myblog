<div class="content-form">
    <h3>Напишите что ни будь</h3>
    <form>
        <input type="text" placeholder="Имя" required/>
        <input type="text" placeholder="E-mail" required/>
        <textarea placeholder="Комментарий"></textarea>
        <input type="submit" value="Отправить"/>
    </form>
</div>
<div class="comments">
    <h3>Последние комментарии</h3>
    <div class="comment-grid">
        <?php $id=$_GET['id'] ;
        $result = $DB->query("SELECT * FROM comments WHERE id='$id'");
        foreach ($result as $row) :
        ?>
        <img src="<?php echo $row["location"]; ?>" alt=""/>
        <div class="comment-info">
            <h4><?php echo $row["name"]; ?></h4>
            <p>
                <?php echo $row["commenttext"]; ?>            </p>
            <h5><?php echo $row["addate"]; ?></h5>
            <a href="#">Ответить</a>
        </div>

        <div class="clearfix"></div>
        <?php endforeach; ?>
    </div>



</div>