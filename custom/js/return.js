var manageOrderTable;

$(document).ready(function() 
{
	var divRequest = $(".div-request").text();

	// top nav bar 
	$("#navreturn").addClass('active');

	if(divRequest == 'pReturn' || divRequest == 'damPro')  
	{				
		// top nav child bar
		if(divRequest == 'pReturn')
		{
			$('#topNavreturnproduct').addClass('active');	
		}
		else
		{
			$('#topNavreturndproduct').addClass('active');
		}

		$("#SupplierName").on('change',function(){
		$("#supTP").val($("#SupplierName option:selected").attr("name"));
		});
		
		// create order form function
		$("#createOrderForm").unbind('submit').bind('submit', function()
		{
			var form = $(this);

			$('.form-group').removeClass('has-error').removeClass('has-success');
			$('.text-danger').remove();
				
			
			var SupplierName = $("#SupplierName").val();
			var supTp = $("#supTp").val();
			var discription = $("#discription").val();	
				

			if(SupplierName == "") 
			{
				$("#SupplierName").after('<p class="text-danger"> Customer Name field is required </p>');
				$('#SupplierName').closest('.form-group').addClass('has-error');
			} 
			else 
			{
				$('#SupplierName').closest('.form-group').addClass('has-success');
			} 
			if(supTp == "") 
			{
				$("#supTp").after('<p class="text-danger"> supTp field is required </p>');
				$('#supTp').closest('.form-group').addClass('has-error');
			} 
			else 
			{
				$('#supTp').closest('.form-group').addClass('has-success');
			}

			if(discription == "") 
			{
				$("#discription").after('<p class="text-danger"> Discription field is required </p>');
				$('#discription').closest('.form-group').addClass('has-error');
			} 
			else 
			{
				$('#discription').closest('.form-group').addClass('has-success');
			}						
			
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
		    	$("#"+quantityId+"").after('<p class="text-danger"> Quantity Field is required!! </p>');
				$("#"+quantityId+"").closest('.form-group').addClass('has-error');	    		    		    	
			} 
			else 
			{      	
				$("#"+quantityId+"").closest('.form-group').addClass('has-success');	    		    		    		    	
			} 
	   	} // for

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
	   	

			if( SupplierName && productName && quantity ) 
			{
				if(validateProduct == true && validateQuantity == true) 
				{
					// create order button
					$("#createOrderBtn").button('loading');

					$.ajax({
						url : form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),					
						dataType: 'json',
						success:function(response) 
						{
							console.log(response);
							// reset button
							$("#createOrderBtn").button('reset');
							
							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if(response.success == true) 
							{								
								// create order button
								$(".success-messages").html('<div class="alert alert-success">'+
								'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
								'</div>');
									
								$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);
								
								// disabled te modal footer button
								$(".submitButtonFooter").addClass('div-hide');
								// remove the product row
								$(".removeProductRowBtn").addClass('div-hide');
								
								$(".alert-success").delay(500).show(10, function() {
								$(this).delay(2000).hide(10, function() {
								$(this).remove();
									});
								}); // /.alert						
															
							} 
							else 
							{
								alert(response.messages);								
							}
						} // /response
					}); // /ajax
				} // if array validate is true
			} // /if field validate is true
			return false;
		}); // /create order form function	
	} 
	
	else if(divRequest == 'rmReturn' || divRequest == 'damRM') 
	{
		// top nav child bar 
		if(divRequest == 'rmReturn')
		{
			$('#topNavreturnrmproduct').addClass('active');
		}
		else
		{
			$('#topNavreturndrmproduct').addClass('active');
		}
			

		$("#SupplierName").on('change',function(){
		$("#supTP").val($("#SupplierName option:selected").attr("name"));
		});
		
		// create order form function
		$("#createOrderForm").unbind('submit').bind('submit', function()
		{
			var form = $(this);

			$('.form-group').removeClass('has-error').removeClass('has-success');
			$('.text-danger').remove();
				
			
			var SupplierName = $("#SupplierName").val();
			var supTp = $("#supTp").val();	
			var discription = $("#discription").val();
			
            if(discription == "") 
			{
				$("#discription").after('<p class="text-danger"> Discription field is required </p>');
				$('#discription').closest('.form-group').addClass('has-error');
			} 
			else 
			{
				$('#discription').closest('.form-group').addClass('has-success');
			}							

			if(SupplierName == "") 
			{
				$("#SupplierName").after('<p class="text-danger"> Supplier Name field is required </p>');
				$('#SupplierName').closest('.form-group').addClass('has-error');
			} 
			else 
			{
				$('#SupplierName').closest('.form-group').addClass('has-success');
			} 
			if(supTp == "") 
			{
				$("#supTp").after('<p class="text-danger"> supTp field is required </p>');
				$('#supTp').closest('.form-group').addClass('has-error');
			} 
			else 
			{
				$('#supTp').closest('.form-group').addClass('has-success');
			}				
			
			var productName = document.getElementsByName('productName[]');				
			var validateProduct;
			for (var x = 0; x < productName.length; x++) 
			{       			
				var productNameId = productName[x].id;	    	
				if(productName[x].value == '')
				{	    		    	
					$("#"+productNameId+"").after('<p class="text-danger"> Rom-material Field is required!! </p>');
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
		    	$("#"+quantityId+"").after('<p class="text-danger"> Quantity Field is required!! </p>');
				$("#"+quantityId+"").closest('.form-group').addClass('has-error');	    		    		    	
			} 
			else 
			{      	
				$("#"+quantityId+"").closest('.form-group').addClass('has-success');	    		    		    		    	
			} 
	   	} // for

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
	   	

			if( SupplierName && productName && quantity ) 
			{
				if(validateProduct == true && validateQuantity == true) 
				{
					// create order button
					$("#createOrderBtn").button('loading');

					$.ajax({
						url : form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),					
						dataType: 'json',
						success:function(response) 
						{
							console.log(response);
							// reset button
							$("#createOrderBtn").button('reset');
							
							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if(response.success == true) 
							{								
								// create order button
								$(".success-messages").html('<div class="alert alert-success">'+
								'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
								'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
								'</div>');
									
								$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);
								
								// disabled te modal footer button
								$(".submitButtonFooter").addClass('div-hide');
								// remove the product row
								$(".removeProductRowBtn").addClass('div-hide');
								
								$(".alert-success").delay(500).show(10, function() {
								$(this).delay(2000).hide(10, function() {
								$(this).remove();
									});
								}); // /.alert						
															
							} 
							else 
							{
								alert(response.messages);								
							}
						} // /response
					}); // /ajax
				} // if array validate is true
			} // /if field validate is true
			return false;
		}); // /return product form function					
	}	

}); // /documernt


// print order function
/*
function printOrder(orderId = null) 
{
	if(orderId) 
	{			
		$.ajax({
			url		: 'php_action/printPurchaseOrder.php',
			type	: 'post',
			data	: {orderId: orderId},
			dataType: 'text',
			success	:function(response) 
			{	
				var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');
				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10
				mywindow.print();
				mywindow.close();						
			}// /success function
		}); // /ajax function to fetch the printable order
	} // /if orderId
} // /print order function
*/
//add product row
function addRow() 
{
	$("#addRowBtn").button("loading");

	var tableLength = $("#productTable tbody tr").length;

	var tableRow;
	var arrayNumber;
	var count;

	if(tableLength > 0) 
	{		
		tableRow = $("#productTable tbody tr:last").attr('id');
		arrayNumber = $("#productTable tbody tr:last").attr('class');
		count = tableRow.substring(3);	
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;					
	} else {
		// no table row
		count = 1;
		arrayNumber = 0;
	}

	$.ajax({
		url: 'php_action/fetchProductionData.php',
		type: 'post',
		dataType: 'json',
		success:function(response) {
			$("#addRowBtn").button("reset");			

			var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+			  				
				'<td>'+
					'<div class="form-group">'+

					'<select class="form-control" name="productName[]" id="productName'+count+'" onchange="getProductData('+count+')" >'+
						'<option value="">~~SELECT~~</option>';
						// console.log(response);
						$.each(response, function(index, value) {
							tr += '<option value="'+value[0]+'">'+value[1]+'</option>';							
						});
													
					tr += '</select>'+
					'</div>'+
				'</td>'+
				'<td style="padding-left:20px;"">'+
					'<input type="text" name="rate[]" id="rate'+count+'" autocomplete="off" disabled="true" class="form-control" />'+
					'<input type="hidden" name="rateValue[]" id="rateValue'+count+'" autocomplete="off" class="form-control" />'+
				'</td style="padding-left:20px;">'+
				'<td style="padding-left:20px;">'+
					'<div class="form-group">'+
					'<input type="number" name="quantity[]" onkeypress="return isNumber(event)" id="quantity'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
					'</div>'+
				'</td>'+
				'<td style="padding-left:20px;">'+
					'<input type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control" disabled="true" />'+
					'<input type="hidden" name="totalValue[]" id="totalValue'+count+'" autocomplete="off" class="form-control" />'+
				'</td>'+
				'<td>'+
					'<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
				'</td>'+
			'</tr>';
			if(tableLength > 0) {							
				$("#productTable tbody tr:last").after(tr);
			} else {				
				$("#productTable tbody").append(tr);
			}		

		} // /success
	});	// get the product data
}

//add row material row
function addRMRow() 
{
	$("#addRowBtn").button("loading");

	var tableLength = $("#productTable tbody tr").length;

	var tableRow;
	var arrayNumber;
	var count;

	if(tableLength > 0) {		
		tableRow = $("#productTable tbody tr:last").attr('id');
		arrayNumber = $("#productTable tbody tr:last").attr('class');
		count = tableRow.substring(3);	
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;					
	} else {
		// no table row
		count = 1;
		arrayNumber = 0;
	}

	$.ajax({
		url		: 'php_action/fetchRMStockData.php',
		type	: 'post',
		dataType: 'json',
		success	:function(response) {
			$("#addRowBtn").button("reset");			

			var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+			  				
				'<td>'+
					'<div class="form-group">'+

					'<select class="form-control" name="productName[]" id="productName'+count+'" onchange="getRMData('+count+')" >'+
						'<option value="">~~SELECT~~</option>';
						// console.log(response);
						$.each(response, function(index, value) {
							tr += '<option value="'+value[0]+'">'+value[1]+'</option>';							
						});
													
					tr += '</select>'+
					'</div>'+
				'</td>'+
				'<td style="padding-left:20px;"">'+
					'<input type="text" name="rate[]" id="rate'+count+'" autocomplete="off" disabled="true" class="form-control" />'+
					'<input type="hidden" name="rateValue[]" id="rateValue'+count+'" autocomplete="off" class="form-control" />'+
				'</td style="padding-left:20px;">'+
				'<td style="padding-left:20px;">'+
					'<div class="form-group">'+
					'<input type="number" name="quantity[]" onkeypress="return isNumber(event)" id="quantity'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
					'</div>'+
				'</td>'+
				'<td style="padding-left:20px;">'+
					'<input type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control" disabled="true" />'+
					'<input type="hidden" name="totalValue[]" id="totalValue'+count+'" autocomplete="off" class="form-control" />'+
				'</td>'+
				'<td>'+
					'<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
				'</td>'+
			'</tr>';
			if(tableLength > 0) {							
				$("#productTable tbody tr:last").after(tr);
			} else {				
				$("#productTable tbody").append(tr);
			}		

		} // /success
	});	// get the product data
}



function removeProductRow(row = null) 
{
	if(row) 
	{
		$("#row"+row).remove();
		subAmount();
	} else {
		alert('error! Refresh the page again');
	}
}

// select on product data
function getProductData(row = null) 
{
	if(row) 
	{
		var productID = $("#productName"+row).val();		
		if(productID == "") 
		{
			$("#rate"+row).val("");
			$("#quantity"+row).val("");						
			$("#total"+row).val("");
		} 
		else 
		{
			$.ajax({
				url		: 'php_action/fetchSelectedProduction.php',
				type	: 'post',
				data	: {productID : productID},
				dataType: 'json',
				success	:function(response) 
				{
					// setting the rate value into the rate input field
					
					$("#rate"+row).val(response.productRate);
					$("#rateValue"+row).val(response.productRate);
					$("#quantity"+row).val(1);

					var total = Number(response.productRate) * 1;
					total = total.toFixed(2);
					$("#total"+row).val(total);
					$("#totalValue"+row).val(total);
			
					subAmount();
				} // /success
			}); // /ajax function to fetch the product data	
		}
				
	} 
	else 
	{
		alert('no row! please refresh the page');
	}
} // /select on product data

// select on RM data

function getRMData(row = null) 
{
	if(row) 
	{
		var rmID = $("#productName"+row).val();		
		if(rmID == "") 
		{
			$("#rate"+row).val("");
			$("#quantity"+row).val("");						
			$("#total"+row).val("");
		} 
		else 
		{
			$.ajax({
				url		: 'php_action/fetchSelectedRMStock.php',
				type	: 'post',
				data	: {rmID : rmID},
				dataType: 'json',
				success	:function(response) 
				{
					// setting the rate value into the rate input field
					
					$("#rate"+row).val(response.rmRate);
					$("#rateValue"+row).val(response.rmRate);
					$("#quantity"+row).val(1);

					var total = Number(response.rmRate) * 1;
					total = total.toFixed(2);
					$("#total"+row).val(total);
					$("#totalValue"+row).val(total);
			
					subAmount();
				} // /success
			}); // /ajax function to fetch the product data	
		}				
	} 
	else 
	{
		alert('no row! please refresh the page');
	}
} // /select on product data

// table total
function getTotal(row = null) {
	if(row) 
	{
		var total = Number($("#rate"+row).val()) * Number($("#quantity"+row).val());
		total = total.toFixed(2);
		$("#total"+row).val(total);
		$("#totalValue"+row).val(total);		
		subAmount();
	} 
	else 
	{
		alert('no row !! please refresh the page');
	}
}

function subAmount() 
{
	var tableProductLength = $("#productTable tbody tr").length;
	var totalSubAmount = 0;
	for(x = 0; x < tableProductLength; x++) 
	{
		var tr = $("#productTable tbody tr")[x];
		var count = $(tr).attr('id');
		count = count.substring(3);
		totalSubAmount = Number(totalSubAmount) + Number($("#total"+count).val());
	} // /for

	totalSubAmount = totalSubAmount.toFixed(2);

	// sub total
	$("#subTotal").val(totalSubAmount);
	$("#subTotalValue").val(totalSubAmount);

	/*
	// vat
	var vat = (Number($("#subTotal").val())/100) * 13;
	vat = vat.toFixed(2);
	$("#vat").val(vat);
	$("#vatValue").val(vat);

	// total amount
	var totalAmount = (Number($("#subTotal").val()) + Number($("#vat").val()));
	totalAmount = totalAmount.toFixed(2);
	$("#totalAmount").val(totalAmount);
	$("#totalAmountValue").val(totalAmount);

	var discount = $("#discount").val();
	if(discount) {
		var grandTotal = Number($("#totalAmount").val()) - Number(discount);
		grandTotal = grandTotal.toFixed(2);
		$("#grandTotal").val(grandTotal);
		$("#grandTotalValue").val(grandTotal);
	} else {
		$("#grandTotal").val(totalAmount);
		$("#grandTotalValue").val(totalAmount);
	} // /else discount	

	var paidAmount = $("#paid").val();
	if(paidAmount) {
		paidAmount =  Number($("#grandTotal").val()) - Number(paidAmount);
		paidAmount = paidAmount.toFixed(2);
		$("#due").val(paidAmount);
		$("#dueValue").val(paidAmount);
	} else {	
		$("#due").val($("#grandTotal").val());
		$("#dueValue").val($("#grandTotal").val());
	} // else
*/
		
} // /sub total amount

/*
function discountFunc() {
	var discount = $("#discount").val();
 	var totalAmount = Number($("#totalAmount").val());
 	totalAmount = totalAmount.toFixed(2);

 	var grandTotal;
 	if(totalAmount) { 	
 		grandTotal = Number($("#totalAmount").val()) - Number($("#discount").val());
 		grandTotal = grandTotal.toFixed(2);

 		$("#grandTotal").val(grandTotal);
 		$("#grandTotalValue").val(grandTotal);
 	} else {
 	}

 	var paid = $("#paid").val();

 	var dueAmount; 	
 	if(paid) {
 		dueAmount = Number($("#grandTotal").val()) - Number($("#paid").val());
 		dueAmount = dueAmount.toFixed(2);

 		$("#due").val(dueAmount);
 		$("#dueValue").val(dueAmount);
 	} else {
 		$("#due").val($("#grandTotal").val());
 		$("#dueValue").val($("#grandTotal").val());
 	}

} // /discount function

function paidAmount() {
	var grandTotal = $("#grandTotal").val();

	if(grandTotal) {
		var dueAmount = Number($("#grandTotal").val()) - Number($("#paid").val());
		dueAmount = dueAmount.toFixed(2);
		$("#due").val(dueAmount);
		$("#dueValue").val(dueAmount);
	} // /if
} // /paid amoutn function
*/

function resetOrderForm() 
{
	// reset the input field
	$("#createOrderForm")[0].reset();
	// remove remove text danger
	$(".text-danger").remove();
	// remove form group error 
	$(".form-group").removeClass('has-success').removeClass('has-error');
} // /reset order form

/*
// cancel order from 
function cancelOrder(orderId = null) 
{
	if(orderId) 
	{
		$("#cancelOrderBtn").unbind('click').bind('click', function() 
		{
			$("#cancelOrderBtn").button('loading');
			$.ajax({
				url: 'php_action/cancelPurchaseOrder.php',
				type: 'post',
				data: {orderId : orderId},
				dataType: 'json',
				success:function(response) {
					$("#cancelOrderBtn").button('reset');

					if(response.success == true) 
					{

						manageOrderTable.ajax.reload(null, false);
						// hide modal
						$("#cancelOrderModal").modal('hide');
							// success messages
						$("#success-messages").html('<div class="alert alert-success">'+
						'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
						'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
						'</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function() {
							$(this).delay(1000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          

					} 
					else 
					{		// error messages
							$(".cancelOrderMessages").html('<div class="alert alert-warning">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          
					} // /else

				} // /success
			});  // /ajax function to remove the order

		}); // /remove order button clicked
		

	} 
	else 
	{
		alert('error! refresh the page again');
	}
}
// /cancel order from server
*/
/*
// remove order from 
function removeOrder(orderId = null) 
{
	if(orderId) 
	{
		$("#removeOrderBtn").unbind('click').bind('click', function() 
		{
			$("#removeOrderBtn").button('loading');
			$.ajax({
				url		: 'php_action/removePurchaseOrder.php',
				type	: 'post',
				data	: {orderId : orderId},
				dataType: 'json',
				success	:function(response) 
				{
					$("#removeOrderBtn").button('reset');

					if(response.success == true) 
					{
						manageOrderTable.ajax.reload(null, false);
						// hide modal
						$("#removeOrderModal").modal('hide');
							// success messages
						$("#success-messages").html('<div class="alert alert-success">'+
						'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
						'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
						'</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function() {
							$(this).delay(1000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          

					} 
					else 
					{		// error messages
							$(".removeOrderMessages").html('<div class="alert alert-warning">'+
							'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
							'</div>');

						// remove the mesages
						$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          
					} // /else

				} // /success
			});  // /ajax function to remove the order

		}); // /remove order button clicked
		

	} 
	else 
	{
		alert('error! refresh the page again');
	}
}// /remove order from server
*/