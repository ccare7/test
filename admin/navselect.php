<?php

    require '../lib/connect.php';
    $mysqli->query('set names utf-8');
    $select="select * from nav";
    $result=$mysqli->query($select);
    $data = $result->fetch_all(MYSQLI_ASSOC);
//    var_dump($data);
    require '../view/admin/navselect.html';
?>