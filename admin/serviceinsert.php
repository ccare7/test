<?php
$method=$_SERVER['REQUEST_METHOD'];
require '../lib/connect.php';
if($method==='GET'){
    require '../view/admin/serviceinsert.html';
}else{
    //    var_dump($_POST);
    //连接数据苦

    $sname=$_POST['sname'];
    $content=$_POST['content'];
    $sort=$_POST['sort'];
    $sthumb=$_POST['sthumb'];
    $insert="insert into service(sname,content,sort,sthumb) values ('$sname','$content','$sort','$sthumb')";
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
