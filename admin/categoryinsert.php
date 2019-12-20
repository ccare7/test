<?php
$method=$_SERVER['REQUEST_METHOD'];
if($method==='GET'){
    require '../view/admin/categoryinsert.html';
}else{
    $name=$_POST['cname'];
    $csort=$_POST['csort'];
    //连接数据库
    require "../lib/connect.php";
    $insert="insert into category(cname,csort) values('$name','$csort')";
    $result=$mysqli->query($insert);
    if($result){
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

?>