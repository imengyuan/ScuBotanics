<body style="background-image:url(img/hqcbg.jpg)">
<?php
header("Content-Type: text/html; charset=utf8");
require("connect.php"); 
?>


<table align="center">
<td ><img src=upload/demo.jpg></td>
</table>
<table  align="center" border="0.1" cellpadding="10" cellspacing="10" >

<tr>
<th>用户</th>
<th>回复</th>
</tr>

<?php

$sql="select * from coment order by id desc ";//分页
$result=mysql_query($sql);
 
while($rs=mysql_fetch_array($result)){
?>


<tr>
<td> <?php echo $rs["username"];?> </td>
<td> <?php echo $rs["comment"];?> </td>

</tr>


<?php
}
?>
</table>
</body>