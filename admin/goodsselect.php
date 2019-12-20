<?php
require '../lib/connect.php';
$category=$mysqli->query("select * from category");
$categorydata=$category->fetch_all(MYSQLI_ASSOC);
//var_dump($categorydata);
    require '../view/admin/goodsselect.html';