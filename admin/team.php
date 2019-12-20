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
        $select="select * from team";
        $dataTol=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);
        //查询当前页的数据
    $selectIndex="select * from team limit $offset,$limit";
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
        //查询一条数据并渲染
    case 'query':
        $tid=$_GET['tid'];
        $queryone="select * from team where tid='$tid'";
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
        //提交表单，修改数据
    case 'edit':
        $tid=$_POST['tid'];
        $tname=$_POST['tname'];
        $position=$_POST['position'];
        $head_img=$_POST['head_img'];
        $edit="update team set tname='$tname' ,position='$position' ,head_img='$head_img' where tid='$tid'";
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
        $tid=$_GET['tid'];
        $delete="delete from team where tid=$tid";
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