<?php
$method=$_SERVER['REQUEST_METHOD'];
if($method==='GET'){
    require '../view/admin/bannerinsert.html';
}else{
//    var_dump($_POST);
    //连接数据苦
    require '../lib/connect.php';
    $bthumb=$_POST['bthumb'];
    $bsort=$_POST['bsort'];
    $insert="insert into banner(bthumb,bsort) values ('$bthumb','$bsort')";
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