<?PHP
//未考虑多值的版本
	header("Content-Type: text/html; charset=utf8");

   if(!isset($_POST["submit"])){
		exit("execution error");
	}

	include('connect.php');
	$text = $_POST['text'];

	if($text){
		echo "成功输入";
		$sql = "select url from particle where name = '".$text."'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		if($rows){
			$url = mysql_result($sql);
			echo "转到自己的文章";
			//header("refresh:0; url=$url");
			exit;
		}else{
			echo "转到植物志文章";
			//header("refresh:1; url=http:www.cfh.ac.cn/Spdb/spsearch.aspx?aname=+$text+&AspxAutoDetectCookieSupport=1");
			exit;
		}
	}else{
		echo "出错";}

?>