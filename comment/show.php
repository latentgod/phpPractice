<?php  
session_start();
include_once '../layout/header.php';
include_once '../conn/connect.php';
include_once '../commentPage.php';
$id = $_GET['id'];
$sql = "select * from content where id = $id ";
$result = mysql_query($sql,$con);
$row =  mysql_fetch_array($result);

?>

<div class="main">
	<div class="main-left">
		<div class="showComment" style="margin-top: 0px;">
			<div class="showTitle">
				<span style="margin-left:10px;padding:2px 5px;background-color:#CCC9C1;color:#444444"><?php echo $row[6]?></span>
				<p style="margin:15px 10px 0px 10px;font-size:18px"><?php echo $row[1] ?></p>
				<p class="bottomName" style="padding-top:5px;color:#C7C6D6"><?php  echo $row[5]?><span class="date"><?php echo $row[3]?></span>
			</div>
			<div class="showBody"><?php echo $row[2]?></div>
		</div>

<?php  

    $sql = "select * from comment where comment_id='$id' order by `create_at` desc";
    $result = mysql_query($sql,$con);
    //
while($row = mysql_fetch_array($result, MYSQL_NUM)){
?>
				<div class ="showMainDetail">
					<div class ="showReply">
						<?php echo $row[1] ?>
					</div>
						<p class="showDateDetail" ><span style="color:green"><?php echo $row[4]?></span><span class="date"><?php echo $row[3]?></span>
<?php if($row[4] == $_SESSION['username']){
$c = basename($_SERVER["PHP_SELF"])."?id=".$row[2];?>
<span style="padding-left:10px;color:#666666;cursor:pointer" onclick="deleteComment('<?php echo "$row[0]','$c'"?>)" >删除</span>
<?php }else{?>
<span style="padding-left:10px;color:#C7C6D6"> 删除</span></span>
<?php }?>

</p>
				</div>
<?php }
	   //end show data

	   $row_num = mysql_num_rows($result);
	   
	   if($row_num==0){
		   echo("<div style=\"color:#CCC9C1;background-color:#fff;text-align:center;padding:10px 0px 10px 0px;font-size:20px\">该话题没有评论</div>");
}
	   mysql_free_result($result);

//    paging($PHP_SELF,$sql,$con,5);
?>
<form method="POST" action="./reply.php">
<input type="hidden" name="replyId" value="<?php echo $_GET['id']?>">
<input type="hidden" name="url" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?id='.$_GET['id'];?>">
<input type="hidden"  name = "replyIp" value = "<?php echo $_SERVER["REMOTE_ADDR"]; ?>">
<input type="hidden"  name = "replyUsername" value = "<?php echo $_SESSION["username"]; ?>">
<div style="background-color:#fffffb;border-top:1px solid #CCC9C1" class="reply">
	<p style="background-color:#ECF1EF;padding:7px 1px">添加一条新回复</p>
	<div style="text-align:center">
				<textarea rows="15" cols="50" id="replyBody" name= "replyBody"></textarea>
	
	</div>
    <button class = "reply" id = "reply" type="submit" onclick= "return checkNewReply('<?php echo("$_SESSION[username]")?>')" >回复</button>
</div>
</form>
<?php include_once '../layout/footer.php' ;?>

	</div>
<?php
//下面的不用改
include_once '../mainRight.php'?>	
	</div>
</div>
<?php // include_once '../layout/footer.php' ?>
