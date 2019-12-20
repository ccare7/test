<?php
require '../lib/connect.php';
$type=$_GET['type'];
switch ($type){
    case 'querys'://查询渲染所有数据
//        var_dump($_GET);
        $limit=$_GET['limit'];
        $page=$_GET['page'];
        $offset=($page-1)*$limit;
//        //查询所有数据
        $select="select * from banner";
        $dataTol=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);

//        //查询当前页的数据
//        $selectIndex="select * from goods limit $offset,$limit";需要多表联合查询
        $selectIndex="select * from banner order by bsort asc limit $offset,$limit";
        $result=$mysqli->query($selectIndex);
        $data=$result->fetch_all(MYSQLI_ASSOC);
//        var_dump($result);
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
    //删除数据
    case 'delete':
        $bid=$_GET['bid'];
        $delete="delete from banner where bid=$bid";
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
    //点击弹出层渲染数据
    case 'query':
        $bid=$_GET['bid'];
        $queryone="select * from banner where bid='$bid'";
        $result=$mysqli->query($queryone);
        $data=$result->fetch_assoc();
//        var_dump($data);
        if($result){
            echo json_encode([
                'code'=>200,
                'msg'=>"查询成功",
                'data'=>$data
            ]);
        }else{
            echo json_encode([
                'code'=>400,
                'msg'=>"查询失败",
            ]);
        }
        break;
    case 'edit':
//        var_dump($_POST);
        $bid=$_POST['bid'];
        $bthumb=$_POST['bthumb'];
        $bsort=$_POST['bsort'];
        $edit="update banner set bthumb='$bthumb',bsort='$bsort' where bid='$bid'";
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
}