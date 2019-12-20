<?php
$method=$_SERVER['REQUEST_METHOD'];
if($method==='GET'){
    require '../view/admin/addressinsert.html';
}else{
//    var_dump($_POST);
    //连接数据苦
    require '../lib/connect.php';
    $store=$_POST['store'];
    $addr=$_POST['addr'];
    $tel=$_POST['tel'];
    $time1=$_POST['time1'];
    $time2=$_POST['time2'];
    $asort=$_POST['asort'];
    $insert="insert into address(store,addr,tel,time1,time2,asort) values ('$store','$addr','$tel','$time1','$time2','$asort')";
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