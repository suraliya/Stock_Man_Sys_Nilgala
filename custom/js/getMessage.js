

export function getSuccessMsg()
{
	// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
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
}	

export function getErrorMsg()
{
	// remove success messages
						$(".remove-messages").html('<div class="alert alert-warning">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-remove-sign"></i></strong> '+ response.messages +
							'</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function() 
						{
							$(this).delay(2000).hide(10, function() 
							{
								$(this).remove();
							});
						}); // /.alert
}