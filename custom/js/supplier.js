var managesupplierTable;

// fetch supplier 
$(document).ready(function() 
{
	// top nav bar 
	$('#navsupplier').addClass('active');
	// manage supplier data table
	managesupplierTable = $('#managesupplierTable').DataTable({
		'ajax': 'php_action/fetchSupplier.php',
		'order': []
	});

	// add supplier modal btn clicked
	$("#addSupplierModalBtn").unbind('click').bind('click', function()
	{
		// // supplier form reset
		$("#submitSupplierForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// submit supplier form
		$("#submitSupplierForm").unbind('submit').bind('submit', function()
		{	
		
			// remove the error text
			$(".text-danger").remove();
			// remove the form error
			$('.form-group').removeClass('has-error').removeClass('has-success');	
			
			var supplierFirstName = $("#supplierFirstName").val();
			var supplierLastName = $("#supplierLastName").val();
			var address1 = $("#address1").val();
			var address2 = $("#address2").val();
			var address3 = $("#address3").val();
			var nic = $("#nic").val();
			var supTp = $("#supTp").val();

			var name1 = 0;
			var name2 = 0;
			var add1 = 0;
			var add2 = 0;
			var add3 = 0;
			var ni = 0;
			var tell = 0;
			
			if(supplierFirstName == "") 
			{
				$("#supplierFirstName").after('<p class="text-danger">First Name field is required</p>');
				$('#supplierFirstName').closest('.form-group').addClass('has-error');
				name1 = 0;
			}
			else //  /^([a-zA-Z ]){3,100}$/   ^([a-zA-Z]{2,}\s[a-zA-z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)   /^[a-zA-Z_ ]*$/   (?=^.{3,30}$)^([A-Za-z][\s]?)+$
			{
				if (/(?=^.{3,30}$)^([A-Za-z][\s]?)+$/.test(supplierFirstName)) 
				{
				    // remov error text field
					$("#supplierFirstName").find('.text-danger').remove();
					// success out for form 
					$("#supplierFirstName").closest('.form-group').addClass('has-success');
					name1 = 1;
				}	// /else		
				else 
				{
				    
	            	$("#supplierFirstName").after('<p class="text-danger">First Name field is Invalid</p>');
					$('#supplierFirstName').closest('.form-group').addClass('has-error');
					name1 = 0;
				}
			}

			if(supplierLastName == "") 
			{
				$("#supplierLastName").after('<p class="text-danger">Last Name field is required</p>');
				$('#supplierLastName').closest('.form-group').addClass('has-error');
				name2 = 0;
			}
			else 
			{
				if (/(?=^.{3,30}$)^([A-Za-z][\s]?)+$/.test(supplierLastName)) 
				{
				    // remov error text field
					$("#supplierLastName").find('.text-danger').remove();
					// success out for form 
					$("#supplierLastName").closest('.form-group').addClass('has-success');
					name2 = 1;
				}	// /else		
				else 
				{
				    
	            	$("#supplierLastName").after('<p class="text-danger">Last Name field is Invalid</p>');
					$('#supplierLastName').closest('.form-group').addClass('has-error');
					name2 = 0;
				}
			}

			if(address1 == "") 
			{
				$("#address1").after('<p class="text-danger">Address Line 1 field is required</p>');
				$('#address1').closest('.form-group').addClass('has-error');
				add1 = 0;
			}
			else
			{
				if (/^[^'"]*$/.test(address1)) 
				{
				    // remov error text field
					$("#address1").find('.text-danger').remove();
					// success out for form 
					$("#address1").closest('.form-group').addClass('has-success');
					add1 = 1;
				}	// /else		
				else 
				{
				    
	            	$("#address1").after('<p class="text-danger">Address Line 1 field is Invalid</p>');
					$('#address1').closest('.form-group').addClass('has-error');
					add1 = 0;
				}
			}

			if(address2 == "") 
			{
				$("#address2").after('<p class="text-danger">Address Line 2 field is required</p>');
				$('#address2').closest('.form-group').addClass('has-error');
				add2 = 0;
			}
			else
			{
				if (/^[^'"]*$/.test(address2)) 
				{
				    // remov error text field
					$("#address2").find('.text-danger').remove();
					// success out for form 
					$("#address2").closest('.form-group').addClass('has-success');
					add2 = 1;
				}	// /else		
				else 
				{
				    
	            	$("#address2").after('<p class="text-danger">Address Line 2 field is Invalid</p>');
					$('#address2').closest('.form-group').addClass('has-error');
					add2 = 0;
				}
			}

			if(address3 == "") 
			{
				$("#address3").after('<p class="text-danger">Address Line 3 field is required</p>');
				$('#address3').closest('.form-group').addClass('has-error');
				add3 = 0;
			}
			else
			{
				if (/^[^'"]*$/.test(address3)) 
				{
				    // remov error text field
					$("#address3").find('.text-danger').remove();
					// success out for form 
					$("#address3").closest('.form-group').addClass('has-success');
					add3 = 1;
				}	// /else		
				else 
				{
				    
	            	$("#address3").after('<p class="text-danger">Address Line 3 field is Invalid</p>');
					$('#address3').closest('.form-group').addClass('has-error');
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
					ni = 0;
				}
			}	
			
			if(supTp == "") 
			{
				$("#supTp").after('<p class="text-danger">Contact NO field is required</p>');
				$('#supTp').closest('.form-group').addClass('has-error');
				tell = 0;
			}
			else
			{
				if (/^\d{10}$/.test(supTp)) 
				{
				    // remov error text field
					$("#supTp").find('.text-danger').remove();
					// success out for form 
					$("#supTp").closest('.form-group').addClass('has-success');
					tell = 1;
				}	// /else		
				else 
				{
				    
	            	$("#supTp").after('<p class="text-danger">Contact NO field is Invalid</p>');
					$('#supTp').closest('.form-group').addClass('has-error');
					tell = 0;
				}
			}	

			if(name1 == 1 && name2 == 1 & tell == 1 && ni == 1 && add1 == 1 && add2 == 1 && add3 == 1) 
			{				
				$("#createsupplierBtn").button('loading');

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
							$("#createsupplierBtn").button('reset');
							
							$("#submitSupplierForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-supplier-messages').html('<div class="alert alert-success">'+
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
							managesupplierTable.ajax.reload(null, true);

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');

						} // /if response.success						
					} // /success function
				}); // /ajax function
			} // /if validation is ok 					

			return false;
		}); // /submit supplier form

	}); // /add supplier modal btn clicked
	

	// remove supplier 	

}); // document.ready fucntion

// edit supplier 
function editsupplier(supplierID = null) 
{
	if(supplierID) 
	{
		$("#supplierID").remove();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedSupplier.php',
			type: 'post',
			data: {supplierID: supplierID},
			dataType: 'json',
			success:function(response) 
			{		
			// alert(response.supplier_image);
				// modal spinner
				$('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');				
				// supplier id 
				$(".editsupplierFooter").append('<input type="hidden" name="supplierID" id="supplierID" value="'+response.supID+'" />');				
				$(".editsupplierPhotoFooter").append('<input type="hidden" name="supplierID" id="supplierID" value="'+response.supID+'" />');				
				// first name
				$("#editsupplierFirstName").val(response.fname);
				// last name
				$("#editsupplierLastName").val(response.lname);
				// address1
				$("#editaddress1").val(response.address1);
				// address2
				$("#editaddress2").val(response.address2);
				// address3
				$("#editaddress3").val(response.address3);
				// nic
				$("#editnic").val(response.supNIC);
				// brand name
				$("#editsupTp").val(response.supTp);
				// status
				//$("#editsupplierStatus").val(response.active);

				// update the supplier data function
				$("#editsuppliertForm").unbind('submit').bind('submit', function() 
				{
					
					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$(".form-group").removeClass('has-error').removeClass('has-success');
					
					
					// form validation					
					var editsupplierFirstName = $("#editsupplierFirstName").val();
					var editsupplierLastName = $("#editsupplierLastName").val();
					var editaddress1 = $("#editaddress1").val();
					var editaddress2 = $("#editaddress2").val();
					var editaddress3 = $("#editaddress3").val();
					var nic = $("#editnic").val();
					var supTp = $("#editsupTp").val();
					//var email = $("#editemail").val();								
						
					var ename1 = 0;
					var ename2 = 0;
					var eadd1 = 0;
					var eadd2 = 0;
					var eadd3 = 0;
					var eni = 0;
					var etell = 0;
			

					if(editsupplierFirstName == "") 
					{
						$("#editsupplierFirstName").after('<p class="text-danger">First Name field is required</p>');
						$('#editsupplierFirstName').closest('.form-group').addClass('has-error');
						ename1 = 0;
					}
					else 
					{
						if (/(?=^.{3,30}$)^([A-Za-z][\s]?)+$/.test(editsupplierFirstName)) 
						{
							// remov error text field
							$("#editsupplierFirstName").find('.text-danger').remove();
							// success out for form 
							$("#editsupplierFirstName").closest('.form-group').addClass('has-success');
							ename1 = 1;
						}	// /else		
						else 
						{
							
							$("#editsupplierFirstName").after('<p class="text-danger">First Name field is Invalid</p>');
							$('#editsupplierFirstName').closest('.form-group').addClass('has-error');
							ename1 = 0;
						}
					}

					if(editsupplierLastName == "") 
					{
						$("#editsupplierLastName").after('<p class="text-danger">Last Name field is required</p>');
						$('#editsupplierLastName').closest('.form-group').addClass('has-error');
						ename2 = 0;
					}
					else 
					{
						if (/(?=^.{3,30}$)^([A-Za-z][\s]?)+$/.test(editsupplierLastName)) 
						{
							// remov error text field
							$("#editsupplierLastName").find('.text-danger').remove();
							// success out for form 
							$("#editsupplierLastName").closest('.form-group').addClass('has-success');
							ename2 = 1;
						}	// /else		
						else 
						{
							
							$("#editsupplierLastName").after('<p class="text-danger">Last Name field is Invalid</p>');
							$('#editsupplierLastName').closest('.form-group').addClass('has-error');
							ename2 = 0;
						}
					}

					if(editaddress1 == "") 
					{
						$("#editaddress1").after('<p class="text-danger">Address Line 1 field is required</p>');
						$('#editaddress1').closest('.form-group').addClass('has-error');
						eadd1 = 0;
					}
					else
					{
						if (/^[^'"]*$/.test(editaddress1)) 
						{
							// remov error text field
							$("#editaddress1").find('.text-danger').remove();
							// success out for form 
							$("#editaddress1").closest('.form-group').addClass('has-success');
							eadd1 = 1;
						}	// /else		
						else 
						{
							
							$("#editaddress1").after('<p class="text-danger">Address Line 1 field is Invalid</p>');
							$('#editaddress1').closest('.form-group').addClass('has-error');
							eadd1 = 0;
						}
					}

					if(editaddress2 == "") 
					{
						$("#editaddress2").after('<p class="text-danger">Address Line 2 field is required</p>');
						$('#editaddress2').closest('.form-group').addClass('has-error');
						eadd2 = 0;
					}
					else
					{
						if (/^[^'"]*$/.test(editaddress2)) 
						{
							// remov error text field
							$("#editaddress2").find('.text-danger').remove();
							// success out for form 
							$("#editaddress2").closest('.form-group').addClass('has-success');
							eadd2 = 1;
						}	// /else		
						else 
						{
							
							$("#editaddress2").after('<p class="text-danger">Address Line 2 field is Invalid</p>');
							$('#editaddress2').closest('.form-group').addClass('has-error');
							eadd2 = 0;
						}
					}

					if(editaddress3 == "") 
					{
						$("#editaddress3").after('<p class="text-danger">Address Line 3 field is required</p>');
						$('#editaddress3').closest('.form-group').addClass('has-error');
						eadd3 = 0;
					}
					else
					{
						if (/^[^'"]*$/.test(editaddress3)) 
						{
							// remov error text field
							$("#editaddress3").find('.text-danger').remove();
							// success out for form 
							$("#editaddress3").closest('.form-group').addClass('has-success');
							eadd3 = 1;
						}	// /else		
						else 
						{
							
							$("#editaddress3").after('<p class="text-danger">Address Line 3 field is Invalid</p>');
							$('#editaddress3').closest('.form-group').addClass('has-error');
							eadd3 = 0;
						}
					}
				
					if(nic == "") 
					{
						$("#editnic").after('<p class="text-danger">NIC field is required</p>');
						$('#editnic').closest('.form-group').addClass('has-error');
						eni = 0;
					}
					else
					{
						if (/^\d{9}[V|v|X|x]$/.test(nic)) 
						{
							// remov error text field
							$("#editnic").find('.text-danger').remove();
							// success out for form 
							$("#editnic").closest('.form-group').addClass('has-success');
							eni = 1;
						}	// /else		
						else 
						{
							
							$("#editnic").after('<p class="text-danger">Invalid NIC Number</p>');
							$('#editnic').closest('.form-group').addClass('has-error');
							eni = 0;
						}
					}	
					
					if(supTp == "") 
					{
						$("#editsupTp").after('<p class="text-danger">Contact NO field is required</p>');
						$('#editsupTp').closest('.form-group').addClass('has-error');
						etell = 0;
					}
					else
					{
						if (/^\d{11}$/.test(supTp)) 
						{
							// remov error text field
							$("#editsupTp").find('.text-danger').remove();
							// success out for form 
							$("#editsupTp").closest('.form-group').addClass('has-success');
							etell = 1;
						}	// /else		
						else 
						{
							
							$("#editsupTp").after('<p class="text-danger">Contact NO field is Invalid! (Ex : 94XXXXXXXXX)</p>');
							$('#editsupTp').closest('.form-group').addClass('has-error');
							etell = 0;
						}
					}	
					
					if(ename1 == 1 && ename2 == 1 && eadd1 == 1 && eadd2 == 1 && eadd3 == 1 && etell == 1 && eni == 1) 
					{
						// submit loading button
						$("#editsupplierBtn").button('loading');

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
								console.log(response);
								if(response.success == true) 
								{
									// submit loading button
									$("#editsupplierBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
										$('#edit-supplier-messages').html('<div class="alert alert-success">'+
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
									managesupplierTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // update the supplier data function				

			} // /success function
		}); // /ajax to fetch supplier image

				
	} 
	else 
	{
		alert('error please refresh the page');
	}
} // /edit supplier function

// remove supplier 
function removesupplier(supplierID = null) 
{
	if(supplierID) 
	{
		// remove supplier button clicked
		$("#removesupplierBtn").unbind('click').bind('click', function() 
		{
			// loading remove button
			$("#removesupplierBtn").button('loading');
			$.ajax({
				url			: 'php_action/removeSupplier.php',
				type		: 'post',
				data		: {supplierID: supplierID},
				dataType	: 'json',
				success		:function(response) {
					// loading remove button
					$("#removesupplierBtn").button('reset');
					if(response.success == true) {
						// remove supplier modal
						$("#removesupplierModal").modal('hide');

						// update the supplier table
						managesupplierTable.ajax.reload(null, false);

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
						$(".removesupplierMessages").html('<div class="alert alert-success">'+
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
			}); // /ajax fucntion to remove the supplier
			return false;
		}); // /remove supplier btn clicked
	} // /if supplierid
} // /remove supplier function
