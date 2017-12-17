<body style="background-image:url(img/hqcbg.jpg)">
<?php
header("Content-Type: text/html; charset=utf8");
require("connect.php"); 
?>



<table  align="center" border="0.1" cellpadding="10" cellspacing="10" >
<tr>
<th>描述</th>
<th>图片</th>
<th>帮鉴定</th>
</tr>

<?php
$perNumber=6;
$page=@$_GET['page']?$_GET['page']:1;
$count=mysql_query("select count(*) from question");
$rsp=mysql_fetch_array($count);
$totalNumber=$rsp[0];
$totalPage=ceil($totalNumber/$perNumber);
if(!isset($page)){
	$page=1;//没赋值则赋值1
}

$startCount=($page-1)*$perNumber;//分页

$sql="select * from question order by id desc limit {$startCount},{$perNumber}";//分页
$result=mysql_query($sql);
 
while($rs=mysql_fetch_array($result)){
?>


<tr>
<td> <?php echo $rs["description"];?> </td>
<td> <?php
 echo ("<img src=\"{$rs["file_loc"]}\" width=\"120\"height=\"100\">");
 ?></td>
 <td> <a href="detail.html" target="_blank"> 回复</a> </td>
</tr>


<?php
}
?>
</table>

<?php

$prepage=$page-1;
echo "<a href='answer.php? page={$prepage}'>上一页</a>";
$nextpage=$page+1;
echo " 
<a href='answer.php?page={$nextpage}'>下一页</a>";
?>
</body>