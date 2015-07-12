<?php 
session_start();
if(trim($_SESSION['admin'])==""){
header("Location:./index.php");
exit;
}
include_once('manageHead.php'); 
include_once('userPaging.php');
include_once('../conn/connect.php');
$sql = "select * from user order by id desc";
//$sql = "select * from comment order by id desc";
?>
<div class="operation">
<ul class="tab">
       <li class="cur">普通用户</li>
        <li>管理员</li>
 </ul>
<div class="tabContent">
    <div class="on">
<?php upaging($PHP_SELF,$sql,$con,20);?>
    </div>
    <div class="down">
	<p class="addAdmin">添加</p>
	<ul class="newAdmin">
		<li><label>管理员:&nbsp;&nbsp;&nbsp;<input type="" id="admin"></label></li>
		<li><label>密码 :&nbsp;&nbsp;&nbsp;<input type="" id="adminPassword"></label></li>
		<span style="margin-left:150px;cursor:pointer;width:100px;height:100px;background-color:#fff;padding:10px;"onclick ="return newAdmin()" >添加</span>
	</ul>
<?php 
include_once('adminPaging.php');
$sql = "select * from admin order by id desc";
apaging($PHP_SELF,$sql,$con,20);?>
    
    </div>
</div>
</div>
<?php include_once '../layout/footer.php';?>
