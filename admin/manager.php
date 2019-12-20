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
        $select="select * from manager";
        $dataTol=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);
        //查询当前页的数据
        $selectIndex="select * from manager limit $offset,$limit";
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
        $id=$_GET['id'];
        $queryone="select * from manager where id='$id'";
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
        $id=$_POST['id'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $head_img=$_POST['head_img'];
        $edit="update manager set id='$id' ,username='$username' ,password='$password' ,head_img='$head_img' where id='$id'";
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
        $id=$_GET['id'];
        $delete="delete from manager where id=$id";
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