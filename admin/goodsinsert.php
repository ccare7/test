<?php
    require '../lib/connect.php';
    $method=$_SERVER['REQUEST_METHOD'];
    //查询cid并渲染
if($method=='GET'){
    $sel="select * from category";
    $category=$mysqli->query($sel)->fetch_all(MYSQLI_ASSOC);
    require '../view/admin/goodsinsert.html';
}else{
//    var_dump($_POST);
    $cid=$_POST['cid'];
    $gname=$_POST['gname'];
    $original_price=$_POST['original_price'];
    $gthumb=$_POST['gthumb'];
//    $file=$_POST['file'];
    $status=$_POST['status'];
    $gbanner=$_POST['gbanner'];
    $discoun_price=$_POST['discoun_price'];
    $stock=$_POST['stock'];
    $content=$_POST['content'];
    $create_time = date('Y-m-d H:i:s');
    $update_time = date('Y-m-d H:i:s');

    $insert="insert into goods(cid,gname,gthumb,status,gbanner,original_price,discoun_price,stock,content,create_time,update_time) values ('$cid','$gname','$gthumb','$status','$gbanner','$original_price','$discoun_price','$stock','$content','$create_time','$update_time')";
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
