
function selectUid(val) {
	$(".search-box").val(val);
	$(".suggesstion-box").hide();
}


$(document).ready(function() {
	
	
	$('.navbar-nav>li>a').on('click', function(){
		$('.navbar-collapse').collapse('hide');
	});
	
	$.ajax({ 
		async: true,
		type: "GET",
		url: './Update_Delete/home.php',
		success: function(response){
			//console.log(response);
			$("#main").empty();
			$("#main").html(response);
		}
	});
	
	
	$('#userDataUpdateForm').on('submit', function(e){
        e.preventDefault();
		//alert("Updating User data");
		$("#updateUserData").modal("hide");
		$("#main").empty();
		$.ajax({ 
			async: true,
			type: "POST",
			url: './Update_Delete/userDataUpdateForm.php',
			data: $(this).serialize(),// or fData
			success: function(response){
				alert(response);
				
				$.ajax({ 
					async: true,
					type: "GET",
					url: './Update_Delete/userList.php',
					success: function(response){
						//console.log(response);
						$("#main").html(response);
					}
				});
		   }
	   });	
	});
	
	
	$('#feedbackData').click(function(){
		//alert("userList Clicked");
		
		$.ajax({ 
			async: true,
			type: "GET",
			url: './Update_Delete/feedbackData.php',
			success: function(response){
				//console.log(response);
				$("#main").html(response);
				
				
		   }
		});	
	});
	
		
	$('#userList').click(function(){
		
		$.ajax({ 
			async: true,
			type: "GET",
			url: './Update_Delete/userList.php',
			success: function(response){
				//console.log(response);
				$("#main").html(response);
				
				
		   }
		});	
	});

	
	$('#userView').click(function(){
		//console.log("User View Clicked");
		$("#userSearch").modal("show");

	});
	
	
	$('#userSearchForm').on('submit', function(e){
        e.preventDefault();
		
		$.ajax({ 
			async: true,
			type: "POST",
			data: $(this).serialize(),
			url: './Update_Delete/data.php',
			success: function(response){

				$("#main").html(response);
				
				$("#userSearch").modal("hide");
				$('#userSearchForm')[0].reset();
				$('#formDataEntry')[0].reset();
		   }
	   });
		
	});
	
	
	$('#home').click(function(){
		//console.log("User View Clicked");
		$.ajax({ 
			async: true,
			type: "GET",
			url: './Update_Delete/home.php',
			success: function(response){
				//console.log(response);
				$("#main").html(response);

		   }
		});	
	});
	
	
	$("#search-box2").keyup(function(){
		$.ajax({ 
			async: true,
			type: "POST",
			url: "./Update_Delete/uids.php",
			data:'keyword='+$(this).val(),
			beforeSend: function(){
				$(".search-box").css("background","#FFF url(./Update_Delete/LoaderIcon.gif) no-repeat 165px");
			},
			success: function(data){
				$("#suggesstion-box2").show();
				$("#suggesstion-box2").html(data);
				$("#search-box2").css("background","#FFF");
			}
		});
	});
	

	$("#search-box1").keyup(function(){
		$.ajax({ 
			async: true,
			type: "POST",
			url: "./Update_Delete/uids.php",
			data:'keyword='+$(this).val(),
			beforeSend: function(){
				$("#search-box1").css("background","#FFF url(./Update_Delete/LoaderIcon.gif) no-repeat 165px");
			},
			success: function(data){
				$("#suggesstion-box1").show();
				$("#suggesstion-box1").html(data);
				$("#search-box1").css("background","#FFF");
			}
		});
	});
	
	
	$('#formDataEntry').on('submit', function(e){
        e.preventDefault();
		console.log(document.forms["form6"]);
		//alert("submited");
		
		var emailid= document.forms["form6"]["emailid"].value;
		var height = document.forms["form6"]["height"].value;
		var weight = document.forms["form6"]["weight"].value;
		
		var message="";
		var regex_emailid = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/
		
		if(!emailid.match(regex_emailid)){
			message+="Please enter Valid Email-ID \n";
		}
		
		if(height > 300){
			message+="Please enter Valid Height in cms \n";
		}
		
		if(weight > 400){
			message+="Please enter Valid Weight Kg's\n";
		}
		
		if(message.length == 0){
			$.ajax({ 
				async: true,
				type: "POST",
				url: './Update_Delete/insertUserData.php',
				data: $(this).serialize(),
				success: function(response){
					$('#formDataEntry')[0].reset();
					$('#userSearchForm')[0].reset();
					$("#dataEntry").modal("hide");
					
					alert("submited");
					alert(response);
					
			   }
		   });
		}
		else{
			alert(message);
		}
        
	});

	
	var regex_letters = /^[A-Za-z]+$/;
	//min 8 max 15 one special character one digit one uppercase and one lowercase
	//var regex_password=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
	//var regex_emailid = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/; 
	var regex_emailid = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/
	
	var regex_mobile_number = /^[2-9]\d{9}$/;
	
	//Handle Create User
    $('#IDcreateUserForm').on('submit', function(e){
        e.preventDefault();
		
		var firstname= document.forms["createUserForm"]["firstname"].value;
		var lastname= document.forms["createUserForm"]["lastname"].value;
		var emailid= document.forms["createUserForm"]["emailid"].value;
		var mobile_number= document.forms["createUserForm"]["mobilenumber"].value;
		var dob= document.forms["createUserForm"]["dob"].value;
		var password1 = document.forms["createUserForm"]["password1"].value;
		var password2= document.forms["createUserForm"]["password2"].value;
		
		var message="";
		
		if(!firstname.match(regex_letters)){
			message+="Please enter only letters in first name \n";
		}
		
		if(!lastname.match(regex_letters)){
			message+="Please enter only letters in last name \n";
		}
		
		if(!emailid.match(regex_emailid)){
			message+="Please enter Valid Email-ID \n";
		}
		
		if(!mobile_number.match(regex_mobile_number)){
			message+="Please enter valid mobile number\n";
		}
		
		if(password1 != password2){
			message+="Password 1 and password 2 don't match\n";
		}
		
		if(message.length == 0){
			$.ajax({ 
				async: true,
				type: "POST",
				url: './Update_Delete/createUser.php',
				data: $(this).serialize(),// or fData
				success: function(response){
					$("#createUserModal").modal("hide");
					alert(response);
					$('#IDcreateUserForm')[0].reset();
										
					$.ajax({ 
						async: true,
						type: "GET",
						url: './Update_Delete/userList.php',
						success: function(response){
							//console.log(response);
							$("#main").html(response);
								
					   }
					});															
			   }
		   });
		}
		else{
			alert(message);
		}
        
	});
	
	
	$('#login').click(function(){
		//console.log("User View Clicked");
		$.ajax({ 
			async: true,
			type: "POST",
			url: './Update_Delete/admin.php',
			success: function(response){
				alert(response);
				var jsonData = JSON.parse(response);
				if(jsonData.success){
					
					if(jsonData['message']['admin']){
						$("#lUDE").parent().removeClass("d-none");
						$("#lCU").parent().removeClass("d-none");
						$("#feedbackData").parent().removeClass("d-none");
						$("#userList").parent().removeClass("d-none");
						$("#userView").parent().removeClass("d-none");
					}
					
					$.ajax({ 
						async: true,
						type: "POST",
						data: "emailid="+jsonData['message']['eid'],
						url: './Update_Delete/data.php',
						success: function(response1){

							$("#main").html(response1);
							$("#login").parent().addClass("d-none");
							$("#logout").parent().removeClass("d-none");
					   }
				   });
				   
				}
				else{
					$("#myModal1").modal("show");
				}
			
			}
		});	
	});
	
	
	$('#logout').click(function(){
		//console.log("User View Clicked");
		$.ajax({ 
			async: true,
			type: "POST",
			url: './Update_Delete/logout.php',
			success: function(response1){
				alert(response1);
				$("#logout").parent().addClass("d-none");
				$("#login").parent().removeClass("d-none");
				
				$.ajax({ 
					async: true,
					type: "GET",
					url: './Update_Delete/home.php',
					success: function(response){
						//console.log(response);
						$("#main").empty();
						$("#main").html(response);
					}
				});
				
		   }
	   });
	   
	});
	
	//Handle Login Form 
	$('#form1').on('submit', function(e){
		e.preventDefault();
		
        var emailid= document.forms["form1"]["emailid"].value;
		var password= document.forms["form1"]["password"].value;
		
		var message="";
		
		if(!emailid.match(regex_emailid)){
			message+="Please enter Valid Email-ID \n";
		}
		
		if(message.length == 0){
			var fData = $(this).serialize();
			$.ajax({ 
				async: true,
				type: "POST",
				url: './Update_Delete/login.php',
				data: $(this).serialize(),// or fData
				success: function(response){
					alert(response);
					console.log(response);
					var jsonData = JSON.parse(response);
					$('#form1')[0].reset();
					$("#myModal1").modal("hide");
					
					if(jsonData.success){
						
						if(jsonData['message']['admin']){
							$("#lUDE").parent().removeClass("d-none");
							$("#lCU").parent().removeClass("d-none");
							$("#feedbackData").parent().removeClass("d-none");
							$("#userList").parent().removeClass("d-none");
							$("#userView").parent().removeClass("d-none");
						}
						
						$.ajax({ 
							async: true,
							type: "POST",
							data: "emailid="+jsonData['message']['eid'],
							url: './Update_Delete/data.php',
							success: function(response1){
								
								$("#login").parent().addClass("d-none");
								$("#logout").parent().removeClass("d-none");
								
								$("#main").html(response1);
								
							}
						});
						
					}
					else {
						alert(response);
					}
			   }
		   });
		}
		else{
			alert(message);
		}
		
	});
	
	$('#feedbackForm').on('submit', function(e){
		e.preventDefault();
		
			$.ajax({ 
				async: true,
				type: "POST",
				url: './Update_Delete/feedbackSubmit.php',
				data: $(this).serialize(),// or fData
				success: function(response){
					console.log(response);
					
					$('#feedbackForm')[0].reset();
					$("#feedbackModal").modal("hide");
					alert(response);
			   }
		   });
	});
	
	
	
	
	
});