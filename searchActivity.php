<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("错误执行");
    }//判断是否有submit操作


    $comment=$_POST['comment'];//post获取表单里的comment

    
    

    
    
    include('connect.php');//链接数据库
    $q="insert into coment(id,username,comment) values (null,'yuan','$comment')";//向数据库插入表单传来的值的sql
    $reslut=mysql_query($q,$con);//执行sql
    
    if (!$reslut){
        die('Error: ' . mysql_error());//如果sql执行失败输出错误
    }else{
        
        echo "回复成功！等待审核";
        header("refresh:1;url=comment.php");//成功输出注册成功
    }

    

    mysql_close($con);

?>