$(document).ready(function(){

	$("#loginButton").click(function(){
		var userid;
		var userpassword;
		userid = $("#userid").val();
		userpassword = $("#userpassword").val();
		if (userid == "" || userpassword == "") {
			alert("用户名和密码不能为空！");
		} else {
			
			$.ajax({
				async: false,
				type: "POST",
				url: "index.php",
				data: {
						mod:"Auth", 
						action:"loginAuth",
						userid: userid,
						userpassword: userpassword
					},
				dataType: "json",

				success: function(msg) {
					if (msg.status == "user_ok") {
						window.location = "./";
					} else if (msg.status == "adm_ok") {
						window.location = "./?mod=HelloAdm&action=index";
					} else if (msg.status == "fail") {
						alert(msg.msg);
						$("#userid").val("");
						$("#userpassword").val("");
					}
				},

				error: function(e) {
					alert(e.responseText);
					alert("无法连接到服务器，请稍后再试!");
				}

			});

		}
	});
});

	