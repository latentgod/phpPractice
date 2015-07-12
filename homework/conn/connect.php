<?php
$server = "localhost";
$mysqlUser = "root" ;
$mysqlPassword = "mysql";
$db = "security";
$con = mysql_connect($server,$mysqlUser,$mysqlPassword);
if(!$con){
	die("<script>alert(\"不能连接数据库\"".mysql_error().")</script>");
}
if(!mysql_select_db($db,$con)){
	die("没有这个数据库,请先创建");
};         
//对数据库中编码格式进行转换，避免出现中文乱码的问题
mysql_query("set names utf8;");
mysql_query("SET character_set_client=utf-8");
mysql_query("SET character_set_connection='utf8'");
mysql_query("SET character_set_results='utf8'");
mysql_query("set character_set_database ='utf8'");
mysql_query("set character_set_server = 'utf8'");
mysql_query("set character_set_system ='utf8'");
mysql_query("SET collation_server = utf8_general_ci");
mysql_query("SET collation_database = utf8_general_ci");







?>
