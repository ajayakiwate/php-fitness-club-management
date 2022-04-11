

$(document).ready(function() {
	
	$('.user-update').on('click', function(){
		//alert("clicked Update");
		
		var parent_id = $(this).parent().parent().attr('id');
		var trans = $(this).text();
		console.log(parent_id, trans);
	 
		$.ajax({
			type: "POST",
			url: './Update_Delete/u_d.php',
			data: "function=user-update&"+"id="+parent_id,// or fData
			success: function(response){
				//alert(response);
				console.log(JSON.parse(response));
				var data = JSON.parse(response);
				
				document.forms["form9"]["uid"].value=data.id;
				document.forms["form9"]["firstname"].value=data.firstname;
				document.forms["form9"]["lastname"].value=data.lastname;
				document.forms["form9"]["emailid"].value=data.emailid;
				document.forms["form9"]["dob"].value=data.dob;
				document.forms["form9"]["mobilenumber"].value=data.mobileno;
				document.forms["form9"]["password1"].value=data.password;
				document.forms["form9"]["password2"].value=data.password;
				
				$("#updateUserData").modal("show");
		    }
	    });
		
	});

	
	$('.user-delete').on('click', function(){
		//alert("clicked Delete");
		var parent_id = $(this).parent().parent().attr('id');
		var trans = $(this).text();
		console.log(parent_id, trans);
		
		$.ajax({
			type: "POST",
			url: './Update_Delete/u_d.php',
			data: "function=user-delete&"+"id="+parent_id,// or fData
			success: function(response){
				
				//console.log(response);
				$.ajax({
					type: "GET",
					url: './Update_Delete/userList.php',
					success: function(response){
						//console.log(response);
						$("#main").html(response);
						
					}
				});
				
				alert(response);
		    }
	    });
	});
	
	
});

