<?php
//连接数据苦
require '../lib/connect.php';
$type=$_GET['type'];
switch ($type){
    case 'querys':
        $limit=$_GET['limit'];
        $page=$_GET['page'];
        $offset=($page-1)*$limit;
        //查询所有数据
        $select="select * from address";
        $dataTol=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);
        //查询当前页的数据
        $selectIndex="select * from address limit $offset,$limit";
        $result=$mysqli->query($selectIndex);
        $data=$result->fetch_all(MYSQLI_ASSOC);
        if($result){
            echo json_encode([
                'code'=>0,
                'msg'=>'查询成功',
                'count'=>count($dataTol),
                'data'=>$data
            ]);
        }else{
            echo json_encode([
                'code'=>400,
                'msg'=>'查询失败'.$mysqli->error
            ]);
        }
        break;
    case 'query':
        $aid=$_GET['aid'];
        $queryone="select * from address where aid='$aid'";
        $result=$mysqli->query($queryone);
        $data=$result->fetch_assoc();
        if($result){
            echo json_encode([
                'code'=>200,
                'msg'=>"查询成功",
                'data'=>$data
            ]);
        }else{
            echo json_encode([
                'code'=>400,
                'msg'=>"查询失败".$mysqli->error
            ]);
        }
        break;
    case 'edit':
        $aid=$_POST['aid'];
        $store=$_POST['store'];
        $addr=$_POST['addr'];
        $time1=$_POST['time1'];
        $time2=$_POST['time2'];
        $tel=$_POST['tel'];
        $asort=$_POST['asort'];
        $edit="update address set aid='$aid' ,store='$store' ,addr='$addr' ,time1='$time1' ,time2='$time2' ,tel='$tel',asort='$asort' where aid='$aid'";
        $result=$mysqli->query($edit);
        if($result){
            echo json_encode([
                "code"=>"200",
                "msg"=>"修改成功"
            ]);
        }else{
            echo json_encode([
                "code"=>"400",
                "msg"=>"修改失败".$mysqli->error
            ]);
        }
        break;
    case 'delete':
        $aid=$_GET['aid'];
        $delete="delete from address where aid=$aid";
        $result=$mysqli->query($delete);
        if($result){
            echo json_encode([
                'code'=>200,
                'msg'=>"删除成功"
            ]);
        }else{
            echo json_encode([
                'code'=>400,
                'msg'=>"删除失败".$mysqli->error
            ]);
        }
        break;
}