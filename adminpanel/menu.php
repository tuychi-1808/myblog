<?php


if (userLevel()==1)
{
    include 'adminmenu.php';
}
elseif (userLevel()==2)
{
    include 'modmenu.php';
}
elseif (userLevel()==3)
{
    include 'usermenu.php';
}
