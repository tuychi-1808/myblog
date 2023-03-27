<?php  header('Content-Type: text:html; charset=utf-8');
date_default_timezone_set('Europe/Moscow');
session_start();
if (!isset($_SESSION['session_username']))
{
    echo '<script>window.location.href = "login.php"</script>';
    //header('location:login.php');
}
require ('../development_mode_control.php');




$id = $_GET['id'];
$url = $_GET['url'];
$dbname = $_GET['dbname'];
$row = $_GET['row'];

$DB->query("DELETE FROM {$dbname} WHERE {$row} = ?", array("$id"));

header('location:' . $url);

?>
