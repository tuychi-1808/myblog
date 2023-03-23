<?php
session_start();
header("Content-Type: text/html; charset-=utf-8");
require('../cndata/cnct.php');
require ('../main_classes.php');
error_reporting(E_ALL);
ini_set('display_errors',1);

if (isset($_POST['save'])){
    if (empty($_POST['username']) || empty($_POST['password']))
    {
        $message = "<label>Запольните все поля!!!</label>";
    }
    else{
        $query ="SELECT * FROM blog_usertbl WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->execute(
            array(
                'username' =>clean($_POST['username']),
                'password'=>sha1($_POST['password'])
            )
        );
        $count = $stmt->rowCount();
        if ($count > 0)
        {
            $_SESSION['session_username'] = $_POST['username'];
            $username = $_POST['username'];
            $sessionIdQuery = $conn->prepare("SELECT full_name FROM blog_usertbl WHERE username = :username");
            $sessionIdQuery->execute(array('username'=>$username));
            foreach ($sessionIdQuery as $row):
                $clientId = $row['full_name'];
            endforeach;
            $_SESSION['session_id'] = $clientId;
            header( "location:index.php");
        }else{
            $message = "<label>Неправильный парол или логин!!!</label>";
        }
    }
}


?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<header style="height: 100vh" class="d-flex justify-content-center align-items-center h-200 w-100">
    <div>
        <div class="head w-100 d-flex justify-content-center">
            <nav class=" w-100 d-flex justify-content-center">
                <h1 class="d-flex">
                    Вход в наш магазин
                </h1>
            </nav>
        </div>
        <div class="card w-100 justify-content-center align-items-center d-flex "">
        <?php
        if (isset($message))
        {
            echo '<label class="text-danger">' . $message . '</label>';
        }
        ?>
        <form method="post" class="w-100 justify-content-center form-control align-items-center flex-column r">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Логин</label>
                <input type="text" name="username"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" name="save" class="btn btn-primary w-100">Войти</button>
            </div>

        </form>
    </div>
    </div>
</header>

<main>

</main>

<footer>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>