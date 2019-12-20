<?php
    //echo 1;
    $file=$_FILES['file'];
//    var_dump($file);
    $uploadPath="../upload";
    if(!is_dir($uploadPath)){
        mkdir($uploadPath);
    }
    //设置日期目录
    $datePath=$uploadPath."/".date('Ymd');
    if(!is_dir($datePath)){
        mkdir($datePath);
    }
    //设值文件名称
    $imgName=time().mt_rand(0,9999);
    $ext=explode('/',$file['type'])[1];

    $result=move_uploaded_file($file['tmp_name'],$datePath."/".$imgName.".".$ext);
    if ($result){
        echo json_encode([
            "code"=>200,
            "msg"=>"上传成功",
            "data"=>'/upload/'.date('Ymd')."/".$imgName.".".$ext
        ]);
    }else{
        echo json_encode([
            "code"=>400,
            "msg"=>"上传失败",
        ]);
    }