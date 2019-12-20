<?php
    session_start();
    if(!isset($_SESSION['id']) || !isset($_SESSION['username'])){
        header("Location:login.php");
    }
    $id=$_SESSION['id'];
    require "../lib/connect.php";

    $res=$mysqli->query("select * from manager where id='$id'")->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统</title>
    <link rel="stylesheet" href="../static/admin/css/navinsert.css">
    <link rel="stylesheet" href="../static/layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">后台管理</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="../<?php echo $res['head_img']?>" class="layui-nav-img">
                    <?php echo $res['username']?>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">导航栏管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="navinsert.php"  target="content">导航添加</a></dd>
                        <dd><a href="navselect.php" target="content">导航查询</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">管理员</a>
                    <dl class="layui-nav-child">
                        <dd><a href="managerinsert.php"  target="content">管理员添加</a></dd>
                        <dd><a href="managerselect.php" target="content">管理员信息修改</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">产品分类管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="categoryinsert.php"  target="content">产品分类添加</a></dd>
                        <dd><a href="categoryselect.php" target="content">产品分类查询</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">产品详情管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="goodsinsert.php"  target="content">产品详情添加</a></dd>
                        <dd><a href="goodsselect.php" target="content">产品详情查询</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">轮播图管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="bannerinsert.php"  target="content">轮播图添加</a></dd>
                        <dd><a href="bannerselect.php" target="content">轮播图查询</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">团队管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="teaminsert.php"  target="content">团队人员添加</a></dd>
                        <dd><a href="teamselect.php" target="content">团队人员查询</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">新闻资讯</a>
                    <dl class="layui-nav-child">
                        <dd><a href="newsinsert.php"  target="content">新闻资讯添加</a></dd>
                        <dd><a href="newsselect.php" target="content">新闻资讯管理</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">服务项目</a>
                    <dl class="layui-nav-child">
                        <dd><a href="serviceinsert.php"  target="content">服务项目添加</a></dd>
                        <dd><a href="serviceselect.php" target="content">服务项目管理</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">关于我们</a>
                    <dl class="layui-nav-child">
                        <dd><a href="aboutusinsert.php"  target="content">关于我们添加</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">门店地址管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="addressinsert.php"  target="content">门店地址添加</a></dd>
                        <dd><a href="addressselect.php" target="content">门店地址修改</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">在线预约</a>
                    <dl class="layui-nav-child">
                        <dd><a href="onlineselect.php" target="content">预约查看</a></dd>
<!--                        <dd><a href="addressselect.php" target="content">门店地址修改</a></dd>-->
                    </dl>
                </li>


            </ul>
        </div>
    </div>

    <div class="layui-body" >
        <!-- 内容主体区域 -->
            <iframe src="navinsert.php" frameborder="0" name="content"></iframe>
    <!--<iframe src="navselect.php" frameborder="0" name="content"></iframe>-->
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        Love this Left
    </div>
</div>
<script src="../static/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
</script>
</body>
</html>