<?php  
include_once '../layout/header.php';
include_once '../conn/connect.php';
include_once "../cutString.php";
include_once "../paging.php";
$sql = "select * from content order by `id` desc";
$result = mysql_query($sql,$con);
echo "<div class=\"main\">";
echo "<div class=\"main-left\">";
 paging($PHP_SELF,$sql,$con,20);
	echo "</div>";
include_once '../mainRight.php'?>	
		</div>
	</div>
<?php include_once '../layout/footer.php' ?>
<?php// paging($PHP_SELF,$sql,$con,4,'ggaa','800px');?>
