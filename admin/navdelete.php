<?php
$nid=$_GET['nid'];
require '../lib/connect.php';
$delete = "delete from nav where nid= '$nid'";
$result = $mysqli->query($delete);
if($result){
   echo json_encode([
       'code'=>200,
       'msg'=>'删除成功'
   ]);
}else{
    echo json_encode([
        'code'=>200,
        'msg'=>'删除失败'.$mysqli->error
    ]);
}