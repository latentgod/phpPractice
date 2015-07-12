<?php
session_start();
   function show_result($sql,$link){
	   //$result = mysql_query($sql,$link) or  die("不能执行sql语句：" . mysql_error());
	   try{
	   $result = mysql_query($sql,$link);
	   }catch(Exception $e){
			echo("没有评论");
	   }
	   $col_num = mysql_num_fields($result);
	   $row_num = mysql_num_rows($result);
	   
	   if($row_num==0)
		   echo("<div style=\"color:#CCC9C1;background-color:#fff;text-align:center;padding:10px 0px 10px 0px;font-size:20px\">该话题没有评论</div>");
	   //show data
while($row = mysql_fetch_array($result, MYSQL_NUM)){
?>
			<div class="showComment">
				<div class = "showName"><?php echo $row[5] ?></div>
				<div class ="showMain">
					<p><a style="font-size:20px;" href="../comment/show.php?id=<?php echo $row[0] ?>"><?php echo cut_str($row[1],32) ?></a></p>
					<p class="bottomName"><?php  echo cut_str( $row[3],10)?><span class="date"><?php echo $row[2]?></span>
				
				</div>
			</div>
<?php }
	   //end show data

	   mysql_free_result($result);
   }
   
   //函数功能：分页显示记录集
   //参数$cur_page：当前网页的URL
   //参数$sql：sql查询语句
   //参数$link：连接标识符
   //参数$page_size：每页记录数
   function paging($cur_page,$sql,$link,$page_size){
	   //获取总记录数
	   $row_count = mysql_num_rows(mysql_query($sql));
	   
	   //计算总页数
	   $page_count = ceil($row_count / $page_size);
	   
	   //设置当前页码（从1开始计算）
	   $page_index = isset($_GET['page']) ? $_GET['page'] : 1;
	   if(!is_numeric($page_index)) $page_index=1;
	   if($page_index < 1) $page_index = 1;
	   if($page_index > $page_count) $page_index = $page_count;
	   
	   //设置当前页中第一条记录在所有记录中的编号 （从0开始计算）
	  $start_row = ($page_index-1)* $page_size;
	  
	  //为查询语句添加limit子句
	  $sql_limit = sprintf("%s limit %d,%d", $sql, $start_row, $page_size);
	  
	  //用表格形式显示一页记录
	  show_result($sql_limit,$link);
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
		<button class = "reply" type="submit" onclick= "return checkNewReply()" >回复</button>
</div>
</form>




<?php
	  
	  //以下代码用于记录集导航条显示
	  printf("<form id=\"form1\" style =\"background-color:#fff;padding-bottom:30px;\"class =\"paging\" name=\"pagingform\" method=\"get\" action=\"\">");
	 // printf("当前页码:%d / %d &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 共%d 条帖子 <br/>",$page_index,$page_count,$row_count);
	  printf("%d / %d &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<br/>",$page_index,$page_count);
	  
	  //显示页码链接
	  for($i=1;$i<=$page_count;$i++){
		  if($i!= $page_index)
		    printf("<a href=\"%s?page=%d\">[%d]</a>&nbsp;&nbsp;",$cur_page,$i,$i);
		  else
		    printf("<b><font color=\"#000\">%d</font></b>&nbsp;&nbsp;",$i);
	  }
	  
	  //显示下拉式列表
	  printf("&nbsp;<select name=\"page\" onchange=\"pagingform.submit();\">");
	  for($i=1;$i<=$page_count;$i++){
		  printf("<option value=\"%d\" %s >%d</option>",$i,($i==$page_index ? "selected" : ""),$i);
	  }
	  printf("</select>&nbsp;&nbsp;");
	  
	  //显示“首页”“前页”“后页”“末页”链接
	  if($page_index > 1){
		  printf("<a href=\"%s?page=%d\">首页</a>&nbsp;&nbsp;",$cur_page,1);
		  printf("<a href=\"%s?page=%d\">上一页</a>&nbsp;&nbsp;",$cur_page,$page_index -1);
	  }
	  if($page_index < $page_count){
		  printf("<a href=\"%s?page=%d\">下一页</a>&nbsp;&nbsp;",$cur_page,$page_index +1);
		  printf("<a href=\"%s?page=%d\">末页</a>&nbsp;&nbsp;",$cur_page,$page_count);
	  }
	  
	  printf("</form>");
	
 include_once 'layout/footer.php' ;
	  
   }



?>
