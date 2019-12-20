<?php
$method=$_SERVER['REQUEST_METHOD'];
if($method==='GET'){
    require'../view/admin/navinsert.html';
}else{
    $name=$_POST['name'];
    $nsort=$_POST['nsort'];
    $tmp=$_POST['tmp'];
    $nthumb=$_POST['nthumb'];
    //连接数据库
    require "../lib/connect.php";
    //插入数据
    $insert="insert into nav(name,tmp,nsort,nthumb) values ('$name','$tmp','$nsort','$nthumb')";
    $result=$mysqli->query($insert);
    if($mysqli->affected_rows>0){
        echo json_encode([
           'code'=>200,
           'msg'=>'插入成功'
        ]);
    }else{
        echo json_encode([
            'code'=>400,
            'msg'=>'插入失败'.$mysqli->error
        ]);
    }
}


