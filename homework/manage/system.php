<?php 
session_start();
include_once('manageHead.php');
if(trim($_SESSION['admin'])==""){
header("Location:./index.php");
exit;
}
include_once '../conn/connect.php';
$sql = "select * from system "; 
$result = mysql_query($sql,$con) or die(mysql_error());
$row = mysql_fetch_array($result);
if(empty($row)){
	exit;
}
else{
mysql_close($con);
}

?>
<div class="operation">
<form method="post" action = "saveSystem.php">
	<ul class="systemOption">
    <li><label>标题:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  value="<?php echo $row[1]?>"id="title" type="" name="title"></label></li>
    <li><label>关键词   :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<input value="<?php echo $row[2]?>"type=""name="keywords" id="keywords"></label></li>
    <li><label>备案号    :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<input type="" name="recode" value="<?php echo $row[4]?>" id="recode"></label></li>
    <li><label>公司号码:&nbsp;&nbsp;&nbsp;<input type="" name="phone" id="phone" value="<?php echo $row[6]?>"></label></li>
    <li><label>公司email:&nbsp;&nbsp;&nbsp;<input type="" name="email" id="email" value="<?php echo $row[5]?>"></label></li>
    <li><label>版本号:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="" id = "version"name="version" value="<?php echo $row[3]?>"></label></li>
    <button style="width:50px;height:50px;background-color:#fff;margin-left:150px;cursor:pointer" type="submit" onclick= "return checkSystem()" >更改</button>
	</ul>
<form>

</div>
<?php include_once '../layout/footer.php' ?>
    
