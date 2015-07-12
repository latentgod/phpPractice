<?php 
session_start();
include_once './conn/connect.php';
//include_once './todayPaging.php';
$sql = "SELECT * FROM `content` WHERE DATEDIFF(create_at,NOW()) =0 order by id desc";
$result = mysql_query($sql,$con);
;?>
<div class="main-right">
	<div class = "createTheme"><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/homework/createTheme.php'?>" onclick = "return checkLogin(<?php echo("$_SESSION[username]")?>) ">发帖</a></div>
<hr>
<div>
<p style="font-size:14px;color:#CCC9C1;border-bottom:1px soild #CCC9C1;text-align:center">今日帖子</p>
<?php  
//$i =0;
while($row = mysql_fetch_array($result, MYSQL_NUM)){
   echo " <div class=\"today\"><a href=\"../comment/show.php?id=$row[0]\" >$row[1]</a></div>";
 //  ++$i;
   //if($i==10){
     //   break;
   //}
   // tpaging($PHP_SELF,$sql,$con,2);
}

mysql_free_result($result);
?>
</div>

<div>
<p style="font-size:14px;color:#CCC9C1;border-bottom:1px soild #CCC9C1;text-align:center">友情链接</p>
<table width="198px" class="friend">
    <tr>
        <td width="99px"><a target="_blank" href ="https://v2ex.com/">v2ex</a></td>
        <td><a target="_blank" href ="http://segmentfault.com/">segmentfault</a></td>
    </tr>
    <tr>
        <td width="99px"><a target="_blank" href ="https://phphub.org/">phphub</a></td>
        <td><a target="_blank" href ="http://www.w3school.com.cn/">W3CShool</a></td>
    </tr>
    <tr>
        <td width="99px"><a target="_blank" href ="http://php.net/manual/zh/">php中文手册</a></td>
        <td><a target="_blank" href ="http://www.imooc.com/">慕课网</a></td>
    </tr>
    <tr>
        <td width="99px"><a target="_blank" href ="http://www.wooyun.org/">乌云</a></td>
        <td><a target="_blank" href ="http://www.freebuf.com/">freebuf</a></td>
    </tr>
</table>

</div>

</div>
