$(document).ready(function() {
	// main menu
	$("#navSMS").addClass('active');
	
	$("#userName").on('change',function(){
    $("#num").val($("#userName option:selected").attr("name"));
	});
	
	// create user
	$("#sendSMSForm").unbind('submit').bind('submit', function()
	{
		

		var userType = $("#userType").val();
		var username = $("#userName").val();
		var message = $("#mess").val();
		
		if(userType == "" || username == "" || mess == "" ) 
		{
			if(userType == "") 
			{
				$("#userType").after('<p class="text-danger">User Type field is required</p>');
				$("#userType").closest('.form-group').addClass('has-error');
			}
			else 
			{
				$(".text-danger").remove();
				$('.form-group').removeClass('has-error');	  	
			}
			if(username == "")
			{
				$("#userName").after('<p class="text-danger">Telephone no field is required</p>');
				$("#userName").closest('.form-group').addClass('has-error');
			} 
			else 
			{
				$(".text-danger").remove();
				$('.form-group').removeClass('has-error');
			}
			if(message == "") {
				$("#mess").after('<p class="text-danger">The New Password field is required</p>');
				$("#mess").closest('.form-group').addClass('has-error');
			}
			else 
			{
				$("#mess").closest('.form-group').removeClass('has-error');
				$(".text-danger").remove();
			}

		}
		else
		{
			var form = $(this);
			$("#sendbtn").button('loading');

					$.ajax({
						url : form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),					
						dataType: 'json',
						success:function(response) 
						{
							console.log(response);
							// reset button
							$("#sendbtn").button('reset');
							
							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if(response.success == true) 
							{
								
								// create order button
								$(".sendMessages").html('<div class="alert alert-success">'+
								'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
								'</div>');
									
						// remove the mesages
						$(".alert-warning").delay(500).show(10, function() 
						{
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	
						
								$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);

								// disabled te modal footer button
								$(".submitButtonFooter").addClass('div-hide');
								// remove the product row
								$(".removeProductRowBtn").addClass('div-hide');          					
						
					}
					else
					{
						// shows a successful message after operation
						$('.sendMessages').html('<div class="alert alert-warning">'+
						'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
						'<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong> '+ response.messages +
						'</div>');

						// remove the mesages
						$(".alert-warning").delay(500).show(10, function() 
						{
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

}); // /document