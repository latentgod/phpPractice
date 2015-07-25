$(document).ready(function(){

	$("#username").blur(function(){
		if($.trim($(this).val()) == ""){
				$("#usernameNotify").hide();
		    $("#usernameWarnNotify").hide();
		    $("#usernameEmptyNotify").show();
			  $("#register").attr("disabled","disabled");
			  $("#username").focus();
		  	return;
		}
		else{
		
		}
		//ajax
		$.ajax({
			type: "post",
			url:"../registerLogin/ajaxCheckUsername.php",
			data: {username :$.trim($(this).val())},
			dataType: "json",
			success:function(data){
			//	alert(data.username);
				if(data =="1"){
				   //alert("该用户名已被注册");    
		       $("#usernameNotify").hide();
		       $("#usernameEmptyNotify").hide();
		       $("#usernameWarnNotify").show();
					// $("#username").val(" ");
					 $("#username").focus();
			     $("#register").attr("disabled","disabled");
					 return;
				}
				else{
		  $("#usernameWarnNotify").hide();
		  $("#usernameEmptyNotify").hide();
		  $("#usernameNotify").show();
				}
			},
			error: function(data){
				 alert("ajax发送失败");  
			}
		});

	});

	$("#registerPassword").blur(function(){
		if($.trim($(this).val()) == ""){
			$("#passwordEmptyNotify").show();
			$("#register").attr("disabled","disabled");
		}
		else{
			$("#passwordEmptyNotify").hide();
		}
	});
	$("#confirmRegisterPassword").blur(function(){
		if($.trim($("#registerPassword").val()) != $.trim($(this).val()))
		{
			$("#differenNotify").show();
			$("#register").attr("disabled","disabled");
		}
		else{
			$("#differenNotify").hide();
			$("#register").removeAttr("disabled");
		
		}

	});

	$("#hobby").blur(function(){
		if($.trim($(this).val()) == ""){
			$("#hobbyEmptyNotify").show();
			$("#register").attr("disabled","disabled");
		}
		else{
			$("#hobbyEmptyNotify").hide();
		}
		});
	//update password
	$("#newPassword").focus(function(){
		$("#retrieveDifferenNotify").hide()
		$("#retrieveEmptyNotify").hide()
	});
	$("#confirmNewPassword").focus(function(){
		$("#retrieveDifferenNotify").hide()
		$("#retrieveEmptyNotify").hide()
	});



$("#pd").blur(function(){
len = $.trim($("#pd").val()).length;
alert(len);
if(len != 16 || len != 32 ){
	alert("not 16 or 32");
}

});

$(".tab li").click(function(){
	var index = $(this).index();
	$(".tab li").removeClass("cur");
	$(this).addClass("cur");
	$(".tabContent div").hide();
	$(".tabContent div").eq(index).show();
});

$(".addAdmin").click(function(){
	$(".newAdmin").slideToggle();
});


});
//ensure all option were written
function checkRegister(){

	if($.trim($("#username").val()) == "" ||$.trim($("#registerPassword").val()) == "" || $.trim($("#confirmRegisterPassword").val()) == "" ||$.trim($("#hobby").val()) == "" ){
		alert("请正确填写所有选项");
		return false;
		}
}
//check newPassword
 function checkNewPassword(){
	if($.trim($("#newPassword").val()) == "" ||$.trim($("#confirmNewPassword").val()) == "" ){
		$("#retrieveEmptyNotify").show()
		return false;
	}
	else{
		$("#retrieveEmptyNotify").hide()
	}
	if($.trim($("#newPassword").val()) != $.trim($("#confirmNewPassword").val())){
		$("#retrieveDifferenNotify").show()
		return false;
	}
	else{
		$("#retrieveDifferenNotify").hide()
	
	}
 
 
 }

//check new Theme
function checkNewTheme(){
	var category=$('input:radio[name="category"]:checked').val();
	if($.trim($("#title").val()) == "" ||$.trim($("#body").val()) == "" || category == null ){
		alert("全部为必填字段，请正确填写所有内容");
		return false;
	}

}
function checkLogin(s){
	if($.trim(s) == "" )
	alert("请先登录");
	return false;
}
function checkNewReply(s){
	if($.trim(s) == "" ){
	alert("请先登录");
	return false;
	}
	else{
		if($.trim($("#replyBody").val()) == ""){
			alert("评论不能为空");
			return false;
		}
	
	}


}


//delete
function deleteTheme(id,category,label){
	var id = id;
	var label = label;
	var category = category;
	var url = "../action/deleteTheme.php";
			if(label == "user"){
				url="../action/deleteUser.php";
			}
			if(label == "admin"){
				url="../action/deleteAdmin.php";
			}
			if(label == "comment"){
				url="../action/deleteComment.php";
			}
		$.ajax({
			type: "post",
			url: url,
			data: {"id" :$.trim(id),"category":category},
			dataType: "json",
			success:function(data){
			//	alert(data.username);
				if(data =="1"){
				   alert("删除失败");    
					 return;
				}
				if(data =="2"){
				   alert("admin 不能删除");    
					 return;
				}
				else{
					var url ="../front/"+category;
					if(category == "content.php"){
						url = "content.php";
					}
					if(category == "comment.php"){
						url = "comment.php";
					}
					if(category == "user.php"){
						url = "user.php";
					}
					location.href=url;
				}
			},
			error: function(data){
				 alert("ajax发送失败");  
			}
		});
}

function checkEditTheme(){
	var category=$('input:radio[name="category"]:checked').val();
	if($.trim($("#editTitle").val()) == "" ||$.trim($("#editBody").val()) == "" || category == null ){
		alert("全部为必填字段，请正确填写所有内容");
		return false;
	}

}
function deleteComment(id,url){
	var id = id;
	var url = url;
		$.ajax({
			type: "post",
			url:"../action/deleteComment.php",
			data: {"id" :$.trim(id),"url":url},
			dataType: "json",
			success:function(data){
			//	alert(data.username);
				if(data =="1"){
				   alert("删除失败");    
					 return;
				}
				else{
					location.href="../comment/"+url;
				}
			},
			error: function(data){
				 alert("ajax发送失败");  
			}
		});
}
function newAdmin(){
	if($.trim($("#admin").val()) == "" ||$.trim($("#adminPassword").val()) == ""){
		alert("全部为必填字段，请正确填写所有内容");
		return false;
	}
	var admin = $.trim($("#admin").val());
	var password = $.trim($("#adminPassword").val());
		$.ajax({
			type: "post",
			url:"../action/ajaxAddAdmin.php",
			data: {"admin" :admin,password:password},
			dataType: "json",
			success:function(data){
			//	alert(data.username);
				if(data =="1"){
				   alert("添加失败");    
					 return;
				}
				else{
					location.href="user.php";
				}
			},
			error: function(data){
				 alert("ajax发送失败");  
			}
		});





}


function checkSystem(){
	if($.trim($("#title").val()) == "" || $.trim($("#keywords").val()) == "" || $.trim($("#version").val()) == "" || $.trim($("#phone").val()) == ""|| $.trim($("#email").val()) == "" ||$.trim($("#recode").val()) == ""){
		alert("全部为必填字段，请正确填写所有内容");
		return false;
	}


}
