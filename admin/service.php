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
        $select="select * from service";
        $dataTol=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);
        //查询当前页的数据
        $selectIndex="select * from service limit $offset,$limit";
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
        $sid=$_GET['sid'];
        $queryone="select * from service where sid='$sid'";
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
//        var_dump($_POST);

        $sid=$_POST['sid'];
//        var_dump($sid);
        $sname=$_POST['sname'];
        $content=$_POST['content'];
        $sort=$_POST['sort'];
        $sthumb=$_POST['sthumb'];
        $edit="update service set sname='$sname' ,content='$content' ,sort='$sort' ,sthumb='$sthumb' where sid='$sid'";
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
        $sid=$_GET['sid'];
        $delete="delete from service where sid=$sid";
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