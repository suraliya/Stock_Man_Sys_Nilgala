var productionTable;

$(document).ready(function() 
{
	// top bar active
	$('#navStock').addClass('active');
	// top nav child bar 
	$('#topNavproductionStock').addClass('active');	
	
	// manage production table
	productionTable = $("#productionTable").DataTable({
		'ajax': 'php_action/fetchProduction.php',
		'order': []		
	});
	
	
	$("#addNewProductionBtn").unbind('click').bind('click', function() 
	{	
		// add production form reset
		$("#addNewProductionForm")[0].reset();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		// add production form function
		$("#addNewProductionForm").unbind('submit').bind('submit', function() 
		{		
			
			// remove the error text
			$(".text-danger").remove();
			// remove the form error
			$(".form-group").removeClass('has-error').removeClass('has-success');
		
			var categoryName = $("#categoryName").val();
			var categoryRate = $("#categoryRate").val();

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

			if(categoryName && categoryRate) 
			{
				var form = $(this);
				// button loading
				$("#submitNewProductionBtn").button('loading');


				$.ajax
				({
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) 
					{
						// button loading
						$("#submitNewProductionBtn").button('reset');

						if(response.success == true) 
						{
							// reload the production table 
							productionTable.ajax.reload(null, false);						

							// reset the form text
							$("#addNewProductionForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
					
							$('#add-Production-messages').html('<div class="alert alert-success">'+
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
						}  // if
						else
						{
							// reload the production table 
							productionTable.ajax.reload(null, false);						

							// reset the form text
							$("#addNewProductionForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
					
							$('#add-Production-messages').html('<div class="alert alert-warning">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-remove-circle"></i></strong> '+ response.messages +
							'</div>');

							$(".alert-success").delay(500).show(10, function() 
							{
									$(this).delay(2000).hide(10, function() 
									{
										$(this).remove();
									});
							}); // /.alert
						}

					} // /success
				}); // /ajax	
			} // if

			return false;
		}); // /submit productionfo rm function
	}); // /on click on submit production form function
	
	
	$("#addIssueProductionBtn").unbind('click').bind('click', function() 
	{	
		// add production form reset
		$("#issueproductionForm")[0].reset();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		
		// Issue production form function	
		$("#issueproductionForm").unbind('submit').bind('submit', function() 
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
						$("#"+productNameId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
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
					$("#"+quantityId+"").after('<p class="text-danger"> Product Qantity Field is required!! </p>');
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
			

			//if(orderDate && clientName && clientContact && paid && discount && paymentType && paymentStatus) 
			//{
				if(validateProduct == true && validateQuantity == true) 
				{
					var form = $(this);
					// create order button
					$("#createIssueBtn").button('loading');

					$.ajax({
							url 		: form.attr('action'),
							type		: form.attr('method'),
							data		: form.serialize(),					
							dataType	: 'json',
							success		:function(response) 
							{
								console.log(response);

								// Customer form reset
								$("#createIssueBtn").button('reset');								

								if(response.success == true) 
								{
									// reload the production table 
									productionTable.ajax.reload(null, false);
									
									// add RM Catogary form reset
									$("#issueproductionForm")[0].reset();		
									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');
									
									
									$("#success-issued-messages").html('<div class="alert alert-success">'+
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
									
									$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);
									// disabled te modal footer button
									$(".submitButtonFooter").addClass('div-hide');
									// remove the product row
									$(".removeProductRowBtn").addClass('div-hide');								
								} 
								else 
								{
									
									// reload the production table 
									productionTable.ajax.reload(null, false);
									
									// add RM Catogary form reset
									$("#issueproductionForm")[0].reset();		
									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');
									
									$("#success-issued-messages").html('<div class="alert alert-warning">'+
									'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
									'<strong><i class="glyphicon glyphicon-remove-circle"></i></strong> '+ response.messages +
								    '</div>');
									
									$(".alert-success").delay(500).show(10, function() 
									{
										$(this).delay(2000).hide(10, function() 
										{
											$(this).remove();
										});
									}); // /.alert
									
									$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);
									// disabled te modal footer button
									$(".submitButtonFooter").addClass('div-hide');
									// remove the product row
									$(".removeProductRowBtn").addClass('div-hide');									
								}
							}  // if
						}); // /ajax	
				} // if
			return false;
		}); // /Issue RM form function 
	}); // /on click on submit RM category form function	
	
});


function editProduction(productID = null) 
{
	if(productID) 
	{
		// remove hidden brand id text
		$('#productID').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-production-result').addClass('div-hide');
		// modal footer
		$('.editProductionFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedProduction.php',
			type: 'post',
			data: {productID : productID},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-production-result').removeClass('div-hide');
				// modal footer
				$('.editProductionFooter').removeClass('div-hide');

				// setting the brand name value 
				$('#editProductionName').val(response.productName);
				// setting the brand status value
				$('#editProductionRate').val(response.productRate);
				// brand id 
				$(".editProductionFooter").after('<input type="hidden" name="productID" id="productID" value="'+response.productID+'" />');

				// update brand form 
				$('#editProductionForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var productionName = $('#editProductionName').val();
					var productionRate = $('#editProductionRate').val();

					if(productionName == "") 
					{
						$("#editProductionName").after('<p class="text-danger">Production Name field is required</p>');
						$('#editProductionName').closest('.form-group').addClass('has-error');
					} 
					else 
					{
						// remov error text field
						$("#editProductionName").find('.text-danger').remove();
						// success out for form 
						$("#editProductionName").closest('.form-group').addClass('has-success');	  	
					}

					if(productionRate == "") 
					{
						$("#editProductionRate").after('<p class="text-danger">Production Rate field is required</p>');
						$('#editProductionRate').closest('.form-group').addClass('has-error');
					} 
					else 
					{
						// remove error text field
						$("#editProductionRate").find('.text-danger').remove();
						// success out for form 
						$("#editProductionRate").closest('.form-group').addClass('has-success');	  	
					}

					if(productionName && productionRate) 
					{
						var form = $(this);

						// submit btn
						$('#editProductionBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) 
								{
									console.log(response);
									// submit btn
									$('#editProductionBtn').button('reset');

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
											
			  	  			
									$('#edit-production-messages').html('<div class="alert alert-success">'+
									'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
									'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
									'</div>');

									$(".alert-success").delay(500).show(10, function() {
										$(this).delay(2000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								}// /if
								else
								{
									console.log(response);
									// submit btn
									$('#editProductionBtn').button('reset');

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);											
			  	  			
									$('#edit-production-messages').html('<div class="alert alert-warning">'+
									'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
									'<strong><i class="glyphicon glyphicon-remove-circle"></i></strong> '+ response.messages +
									'</div>');

									$(".alert-success").delay(500).show(10, function() {
										$(this).delay(2000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								}									
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


function removeProduction(productID = null)
 {
	if(productID) 
	{
		// remove supplier button clicked
		$("#removeProductionBtn").unbind('click').bind('click', function() 
		{
			// loading remove button
			$("#removeProductionBtn").button('loading');
			$.ajax({
				url			: 'php_action/removeProduction.php',
				type		: 'post',
				data		: {productID: productID},
				dataType	: 'json',
				success		: function(response) 
				{
					// loading remove button
					$("#removeProductionBtn").button('reset');
					if(response.success == true) {
						// remove supplier modal
						$("#removeProductionModal").modal('hide');

						// update the supplier table
						productionTable.ajax.reload(null, false);						
						
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
				else 
				{
						// remove success messages
						$(".removesupplierMessages").html('<div class="alert alert-warning">'+
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

					} // /error
				} // /success function
			}); // /ajax fucntion to remove the supplier
			return false;
		}); // /remove supplier btn clicked
	} // /if supplierid
} // /remove production function


// Add row
function addRow() 
{
	$("#addRowBtn").button("loading");

	var tableLength = $("#issueproductionTable tbody tr").length;
	var tableRow;
	var arrayNumber;
	var count;

	if(tableLength > 0) 
	{		
		tableRow = $("#issueproductionTable tbody tr:last").attr('id');
		arrayNumber = $("#issueproductionTable tbody tr:last").attr('class');
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
		url: 'php_action/fetchProductionData.php',
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
				$("#issueproductionTable tbody tr:last").after(tr);
			} 
			else 
			{				
				$("#issueproductionTable tbody").append(tr);
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
// /Remove row*/