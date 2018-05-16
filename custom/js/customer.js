var manageCustomerTable;

// fetch supplier 
$(document).ready(function() 
{
	// top nav bar 
	$('#navCustomer').addClass('active');
	// manage supplier data table
	manageCustomerTable = $('#manageCustomerTable').DataTable({
		'ajax': 'php_action/fetchCustomer.php',
		'order': []
	});

	// add supplier modal btn clicked
	$("#addCustomerBtn").unbind('click').bind('click', function()
	{
		// // supplier form reset
		$("#submitCustomerForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// submit supplier form
		$("#submitCustomerForm").unbind('submit').bind('submit', function()
		{	
		
			// remove the error text
			$(".text-danger").remove();
			// remove the form error
			$('.form-group').removeClass('has-error').removeClass('has-success');	
			
			var customerFirstName = $("#customerFirstName").val();
			var customerLastName = $("#customerLastName").val();
			var addressLine1 = $("#addressLine1").val();
			var addressLine2 = $("#addressLine2").val();
			var addressLine3 = $("#addressLine3").val();
			var nic = $("#nic").val();
			var tp = $("#contact").val();

			var name1 = 0;
			var name2 = 0;
			var add1 = 0;
			var add2 = 0;
			var add3 = 0;
			var ni = 0;
			var tell = 0;
			
			if(customerFirstName == "") 
			{
				$("#customerFirstName").after('<p class="text-danger">First Name field is required</p>');
				$('#customerFirstName').closest('.form-group').addClass('has-error');
				name1 = 0;
			}
			else //  /^([a-zA-Z ]){3,100}$/   ^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)   /^[a-zA-Z_ ]*$/   (?=^.{3,30}$)^([A-Za-z][\s]?)+$
			{
				if (/(?=^.{3,30}$)^([A-Za-z][\s]?)+$/.test(customerFirstName)) 
				{
				    // remov error text field
					$("#customerFirstName").find('.text-danger').remove();
					// success out for form 
					$("#customerFirstName").closest('.form-group').addClass('has-success');
					name1 = 1;
				}	// /else		
				else 
				{
				    
	            	$("#customerFirstName").after('<p class="text-danger">First Name field is Invalid</p>');
					$('#customerFirstName').closest('.form-group').addClass('has-error');
					name1 = 0;
				}
			}

			if(customerLastName == "") 
			{
				$("#customerLastName").after('<p class="text-danger">Last Name field is required</p>');
				$('#customerLastName').closest('.form-group').addClass('has-error');
				name2 = 0;
			}
			else 
			{
				if (/(?=^.{3,30}$)^([A-Za-z][\s]?)+$/.test(customerLastName)) 
				{
				    // remov error text field
					$("#customerLastName").find('.text-danger').remove();
					// success out for form 
					$("#customerLastName").closest('.form-group').addClass('has-success');
					name2 = 1;
				}	// /else		
				else 
				{
				    
	            	$("#customerLastName").after('<p class="text-danger">Last Name field is Invalid</p>');
					$('#customerLastName').closest('.form-group').addClass('has-error');
					name2 = 0;
				}
			}

			if(addressLine1 == "") 
			{
				$("#addressLine1").after('<p class="text-danger">Address Line 1 field is required</p>');
				$('#addressLine1').closest('.form-group').addClass('has-error');
				add1 = 0;
			}
			else
			{
				if (/^[^'"]*$/.test(addressLine1)) 
				{
				    // remov error text field
					$("#addressLine1").find('.text-danger').remove();
					// success out for form 
					$("#addressLine1").closest('.form-group').addClass('has-success');
					add1 = 1;
				}	// /else		
				else 
				{
				    
	            	$("#addressLine1").after('<p class="text-danger">Address Line 1 field is Invalid</p>');
					$('#addressLine1').closest('.form-group').addClass('has-error');
					add1 = 0;
				}
			}

			if(addressLine2 == "") 
			{
				$("#addressLine2").after('<p class="text-danger">Address Line 2 field is required</p>');
				$('#addressLine2').closest('.form-group').addClass('has-error');
				add2 = 0;
			}
			else
			{
				if (/^[^'"]*$/.test(addressLine2)) 
				{
				    // remov error text field
					$("#addressLine2").find('.text-danger').remove();
					// success out for form 
					$("#addressLine2").closest('.form-group').addClass('has-success');
					add2 = 1;
				}	// /else		
				else 
				{
				    
	            	$("#addressLine2").after('<p class="text-danger">Address Line 2 field is Invalid</p>');
					$('#addressLine2').closest('.form-group').addClass('has-error');
					add2 = 0;
				}
			}

			if(addressLine3 == "") 
			{
				$("#addressLine3").after('<p class="text-danger">Address Line 3 field is required</p>');
				$('#addressLine3').closest('.form-group').addClass('has-error');
				add3 = 0;
			}
			else
			{
				if (/^[^'"]*$/.test(addressLine3)) 
				{
				    // remov error text field
					$("#addressLine3").find('.text-danger').remove();
					// success out for form 
					$("#addressLine3").closest('.form-group').addClass('has-success');
					add3 = 1;
				}	// /else		
				else 
				{
				    
	            	$("#addressLine3").after('<p class="text-danger">Address Line 3 field is Invalid</p>');
					$('#addressLine3').closest('.form-group').addClass('has-error');
					add3 = 0;
				}
			}
		
			if(nic == "") 
			{
				$("#nic").after('<p class="text-danger">NIC field is required</p>');
				$('#nic').closest('.form-group').addClass('has-error');
				ni = 0;
			}
			else
			{
				if (/^\d{9}[V|v|X|x]$/.test(nic)) 
				{
				    // remov error text field
					$("#nic").find('.text-danger').remove();
					// success out for form 
					$("#nic").closest('.form-group').addClass('has-success');
					ni = 1;
				}	// /else		
				else 
				{
				    
	            	$("#nic").after('<p class="text-danger">Invalid NIC Number</p>');
					$('#nic').closest('.form-group').addClass('has-error');
					eni = 0;
				}
			}	
			
			if(tp == "") 
			{
				$("#contact").after('<p class="text-danger">Contact NO field is required</p>');
				$('#contact').closest('.form-group').addClass('has-error');
				tell = 0;
			}
			else
			{
				if (/^\d{11}$/.test(tp)) 
				{
				    // remov error text field
					$("#contact").find('.text-danger').remove();
					// success out for form 
					$("#contact").closest('.form-group').addClass('has-success');
					tell = 1;
				}	// /else		
				else 
				{
				    
	            	$("#contact").after('<p class="text-danger">Contact No field is Invalid! (Ex : 94XXXXXXXXX) </p>');
				$('#contact').closest('.form-group').addClass('has-error');
					tell = 0;
				}
			}	

			if(tell == 1 && ni == 1 && add1 == 1 && add2 == 1 && add3 == 1 && name1 == 1 && name2 == 1) 
			{				
				$("#createCustomerBtn").button('loading');

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url 		: form.attr('action'),
					type		: form.attr('method'),
					data		: formData,
					dataType	: 'json',
					cache		: false,
					contentType	: false,
					processData	: false,
					success		: function(response) 
					{

						if(response.success == true) 
						{
							// submit loading button
							$("#createCustomerBtn").button('reset');
							
							$("#submitCustomerForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-customer-messages').html('<div class="alert alert-success">'+
								'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							  '</div>');

							// remove the mesages
		          			$(".alert-success").delay(500).show(10, function() 
							{
								$(this).delay(3000).hide(10, function() 
								{
									$(this).remove();
								});
							}); // /.alert

		          			// reload the manage student table
							manageCustomerTable.ajax.reload(null, true);

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');

						} // /if response.success	
						else
						{
							// submit loading button
							$("#createCustomerBtn").button('reset');
							
							$("#submitCustomerForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-customer-messages').html('<div class="alert alert-warning">'+
								'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							  '</div>');

							// remove the mesages
		          			$(".alert-success").delay(500).show(10, function() 
							{
								$(this).delay(3000).hide(10, function() 
								{
									$(this).remove();
								});
							}); // /.alert

		          			// reload the manage student table
							manageCustomerTable.ajax.reload(null, true);

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');

						}					
					} // /success function
				}); // /ajax function
			} // /if validation is ok 					

			return false;
		}); // /submit supplier form

	}); // /add supplier modal btn clicked
	

	// remove supplier 	

}); // document.ready fucntion


function editCustomer(customerID = null) 
{

	if(customerID) 
	{
		$("#customerID").remove();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedCustomer.php',
			type: 'post',
			data: {customerID: customerID},
			dataType: 'json',
			success:function(response) 
			{					
				// modal spinner
				$('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');				
				// customer id 
				$(".editCustomerFooter").append('<input type="hidden" name="customerID" id="customerID" value="'+response.cusID+'" />');				
				$(".editCustomerPhotoFooter").append('<input type="hidden" name="customerID" id="customerID" value="'+response.cusID+'" />');					
				// first name
				$("#editCustomerFirstName").val(response.fname);
				// last name
				$("#editCustomerLastName").val(response.lname);
				// address1
				$("#editAddress1").val(response.address1);
				// address2
				$("#editAddress2").val(response.address2);
				// address3
				$("#editAddress3").val(response.address3);
				// nic
				$("#editNIC").val(response.cusNIC);
				// contact no
				$("#editContact").val(response.cusTP);	

				// update the customer data function
				$("#editCustomerForm").unbind('submit').bind('submit', function() 
				{
					
					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$(".form-group").removeClass('has-error').removeClass('has-success');		
					
					// form validation					
					var editCustomerFirstName = $("#editCustomerFirstName").val();
					var editCustomerLastName = $("#editCustomerLastName").val();
					var editAddress1 = $("#editAddress1").val();
					var editAddress2 = $("#editAddress2").val();
					var editAddress3 = $("#editAddress3").val();
					var nic = $("#editNIC").val();
					var editContact = $("#editContact").val();
					
					var ename1 = 0;
					var ename2 = 0;
					var eadd1 = 0;
					var eadd2 = 0;
					var eadd3 = 0;
					var eni = 0;
					var etell = 0;

					if(editCustomerFirstName == "") 
					{
						$("#editCustomerFirstName").after('<p class="text-danger">First Name field is required</p>');
						$('#editCustomerFirstName').closest('.form-group').addClass('has-error');
						ename1 = 0;
					}
					else 
					{
						if (/(?=^.{3,30}$)^([A-Za-z][\s]?)+$/.test(editCustomerFirstName)) 
						{
							// remov error text field
							$("#editCustomerFirstName").find('.text-danger').remove();
							// success out for form 
							$("#editCustomerFirstName").closest('.form-group').addClass('has-success');
							ename1 = 1;
						}	// /else		
						else 
						{
							
							$("#editCustomerFirstName").after('<p class="text-danger">First Name field is Invalid</p>');
							$('#editCustomerFirstName').closest('.form-group').addClass('has-error');
							ename1 = 0;
						}
					}

					if(editCustomerLastName == "") 
					{
						$("#editCustomerLastName").after('<p class="text-danger">Last Name field is required</p>');
						$('#editCustomerLastName').closest('.form-group').addClass('has-error');
						ename2 = 0;
					}
					else 
					{
						if (/(?=^.{3,30}$)^([A-Za-z][\s]?)+$/.test(editCustomerLastName)) 
						{
							// remov error text field
							$("#editCustomerLastName").find('.text-danger').remove();
							// success out for form 
							$("#editCustomerLastName").closest('.form-group').addClass('has-success');
							ename2 = 1;
						}	// /else		
						else 
						{
							
							$("#editCustomerLastName").after('<p class="text-danger">Last Name field is Invalid</p>');
							$('#editCustomerLastName').closest('.form-group').addClass('has-error');
							ename2 = 0;
						}
					}

					if(editAddress1 == "") 
					{
						$("#editAddress1").after('<p class="text-danger">Address field 1 is required</p>');
						$('#editAddress1').closest('.form-group').addClass('has-error');
						eadd1 = 0;
					}
					else
					{
						if (/^[^'"]*$/.test(editAddress1)) 
						{
							// remov error text field
							$("#editAddress1").find('.text-danger').remove();
							// success out for form 
							$("#editAddress1").closest('.form-group').addClass('has-success');
							eadd1 = 1;
						}	// /else		
						else 
						{
							
							$("#editAddress1").after('<p class="text-danger">Address field 1 is Invalid</p>');
							$('#editAddress1').closest('.form-group').addClass('has-error');
							eadd1 = 0;
						}
					}

					if(editAddress2 == "") 
					{
						$("#editAddress2").after('<p class="text-danger">Address field 2 is required</p>');
						$('#editAddress2').closest('.form-group').addClass('has-error');
						eadd2 = 0;
					}
					else
					{
						if (/^[^'"]*$/.test(editAddress2)) 
						{
							// remov error text field
							$("#editAddress2").find('.text-danger').remove();
							// success out for form 
							$("#editAddress2").closest('.form-group').addClass('has-success');
							eadd2 = 1;
						}	// /else		
						else 
						{
							
							$("#editAddress2").after('<p class="text-danger">Address field 2 is Invalid</p>');
							$('#editAddress2').closest('.form-group').addClass('has-error');
							eadd2 = 0;
						}
					}

					if(editAddress3 == "") 
					{
						$("#editAddress3").after('<p class="text-danger">Address field 3 is required</p>');
						$('#editAddress3').closest('.form-group').addClass('has-error');
						eadd3 = 0;
					}
					else
					{
						if (/^[^'"]*$/.test(editAddress3)) 
						{
							// remov error text field
							$("#editAddress3").find('.text-danger').remove();
							// success out for form 
							$("#editAddress3").closest('.form-group').addClass('has-success');
							eadd3 = 1;
						}	// /else		
						else 
						{
							
							$("#editAddress3").after('<p class="text-danger">Address field 3 is Invalid</p>');
							$('#editAddress3').closest('.form-group').addClass('has-error');
							eadd3 = 0;
						}
					}
				
					if(nic == "") 
					{
						$("#editNIC").after('<p class="text-danger">NIC field is required</p>');
						$('#editNIC').closest('.form-group').addClass('has-error');
						eni = 0;
					}
					else
					{
						if (/^\d{9}[V|v|X|x]$/.test(nic)) 
						{
							// remov error text field
							$("#editNIC").find('.text-danger').remove();
							// success out for form 
							$("#editNIC").closest('.form-group').addClass('has-success');
							eni = 1;
						}	// /else		
						else 
						{
							
							$("#editNIC").after('<p class="text-danger">NIC field is required</p>');
							$('#editNIC').closest('.form-group').addClass('has-error');
							eni = 0;
						}
					}	
					
					if(editContact == "") 
					{
						$("#editContact").after('<p class="text-danger">Contact No field is required</p>');
						$('#editContact').closest('.form-group').addClass('has-error');
						etell = 0;
					}
					else
					{
						if (/^\d{11}$/.test(editContact)) //  
						{
							// remov error text field
							$("#editContact").find('.text-danger').remove();
							// success out for form 
							$("#editContact").closest('.form-group').addClass('has-success');
							etell = 1;
						}	// /else		
						else 
						{
							
							$("#editContact").after('<p class="text-danger">Contact No field is Invalid! (Ex : 94XXXXXXXXX)</p>');
							$('#editContact').closest('.form-group').addClass('has-error');
							etell = 0;
						}
					}
					
					if(ename1 == 1 && ename2 == 1 && eadd1 == 1 && eadd2 == 1 && eadd3 == 1 && eni == 1 && etell == 1) 
					{
						// submit loading button
						$("#editCustomerBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url			: form.attr('action'),
							type 		: form.attr('method'),
							data 		: formData,
							dataType	: 'json',
							cache		: false,
							contentType	: false,
							processData	: false,
							success 	: function(response) 
							{
								console.log(response);
								if(response.success == true) 
								{
									// submit loading button
									$("#editCustomerBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-customer-messages').html('<div class="alert alert-success">'+
										'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
										'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
										'</div>');

									// remove the mesages
									$(".alert-success").delay(500).show(10, function() 
									{
										$(this).delay(3000).hide(10, function() 
										{
											$(this).remove();
										});
									}); // /.alert

									// reload the manage customer table
									manageCustomerTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								else
								{
									// submit loading button
									$("#editCustomerBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-customer-messages').html('<div class="alert alert-warning">'+
										'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
										'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
										'</div>');

									// remove the mesages
									$(".alert-success").delay(500).show(10, function() 
									{
										$(this).delay(3000).hide(10, function() 
										{
											$(this).remove();
										});
									}); // /.alert

									// reload the manage customer table
									manageCustomerTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');
								}
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // update the customer data function				

			} // /success function
		}); // /ajax to fetch customer image				
	} 
	else 
	{
		alert('error please refresh the page');
	}
} // /edit customer function


// remove customer 
function removeCustomer(customerID = null) 
{
	if(customerID) 
	{
		// remove customer button clicked
		$("#removeCustomerBtn").unbind('click').bind('click', function() 
		{
			// loading remove button
			$("#removeCustomerBtn").button('loading');
			$.ajax({
				url 	: 'php_action/removeCustomer.php',
				type	: 'post',
				data	: {customerID: customerID},
				dataType: 'json',
				success	:function(response) 
				{
					// loading remove button
					$("#removeCustomerBtn").button('reset');
					if(response.success == true) 
					{
						// remove customer modal
						$("#removeCustomerModal").modal('hide');

						// update the customer table
						manageCustomerTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
						'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
						'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
						'</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function() 
						{
							$(this).delay(3000).hide(10, function() 
							{
								$(this).remove();
							});
						}); // /.alert
					} 
					else 
					{
						// remove success messages
						$(".removeCustomerMessages").html('<div class="alert alert-success">'+
						'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
						'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
						'</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function() 
						{
							$(this).delay(3000).hide(10, function() 
							{
								$(this).remove();
							});
						}); // /.alert

					} // /error
				} // /success function
			}); // /ajax fucntion to remove the customer
			return false;
		}); // /remove customer btn clicked
	} // /if customerID
} // /remove customer function
