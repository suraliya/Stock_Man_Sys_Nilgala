
$(document).ready(function() 
{
	// top bar active
	$('#navUserSettings').addClass('active');
	// top nav child bar 
	$('#topNavAddUser').addClass('active');
	
	$("#addUserbtn").unbind('submit').bind('submit', function() 
	{
		var form = $(this);
		var username = $("#userName").val();
		var usertype = $("#userType").val();
		var password = $("#password").val();
		var cpassword = $("#ConfirmPassword").val();

		if(username == "") 
		{
			$("#userName").after('<p class="text-danger">Username field is required</p>');
			$("#userName").closest('.form-group').addClass('has-error');
		}
		else 
		{
			$(".text-danger").remove();
			$('.form-group').removeClass('has-error');	  	
		}	
		if(usertype == "") 
		{
			$("#userType").after('<p class="text-danger">User Type field is required</p>');
			$("#userType").closest('.form-group').addClass('has-error');
		}
		else 
		{
			$(".text-danger").remove();
			$('.form-group').removeClass('has-error');	  	
		}	
		if(password == "") 
		{
			$("#password").after('<p class="text-danger">Password field is required</p>');
			$("#password").closest('.form-group').addClass('has-error');
		}
		else 
		{
			$(".text-danger").remove();
			$('.form-group').removeClass('has-error');	  	
		}	
		if(cpassword == "") 
		{
			$("#ConfirmPassword").after('<p class="text-danger">Confirm password field is required</p>');
			$("#ConfirmPassword").closest('.form-group').addClass('has-error');
		}
		else 
		{
			$(".text-danger").remove();
			$('.form-group').removeClass('has-error');
			$("#addUserbtn").button('loading');
			
			if(password == cpassword)
			{
				$.ajax({
					//url: form.attr('action'),
					url:"User.php",
					//type: form.attr('method'),
					method:"POST",
					data: form.serialize(),
					dataType: 'json',
					success:function(data) 
					{					

						$("#addUserbtn").button('reset');
						// remove text-error 
						$(".text-danger").remove();
						// remove from-group error
						$(".form-group").removeClass('has-error').removeClass('has-success');					
						$('#success_message').fadeIn().html(data);					
						
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
								$(this).delay(3000).hide(10, function() +
								{
									$(this).remove();
								});
							}); // /.alert					
						}
						else 
						{
							// shows a successful message after operation
							$('.messages').html('<div class="alert alert-warning">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong> '+ response.messages +
							'</div>');

							// remove the mesages
							$(".alert-warning").delay(500).show(10, function() 
							{
								$(this).delay(3000).hide(10, function() +
								{
									$(this).remove();
								});
							}); // /.alert	          					
						}
					} // /success 
				}); // /ajax
			}//error didnt mach
			else
			{
				$("#ConfirmPassword").after('<p class="text-danger">Passwords did not mach</p>');
				$("#ConfirmPassword").closest('.form-group').addClass('has-error');
			}
		}			
		return false;
	});
});