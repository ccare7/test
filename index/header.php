<?php

require_once '../lib/connect.php';
$query="select * from nav order by nsort limit 5";
$nav=$mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
require '../view/index/header.html';