var rmCategoryTable;

$(document).ready(function() 
{
	// top bar active
	$('#navStock').addClass('active');
	// top nav child bar 
	$('#topNavRMStock').addClass('active');	
	
	// manage brand table
	rmCategoryTable = $("#rmCategoryTable").DataTable({
		'ajax': 'php_action/fetchRMStock.php',
		'order': []		
	});
	
	
	$("#addNewRMCategoryBtn").unbind('click').bind('click', function() 
	{	
		// add RM Catogary form reset
		$("#addNewRMCategoryForm")[0].reset();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// add RM category form function
		$("#addNewRMCategoryForm").unbind('submit').bind('submit', function() 
		{		
		
			// remove the error text
			$(".text-danger").remove();
			// remove the form error
			$(".form-group").removeClass('has-error').removeClass('has-success');
		
			var categoryName = $("#categoryName").val();
			var categoryRate = $("#categoryRate").val();
			var temp = 0;
			
			if(categoryName == "") 
			{
				$("#categoryName").after('<p class="text-danger">Category Name field is required</p>');
				$('#categoryName').closest('.form-group').addClass('has-error');
			} 
			else 
			{
				// remov error text field
				$("#categoryName").find('.text-danger').remove();
				// success out for form 
				$("#categoryName").closest('.form-group').addClass('has-success');	  	
			}
			
			/*if(categoryName == "") 
			{
				$("#categoryName").after('<p class="text-danger">Category Name field is required</p>');
				$('#categoryName').closest('.form-group').addClass('has-error');
				temp = 0;
			}
			else 
			{
				if(/^([a-zA-Z_-]){3,50}$/.test(categoryName)) 
				{
					// remov error text field
					$("#categoryName").find('.text-danger').remove();
					// success out for form 
					$("#categoryName").closest('.form-group').addClass('has-success');
					temp = 1;
				}		
				else 
				{							
					$("#categoryName").after('<p class="text-danger">Category Name field is Invalid</p>');
					$('#categoryName').closest('.form-group').addClass('has-error');
					temp = 0;
				}
			}*/

			if(categoryRate == "") 
			{
				$("#categoryRate").after('<p class="text-danger">Category Rate field is required</p>');
				$('#categoryRate').closest('.form-group').addClass('has-error');
			} 
			else 
			{
				// remov error text field
				$("#categoryRate").find('.text-danger').remove();
				// success out for form 
				$("#categoryRate").closest('.form-group').addClass('has-success');	  	
			}
			
			/*if(categoryRate == "") 
			{
				$("#categoryRate").after('<p class="text-danger">Category Rate field is required</p>');
				$('#categoryRate').closest('.form-group').addClass('has-error');
				temp = 0;
			}
			else
			{
				if (/^[0-9]{3, 48}$/.test(categoryRate)) 
				{
				    // remov error text field
					$("#categoryRate").find('.text-danger').remove();
					// success out for form 
					$("#categoryRate").closest('.form-group').addClass('has-success');
					temp = 1;
				}	
				else 
				{
	            	$("#categoryRate").after('<p class="text-danger">Category Rate is Invalid</p>');
					$('#categoryRate').closest('.form-group').addClass('has-error');
					temp = 0;
				}
			}*/

			if(categoryName && categoryRate ) 
			{
				var form = $(this);
				// button loading
				$("#submitNewRMCategoryBtn").button('loading');


				$.ajax
				({
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) 
					{
						// button loading
						$("#submitNewRMCategoryBtn").button('reset');

						if(response.success == true) 
						{
							// reload the manage member table 
							rmCategoryTable.ajax.reload(null, false);						

							// reset the form text
							$("#addNewRMCategoryForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
							
							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
					
							$('#add-RMCategory-messages').html('<div class="alert alert-success">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');

							$(".alert-success").delay(500).show(10, function() 
							{
									$(this).delay(3000).hide(10, function() 
									{
										$(this).remove();
									});
							}); // /.alert
						}  // if

					} // /success
				}); // /ajax	
			} // if

			return false;
		}); // /submit RM category form function
	}); // /on click on submit RM category form function
	
	
	$("#addIssueRMBtn").unbind('click').bind('click', function() 
	{		
		// add RM Catogary form reset
		$("#issueRMForm")[0].reset();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		
		// Issue RM form function	
		$("#issueRMForm").unbind('submit').bind('submit', function() 
		{
	
			// remove the error text
			$(".text-danger").remove();
			// remove the form error
			$(".form-group").removeClass('has-error').removeClass('has-success');
			
			
			var productName = document.getElementsByName('productName[]');				
			var validateProduct;
			
			for (var x = 0; x < productName.length; x++) 
			{       			
				var productNameId = productName[x].id;	    	
				if(productName[x].value == '')
				{	    		    	
						$("#"+productNameId+"").after('<p class="text-danger"> Material Name Field is required!! </p>');
						$("#"+productNameId+"").closest('.form-group').addClass('has-error');	    		    	    	
				} 
				else 
				{      	
						$("#"+productNameId+"").closest('.form-group').addClass('has-success');	    		    		    	
				}          
			} // for

			for (var x = 0; x < productName.length; x++) 
			{       						
				if(productName[x].value)
				{	    		    		    	
					validateProduct = true;
				} 
				else 
				{      	
					validateProduct = false;
				}          
			} // for       		   	
			
			var quantity = document.getElementsByName('quantity[]');		   	
			var validateQuantity;
			for (var x = 0; x < quantity.length; x++) 
			{       
				var quantityId = quantity[x].id;
				if(quantity[x].value == '')
				{	    	
					$("#"+quantityId+"").after('<p class="text-danger"> Material Qantity Field is required!! </p>');
					$("#"+quantityId+"").closest('.form-group').addClass('has-error');	    		    		    	
				} 
				else 
				{      	
					$("#"+quantityId+"").closest('.form-group').addClass('has-success');	    		    		    		    	
				} 
			}  // for

			for (var x = 0; x < quantity.length; x++) 
			{       						
				if(quantity[x].value)
				{	    		    		    	
					validateQuantity = true;
				} 
				else 
				{      	
					validateQuantity = false;
				}          
			} // for       	
			

				if(validateProduct == true && validateQuantity == true) 
				{
					var form = $(this);
					// create order button
					$("#createIssueBtn").button('loading');

					$.ajax({
						url : form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),					
						dataType: 'json',
						success:function(response) 
						{
							console.log(response);
							// reset button
							$("#createIssueBtn").button('reset');
							
							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if(response.success == true) 
							{	
								// reload the manage member table 
								rmCategoryTable.ajax.reload(null, false);		
								
								// reset the form text
								$("#issueRMForm")[0].reset();
								// remove the error text
								$(".text-danger").remove();
								// remove the form error
								$('.form-group').removeClass('has-error').removeClass('has-success');
								
								$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
						
								$('.successIssuedmessages').html('<div class="alert alert-success">'+
								'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
								'</div>');

								$(".alert-success").delay(500).show(10, function() 
								{
										$(this).delay(2000).hide(10, function() 
										{
											$(this).remove();
										});
								}); // /.alert
													
							} 
							else 
							{
								$('.successIssuedmessages').html('<div class="alert alert-warning">'+
								'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
								'</div>');

								$(".alert-success").delay(500).show(10, function() 
								{
										$(this).delay(2000).hide(10, function() 
										{
											$(this).remove();
										});
								}); // /.alert								
							}
						} // /response
					}); // /ajax
				} // if array validate is true
			return false;
		}); // /Issue RM form function 
	}); // /on click on submit RM category form function	
	
});


function editRMCategory(rmID = null) 
{
	if(rmID) 
	{
		// remove hidden brand id text
		$('#rmID').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-brand-result').addClass('div-hide');
		// modal footer
		$('.editBrandFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedRMStock.php',
			type: 'post',
			data: {rmID : rmID},
			dataType: 'json',
			success:function(response) 
			{
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-RM-result').removeClass('div-hide');
				// modal footer
				$('.editBrandFooter').removeClass('div-hide');

				// setting the RM name value 
				$('#editRMName').val(response.rmName);
				// setting the RM status value
				$('#editRMRate').val(response.rmRate);
				// RM id 
				$(".editBrandFooter").after('<input type="hidden" name="rmID" id="rmID" value="'+response.rmID+'" />');

				// update RM form 
				$('#editRMStockForm').unbind('submit').bind('submit', function() 
				{

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var rmName = $('#editRMName').val();
					var rmRate = $('#editRMRate').val();
					var temp = 0;
					if(rmName == "") 
					{
						$("#editRMName").after('<p class="text-danger">Row-material Name field is required</p>');
						$('#editRMName').closest('.form-group').addClass('has-error');
					} 
					else 
					{
						// remov error text field
						$("#editRMName").find('.text-danger').remove();
						// success out for form 
						$("#editRMName").closest('.form-group').addClass('has-success');	  	
					}
						
					
	
						
					if(rmRate == "") 
					{
						$("#editRMRate").after('<p class="text-danger">Rate field is required</p>');
						$('#editRMRate').closest('.form-group').addClass('has-error');
					} 
					else 
					{
						// remove error text field
						$("#editRMRate").find('.text-danger').remove();
						// success out for form 
						$("#editRMRate").closest('.form-group').addClass('has-success');	  	
					}
					
					
					if(rmName && rmRate && temp == 0) 
					{
						var form = $(this);

						// submit btn
						$('#editRMBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) 
							{
								console.log(response);
								if(response.success == true) 
								{
									// submit loading button
									$("#editRMBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
										$('#edit-RM-messages').html('<div class="alert alert-success">'+
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
									rmCategoryTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
									
							}// /success
						});	 // /ajax												
					} // /if

					return false;
				}); // /update brand form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit brands function


function removeRMItem(rmID = null) 
{
	if(rmID) 
	{
		// remove supplier button clicked
		$("#removeRMBtn").unbind('click').bind('click', function() 
		{
			// loading remove button
			$("#removeRMBtn").button('loading');
			$.ajax({
				url			: 'php_action/removeRMStock.php',
				type		: 'post',
				data		: {rmID: rmID},
				dataType	: 'json',
				success		:function(response) {
					// loading remove button
					$("#removeRMBtn").button('reset');
					if(response.success == true) {
						// remove supplier modal
						$("#removeRMModal").modal('hide');

						// update the supplier table
						rmCategoryTable.ajax.reload(null, false);

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
} // /remove RM Category

// Add row
function addRow() 
{
	$("#addRowBtn").button("loading");

	var tableLength = $("#issueRMTable tbody tr").length;
	var tableRow;
	var arrayNumber;
	var count;

	if(tableLength > 0) 
	{		
		tableRow = $("#issueRMTable tbody tr:last").attr('id');
		arrayNumber = $("#issueRMTable tbody tr:last").attr('class');
		count = tableRow.substring(3);	
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;					
	} 
	else 
	{
		// no table row
		count = 1;
		arrayNumber = 0;
	}

	$.ajax({
		url: 'php_action/fetchRMStockData.php',
		type: 'post',
		dataType: 'json',
		success:function(response) 
		{
			$("#row").button("reset");			

			var tr ='<tr id="row'+count+'" class="'+arrayNumber+'">'+			  				
						'<td style="padding-left:40px;">'+
							'<div class="form-group">'+

							'<select class="form-control" name="productName[]" id="productName'+count+'" onchange="getProductData('+count+')" >'+
								'<option value="">~~SELECT~~</option>';
								// console.log(response);
								$.each(response, function(index, value) {
									tr += '<option value="'+value[0]+'">'+value[1]+'</option>';							
								});
															
							tr += '</select>'+
							'</div>'+
						'</td>' +
						
						'<td style="padding-left:35px;">'+
							'<div class="form-group">'+
							'<input type="number" name="quantity[]" onkeypress="return isNumber(event)" id="quantity'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
							'</div>'+
						'</td>' +
						
						'<td style="padding-left:25px;">'+
							'<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
						'</td>'+
					'</tr>';
			if(tableLength > 0) 
			{							
				$("#issueRMTable tbody tr:last").after(tr);
			} 
			else 
			{				
				$("#issueRMTable tbody").append(tr);
			}		

		} // /success
	});	// get the product data

} // /add row

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

//Remove row
function removeRow(row = null) 
{
	if(row) 
	{
		$("#row"+row).remove();
		//subAmount();
	} 
	else 
	{
		alert('error! Refresh the page again');
	}
}
// /Remove row