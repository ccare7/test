<?php
//连接数据库
    require '../lib/connect.php';
    $type=$_GET['type'];
    switch ($type){
        case 'querys'://查询所有数据渲染到表格
            $limit=$_GET['limit'];
            $page=$_GET['page'];
            $offset=($page-1)*$limit;
            //查询所有数据
            $select="select * from category";
            $dataTol=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);
//        echo $data;
            //查询当前页的数据
            $selectIndex="select * from category order by csort asc limit $offset,$limit";
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
            $cid=$_GET['cid'];
            $queryone="select * from category where cid='$cid'";
            $result=$mysqli->query($queryone);
            $data=$result->fetch_assoc();
//    var_dump($data);
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
            $cid=$_POST['cid'];
            $cname=$_POST['cname'];
            $csort=$_POST['csort'];
            $update="update category set cname ='$cname',csort='$csort' where cid=$cid";
            $result=$mysqli->query($update);
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
        case'delete':
            $cid=$_GET['cid'];
            $delete="delete from category where cid=$cid";
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
        case 'sorts':

            $cid=$_GET['cid'];
            $val=$_GET['val'];
            //修改
            $update="update category set csort='$val' where cid=$cid";
            $result=$mysqli->query($update);
            if ($result){
                echo json_encode([
                    "code"=>200,
                    "msg"=>"排序修改成功"
                ]);
            }else{
                echo json_encode([
                    "code"=>400,
                    "msg"=>"排序修改失败".$mysqli->error
                ]);
            }
            break;
    }


