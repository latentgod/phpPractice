<?php
$date =json_decode(json_encode($_POST));
include_once "../conn/connect.php";
$sql = "insert into admin(username,password)values('". $date-> admin."','".$date -> password."')";
//$arr = array ('a'=>$sql,'b'=>2,'c'=>3,'d'=>4,'e'=>5); 
$result =  mysql_query($sql,$con);
if(empty(mysql_fetch_array($result))){
//echo call-back data to ajax;
//echo $username;
	echo "0";

}
else{
//echo call-back data to ajax;
//echo json_encode($arr);
	echo "1";

}

mysql_free_result($result);





?>