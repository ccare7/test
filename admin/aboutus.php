<?php
    $method=$_SERVER['REQUEST_METHOD'];
    require '../lib/connect.php';
    if($method==='GET'){
        $id=$_GET['id'];
        $sel="select * from aboutus where cid=1";
        $result=$mysqli->query($sel);
        if($result){
            $data = $result->fetch_assoc();
            echo json_encode([
                'code'=>200,
                'msg'=>'查询成功',
                'content'=>$data['content']
            ]);
        }else{
            echo json_encode([
                'code'=>400,
                'msg'=>'查询失败'.$mysqli->error
            ]);
        }
    }else{
        $content=$_POST['content'];
        $sel2="update aboutus set content='$content' where cid=1";
        $data2=$mysqli->query($sel2);
        if($data2){
            echo json_encode([
                'code'=>200,
                'msg'=>'修改成功'.$mysqli->error
            ]);
        }else{
            echo json_encode([
                'code'=>400,
                'msg'=>'修改失败'.$mysqli->error
            ]);
        }

    }

?>