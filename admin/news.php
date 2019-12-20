<?php
require '../lib/connect.php';
$type=$_GET['type'];
switch ($type){
    case 'querys':
        $limit=$_GET['limit'];
        $page=$_GET['page'];
        $offset=($page-1)*$limit;
        //查询所有数据
        $select="select * from news";
        $dataTol=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);
        //查询当前页的数据
        $selectIndex="select * from news limit $offset,$limit";
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
        $nid=$_GET['nid'];
        $queryone="select * from news where nid='$nid'";
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
        $nid=$_POST['nid'];
        $ntitle=$_POST['ntitle'];
        $content=$_POST['content'];
        $create_time=$_POST['create_time'];
        $update_time = date('Y-m-d H:i:s');
        $nsort=$_POST['nsort'];
        $edit="update news set nid='$nid' ,ntitle='$ntitle' ,content='$content' ,create_time='$create_time' ,update_time='$update_time' ,nsort='$nsort' where nid='$nid'";
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
        $nid=$_GET['nid'];
        $delete="delete from news  where nid=$nid";
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