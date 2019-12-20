<?php
require '../lib/connect.php';
$query="select * from address";
$addr=$mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
//var_dump($addr);
require "../view/index/footer.html";