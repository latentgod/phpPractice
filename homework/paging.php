<?php
   function show_result($sql,$link){
	   //$result = mysql_query($sql,$link) or  die("不能执行sql语句：" . mysql_error());
       $result = mysql_query($sql,$link) or  die("<script>alert(\"该栏目还没有帖子,返回上一页面\");history.back(-1)</script>");
	   $col_num = mysql_num_fields($result);
	   $row_num = mysql_num_rows($result);
	   
	   if($row_num==0)
		   die("未找到任何记录");
	   //show data
while($row = mysql_fetch_array($result, MYSQL_NUM)){
?>
			<div class="showContent">
           <?php //<div class = "showName">echo $row[5] </div> ?>
				<div class ="showMain">
					<p><a style="font-size:20px;" href="../comment/show.php?id=<?php echo $row[0] ?>"><?php echo cut_str($row[1],32) ?></a></p>
                    <p class="bottomName"><?php  echo cut_str( $row[5],10)?><span class="category"><?php echo $row[6]?></span><span class="date"><?php echo $row[3]?>
                    
<?php if($row[5] == $_SESSION['username']){
$c = basename($_SERVER["PHP_SELF"]);?>
<span style="padding-left:10px;color:#666666;cursor:pointer" onclick="deleteTheme('<?php echo "$row[0]','$c','theme'"?>)"> 删除</span><span style="padding-left:0px"><a href="../action/edit.php?id=<?php echo $row[0]?>">编辑</a></span>
<?php }else{?>
<span style="padding-left:10px;color:#C7C6D6"> 删除</span><span style="padding-left:20px;color:#C7C6D6">编辑</a></span>
<?php }?>
                    </span>
				
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
	  
	  //以下代码用于记录集导航条显示
	  printf("<form id=\"form1\" style=\"background-color:#fff\" class =\"paging\" name=\"pagingform\" method=\"get\" action=\"\">");
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
	
 include_once '../layout/footer.php' ;
	  
   }



?>
