<?php
$mysqli=new mysqli('localhost','root','123456','games');
$mysqli->query('set names utf8');
if($mysqli->connect_error){
    echo json_encode([
        'code'=>400,
        'msg'=>"数据库连接失败".$mysqli->connect_error
    ]);
    exit();
};
