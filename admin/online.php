<?php
//连接数据苦
    require '../lib/connect.php';
    $mysqli->query('set names utf-8');
    $select="select online.*,service.sname from online,service where online.sid=service.sid";
    $result= $mysqli->query($select);
    $data=$result->fetch_all(MYSQLI_ASSOC);
    if($result){
        echo json_encode([
            'code'=>0,
            'data'=>$data
        ]);
    }else{
        echo json_encode([
            'code'=>400,
            'msg'=>'查询失败'.$mysqli->error
        ]);
    }