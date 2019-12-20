<?php
$method=$_SERVER['REQUEST_METHOD'];
if($method=='GET'){
    require '../view/admin/newsinsert.html';

}else{
    require '../lib/connect.php';
    $ntitle=$_POST['ntitle'];
    $content=$_POST['content'];
    $nsort=$_POST['nsort'];
    date_default_timezone_set(PRC);
    $create_time = date('Y-m-d H:i:s');
    $update_time = date('Y-m-d H:i:s');
    $insert="insert into news(ntitle,content,nsort,create_time,update_time) values('$ntitle','$content','$nsort','$create_time','$update_time')";
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