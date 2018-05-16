
$(document).ready(function() 
{
	
	var divRequest = $(".div-request").text();
	
	// top bar active
	$('#navUserSettings').addClass('active');
	
	if(divRequest == 'add')  
	{
		// add User and remove user
		// top nav child bar 
		$('#topNavARUser').addClass('active');

		
		
		$("#addNewUserForm").unbind('submit').bind('submit', function() 
		{		
			$(".text-danger").remove();
			var form = $(this);		
			var username = $("#userName").val();
			var userType = $("#userType").val();
			var newPassword = $("#npassword").val();
			var conformPassword = $("#cpassword").val();

			var name = 0;
			var npass = 0;
			var cpass = 0;

			if(username == "" || userType == "" || newPassword == "" || conformPassword == "") 
			{
				/*if(username == "") 
				{
					$("#userName").after('<p class="text-danger">Username field is required</p>');
					$("#userName").closest('.form-group').addClass('has-error');
				}
				else 
				{
					$(".text-danger").remove();
					$('.form-group').removeClass('has-error');	  	
				}*/

				if(username == "") 
				{
					$("#userName").after('<p class="text-danger">Username field is required</p>');
					$('#userName').closest('.form-group').addClass('has-error');
					name = 0;
				}
				else //     /^([a-z]){3}[a-z]*$/i
				{
					if (/^([a-zA-Z_-]){3,100}$/.test(username)) 
					{
					    // remov error text field
						$("#userName").find('.text-danger').remove();
						// success out for form 
						$("#userName").closest('.form-group').addClass('has-success');
						name = 1;	  	
					}	// /else		
					else 
					{
					    
		            	$("#userName").after('<p class="text-danger">Username field is Invalid</p>');
						$('#userName').closest('.form-group').addClass('has-error');
						name = 0;
					}
				}


				/*if(newPassword == "") {
					$("#npassword").after('<p class="text-danger">The New Password field is required</p>');
					$("#npassword").closest('.form-group').addClass('has-error');
				}
				else 
				{
					$(".text-danger").remove();
					$('.form-group').removeClass('has-error');	  	
				}*/

				if(newPassword == "") 
				{

					$("#npassword").after('<p class="text-danger">The New Password field is required</p>');
					$("#npassword").closest('.form-group').addClass('has-error');
					npass = 0;					
				}
				else if(newPassword.length < 5) 
				{
				    $("#npassword").after('<p class="text-danger">Your password must be at least 8 characters</p>');
					$("#npassword").closest('.form-group').addClass('has-error');
					npass = 0;
				    // errors.push("Your password must be at least 5 characters");
				}
				else if (newPassword.search(/[a-z]/i) < 0) 
				{
				    $("#npassword").after('<p class="text-danger">Your password must contain at least one letter</p>');
					$("#npassword").closest('.form-group').addClass('has-error');
					npass = 0;
				    //errors.push("Your password must contain at least one letter."); 
				}
				else if (newPassword.search(/[0-9]/) < 0) 
				{
				    $("#npassword").after('<p class="text-danger">Your password must contain at least one digit</p>');
					$("#npassword").closest('.form-group').addClass('has-error');
					npass = 0;
				    //errors.push("Your password must contain at least one digit.");
				}
				else
				{
					// remov error text field
					$("#npassword").find('.text-danger').remove();
					// success out for form 
					$("#npassword").closest('.form-group').addClass('has-success');
					npass = 1;	  
				}

				if(conformPassword == "") 
				{
					$("#cpassword").after('<p class="text-danger">The Conform Password field is required</p>');
					$("#cpassword").closest('.form-group').addClass('has-error');
					cpass = 0;
				} 
				else 
				{
					$(".text-danger").remove();
					$('.form-group').removeClass('has-error');
					cpass = 1;	  	
				}
				
			}
			else /*if(name == 1 && npass == 1 && cpass == 1)*/ 
			{
				$("#addUserbtn").button('loading');
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) 
					{
						console.log(response);
						$("#addUserbtn").button('reset');						
						$("#addNewUserForm")[0].reset();
						$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
						
						if(response.success == true) 
						{
							// shows a successful message after operation
							$('.success_message').html('<div class="alert alert-success">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');

							// remove the mesages
							$(".alert-success").delay(500).show(10, function() 
							{
								$(this).delay(2000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
							
							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');	    
						}
						else 
						{

							// shows a successful message after operation
							$('.success_message').html('<div class="alert alert-warning">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong> '+ response.messages +
							'</div>');

							// remove the mesages
							$(".alert-warning").delay(500).show(10, function() 
							{
								$(this).delay(2000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert	

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success'); 	          	
						}
					} // /success function
				}); // /ajax function

			} // /else


			return false;
		});
		
		// remove username
		$("#removeForm").unbind('submit').bind('submit', function()
		{
			var form = $(this);

			var username = $("#username").val();
			
			if(username == "") 
			{
				$("#allusername").after('<p class="text-danger">All username field is required</p>');
				$("#allusername").closest('.form-group').addClass('has-error');
			}
			else 
			{
				$(".text-danger").remove();
				$('.form-group').removeClass('has-error');	  	
			}
			
			if(username)
			{	
				$("#removeuserBtn").button('loading');
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) 
					{

						$("#removeuserBtn").button('reset');						
						$("#removeForm")[0].reset();
						$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

						if(response.success == true)  
						{												
											
							$("#removeuserModal").modal('hide');
							// shows a successful message after operation
							$('.removeuserMessages').html('<div class="alert alert-success">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');

							// remove the mesages
							$(".alert-success").delay(500).show(10, function() 
							{
								$(this).delay(2000).hide(10, function()
								{
									$(this).remove();
								});
							}); // /.alert
							
							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');
							
						}
						else 
						{
							// shows a successful message after operation
							$('.removeuserMessages').html('<div class="alert alert-warning">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong> '+ response.messages +
							'</div>');

							// remove the mesages
							$(".alert-warning").delay(500).show(10, function() 
							{
								$(this).delay(2000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert	

							$(".form-control").remove();
							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');          					
						}
					} // /success 
				}); // /ajax
			}
				
			return false;
		});	
	}
	else if(divRequest == 'manusr') 
	{
		// top nav child bar 
		// top nav child bar 
		$('#topNavManageUser').addClass('active');
		
		$("#allusername").on('change',function(){
		$("#username").val($("#allusername option:selected").val());
		});
		
		
		// change username
		$("#changeUsernameForm").unbind('submit').bind('submit', function() {
			var form = $(this);

			$(".text-danger").remove();
			
			var username = $("#username").val();
			var allusername = $("#allusername").val();
			
			if(allusername == "") 
			{
				$("#allusername").after('<p class="text-danger">All username field is required</p>');
				$("#allusername").closest('.form-group').addClass('has-error');
			}
			else 
			{
				$(".text-danger").remove();
				$('.form-group').removeClass('has-error');	  	
			}
			if(username == "")
			{
				$("#username").after('<p class="text-danger">Username field is required</p>');
				$("#username").closest('.form-group').addClass('has-error');
			} 
			else 
			{
				$(".text-danger").remove();
				$('.form-group').removeClass('has-error');
			}

			if(username)
			{	
				$("#changeUsernameBtn").button('loading');

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) {

						$("#changeUsernameBtn").button('reset');
						// remove text-error 
						$(".text-danger").remove();
						// remove from-group error
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true)  {												
																	
							// shows a successful message after operation
							$('.changeUsenrameMessages').html('<div class="alert alert-success">'+
					'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
					'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				  '</div>');

							// remove the mesages
				  $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert	          					
							
						} else {
							// shows a successful message after operation
							$('.changeUsenrameMessages').html('<div class="alert alert-warning">'+
					'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
					'<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong> '+ response.messages +
				  '</div>');

							// remove the mesages
				  $(".alert-warning").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert	          					
						}
					} // /success 
				}); // /ajax
			}
				
			return false;
						function submitform()
					{
					var name=$('#allusername').val();
					$('#variable').val(name);   // set the value of name field to the hidden field
					$('form#changeUsernameForm').submit();   // submit the form
					}
		});	
		
		$("#changePasswordForm").unbind('submit').bind('submit', function()
		{

			var form = $(this);

			$(".text-danger").remove();

			var newPassword = $("#npassword").val();
			var conformPassword = $("#cpassword").val();

			if(newPassword == "" || conformPassword == "") 
			{
				if(newPassword == "") {
					$("#npassword").after('<p class="text-danger">The New Password field is required</p>');
					$("#npassword").closest('.form-group').addClass('has-error');
				} else {
					$("#npassword").closest('.form-group').removeClass('has-error');
					$(".text-danger").remove();
				}

				if(conformPassword == "") {
					$("#cpassword").after('<p class="text-danger">The Conform Password field is required</p>');
					$("#cpassword").closest('.form-group').addClass('has-error');
				} else {
					$("#cpassword").closest('.form-group').removeClass('has-error');
					$(".text-danger").remove();
				}
			}
			else 
			{
				$("#changePasswordBtn").button('loading');
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) {
						console.log(response);
						$("#changePasswordBtn").button('reset');
						$("#changePasswordForm")[0].reset();
						// remove text-error 
						$(".text-danger").remove();
						// remove from-group error
						$(".form-group").removeClass('has-error').removeClass('has-success');
						if(response.success == true) {
							$('.changePasswordMessages').html('<div class="alert alert-success">'+
					'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
					'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				  '</div>');

							// remove the mesages
				  $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert	    
						} else {

							$('.changePasswordMessages').html('<div class="alert alert-warning">'+
					'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
					'<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong> '+ response.messages +
				  '</div>');

							// remove the mesages
				  $(".alert-warning").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert	          	
						}
					} // /success function
				}); // /ajax function

			} // /else


			return false;
		});
			
	}	
});
		