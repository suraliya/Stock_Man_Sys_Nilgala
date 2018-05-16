$(document).ready(function() {
	// main menu
	$("#navSetting").addClass('active');
	// sub manin
	$("#topNavSetting").addClass('active');

	// change username
	$("#changeUsernameForm").unbind('submit').bind('submit', function() {
		
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$(".form-group").removeClass('has-error').removeClass('has-success');	
					
		var form = $(this);
		var username = $("#username").val();
		var temp1 = 0;

		if(username == "") 
			{
				$("#username").after('<p class="text-danger">Username Name field is required</p>');
				$('#username').closest('.form-group').addClass('has-error');
				temp1 = 0;
			}
			else 
			{
				if (/^([a-zA-Z_-]){3,100}$/.test(username)) 
				{
					temp1 = 1;
				    // remov error text field
					$("#username").find('.text-danger').remove();
					// success out for form 
					$("#username").closest('.form-group').addClass('has-success');
						  	
				}	// /else		
				else 
				{
				    
	            	$("#username").after('<p class="text-danger">Username Name field is Invalid</p>');
					$('#username').closest('.form-group').addClass('has-error');
					temp1 = 0;
				}
			}

		/*if(username == "") 
		{
			$("#username").after('<p class="text-danger">Username field is required</p>');
			$("#username").closest('.form-group').addClass('has-error');
		}
		else 
		{

			$(".text-danger").remove();
			$('.form-group').removeClass('has-error');

			$("#changeUsernameBtn").button('loading');*/

		if(temp1 == 1)
		{	
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
	});

	$("#changePasswordForm").unbind('submit').bind('submit', function() {

		var form = $(this);

		$(".text-danger").remove();

		var currentPassword = $("#password").val();
		var newPassword = $("#npassword").val();
		var conformPassword = $("#cpassword").val();
		var npass = 0;


		/*if(currentPassword == "" || newPassword == "" || conformPassword == "") 
		{*/
			if(currentPassword == "") 
			{
				$("#password").after('<p class="text-danger">The Current Password field is required</p>');
				$("#password").closest('.form-group').addClass('has-error');
			} 
			else 
			{
				$("#password").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}

			/*if(newPassword == "")
			{
				$("#npassword").after('<p class="text-danger">The New Password field is required</p>');
				$("#npassword").closest('.form-group').addClass('has-error');

			}
			else
			{
				$("#npassword").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}*/
			if(conformPassword == "") 
			{
				$("#cpassword").after('<p class="text-danger">The Conform Password field is required</p>');
				$("#cpassword").closest('.form-group').addClass('has-error');
			} 
			else 
			{
				$("#cpassword").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}

			if(newPassword == "") 
				{

					$("#npassword").after('<p class="text-danger">The New Password field is required</p>');
					$("#npassword").closest('.form-group').addClass('has-error');
					npass = 1;					
				}
				else if(newPassword.length < 5) 
				{
				    $("#npassword").after('<p class="text-danger">Your password must be at least 8 characters</p>');
					$("#npassword").closest('.form-group').addClass('has-error');
					npass = 2;
				    // errors.push("Your password must be at least 5 characters");
				}
				else if (newPassword.search(/[a-z]/i) < 0) 
				{
				    $("#npassword").after('<p class="text-danger">Your password must contain at least one letter</p>');
					$("#npassword").closest('.form-group').addClass('has-error');
					npass = 3;
				    //errors.push("Your password must contain at least one letter."); 
				}
				else if (newPassword.search(/[0-9]/) < 0) 
				{
				    $("#npassword").after('<p class="text-danger">Your password must contain at least one digit</p>');
					$("#npassword").closest('.form-group').addClass('has-error');
					npass = 4;
				    //errors.push("Your password must contain at least one digit.");
				}
				else
				{
					// remov error text field
					$("#npassword").find('.text-danger').remove();
					// success out for form 
					$("#npassword").closest('.form-group').addClass('has-success');
					npass = 5;	  
				/*}

			
		} 
		else if(npass == 5)
		{*/
			$(".form-group").removeClass('has-error');
			$(".text-danger").remove();

			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					console.log(response);
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
}); // /document