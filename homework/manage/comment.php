<?php 
session_start();
if(trim($_SESSION['admin'])==""){
header("Location:./index.php");
exit;
}
include_once('manageHead.php');
include_once('commentPaging.php');
include_once('../conn/connect.php');
include_once("../cutString.php");
$sql = "select * from comment order by id desc";
?>
<div class="operation">
<?php mpaging($PHP_SELF,$sql,$con,20);?>
</div>
<?php include_once '../layout/footer.php' ?>
    
