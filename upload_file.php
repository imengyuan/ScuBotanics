<?php
	header("Content-Type: text/html; charset=utf8");
	$a=0;$b=0;
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	echo $_FILES["file"]["size"];
	$extension = end($temp);     // 获取文件后缀名
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/JPG")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 60000)   // 小于 200 kb
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0)
		{
		echo "错误：: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{
		//echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
		//echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
		//echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		//echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
		
		// 判断当期目录下的 upload 目录是否存在该文件
		// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
			if (file_exists("upload/" . $_FILES["file"]["name"]))
			{
				echo $_FILES["file"]["name"] . " 文件已经存在。 ";
			}
			else
			{
			// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
				move_uploaded_file($_FILES["file"]["tmp_name"], "upload/"  .mb_convert_encoding($_FILES["file"]["name"],"gbk", "utf-8"));
				echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
				$a=1;
			}
		}
	}
	else
	{
		echo "非法的文件格式";
	}

    include('connect.php');//链接数据库
	$description=$_POST['description'];
    $file_loc="upload/" . $_FILES["file"]["name"];
    $username="yuan";


    $q="insert into question(id,username,description,file_loc) values (null,'$username','$description','$file_loc')";//向数据库插入表单传来的值的sql并执行
    $reslut=mysql_query($q,$con);
    
    if (!$reslut){
        die('Error: ' . mysql_error());//如果sql执行失败输出错误
    }else{
        echo  "插入数据库成功";
        $b=1;
    }

    if($a==1 && $b==1)
    	header("refresh:0;url=answer.php");

    

    mysql_close($con);//关闭数据库
    
    
	?>