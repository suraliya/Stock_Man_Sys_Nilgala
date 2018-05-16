$(document).ready(function() {
	
	var divRequest = $(".div-request").text();
	
	// top nav bar 
	$("#navReports").addClass('active');	
	
	// selse order	report
	if(divRequest == 'salseorder')  
	{
		// top nav child bar 
		$('#topNavSalseOrderReport').addClass('active');
			
		// order date picker
		$("#startDate").datepicker();
		// order date picker
		$("#endDate").datepicker();

		$("#getsalseOrderReportForm").unbind('submit').bind('submit', function() {
			
			var startDate = $("#startDate").val();
			var endDate = $("#endDate").val();

			if(startDate == "" || endDate == "") {
				if(startDate == "") {
					$("#startDate").closest('.form-group').addClass('has-error');
					$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}

				if(endDate == "") {
					$("#endDate").closest('.form-group').addClass('has-error');
					$("#endDate").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Salse Order Report Slip</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax

			} // /else

			return false;
		});
	}
	else if(divRequest == 'salseorderitem') 
	{
		// top nav child bar 
		$('#topNavsalseorderitemReport').addClass('active');
		
		// order date picker
		$("#startDate").datepicker();
		// order date picker
		$("#endDate").datepicker();

		$("#getsalseorderitemReportForm").unbind('submit').bind('submit', function() {
			
			var startDate = $("#startDate").val();
			var endDate = $("#endDate").val();

			if(startDate == "" || endDate == "") {
				if(startDate == "") {
					$("#startDate").closest('.form-group').addClass('has-error');
					$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}

				if(endDate == "") {
					$("#endDate").closest('.form-group').addClass('has-error');
					$("#endDate").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Salse Order Item Report Slip</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax

			} // /else

			return false;
		});		
	}
	else if(divRequest == 'purchaseorderitem') 
	{
		// top nav child bar 
		$('#topNavpurchaseorderitemReport').addClass('active');
		
		// order date picker
		$("#startDate").datepicker();
		// order date picker
		$("#endDate").datepicker();

		$("#getpurchaseorderitemReportForm").unbind('submit').bind('submit', function() {
			
			var startDate = $("#startDate").val();
			var endDate = $("#endDate").val();

			if(startDate == "" || endDate == "") {
				if(startDate == "") {
					$("#startDate").closest('.form-group').addClass('has-error');
					$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}

				if(endDate == "") {
					$("#endDate").closest('.form-group').addClass('has-error');
					$("#endDate").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Purchase Order Item Report Slip</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax

			} // /else

			return false;
		});		
	}
	else if(divRequest == 'irm') 
	{
		// top nav child bar 
		$('#topNavirmReport').addClass('active');
		
		// order date picker
		$("#startDate").datepicker();
		// order date picker
		$("#endDate").datepicker();

		$("#getirmReportForm").unbind('submit').bind('submit', function() {
			
			var startDate = $("#startDate").val();
			var endDate = $("#endDate").val();

			if(startDate == "" || endDate == "") {
				if(startDate == "") {
					$("#startDate").closest('.form-group').addClass('has-error');
					$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}

				if(endDate == "") {
					$("#endDate").closest('.form-group').addClass('has-error');
					$("#endDate").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Issue Raw Material Report Slip</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax

			} // /else

			return false;
		});		
	}
	else if(divRequest == 'ip') 
	{
		// top nav child bar 
		$('#topNavipReport').addClass('active');
		
		// order date picker
		$("#startDate").datepicker();
		// order date picker
		$("#endDate").datepicker();

		$("#getipReportForm").unbind('submit').bind('submit', function() {
			
			var startDate = $("#startDate").val();
			var endDate = $("#endDate").val();

			if(startDate == "" || endDate == "") {
				if(startDate == "") {
					$("#startDate").closest('.form-group').addClass('has-error');
					$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}

				if(endDate == "") {
					$("#endDate").closest('.form-group').addClass('has-error');
					$("#endDate").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Issue Production Report Slip</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax

			} // /else

			return false;
		});		
	}
	else if(divRequest == 'pr') 
	{
		// top nav child bar 
		$('#topNavprReport').addClass('active');
		
		// order date picker
		$("#startDate").datepicker();
		// order date picker
		$("#endDate").datepicker();

		$("#getprReportForm").unbind('submit').bind('submit', function() {
			
			var startDate = $("#startDate").val();
			var endDate = $("#endDate").val();

			if(startDate == "" || endDate == "") {
				if(startDate == "") {
					$("#startDate").closest('.form-group').addClass('has-error');
					$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}

				if(endDate == "") {
					$("#endDate").closest('.form-group').addClass('has-error');
					$("#endDate").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Product Returns Report Slip</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax

			} // /else

			return false;
		});		
	}
	else if(divRequest == 'rmr') 
	{
		// top nav child bar 
		$('#topNavrmrReport').addClass('active');
		
		// order date picker
		$("#startDate").datepicker();
		// order date picker
		$("#endDate").datepicker();

		$("#getrmrReportForm").unbind('submit').bind('submit', function() {
			
			var startDate = $("#startDate").val();
			var endDate = $("#endDate").val();

			if(startDate == "" || endDate == "") {
				if(startDate == "") {
					$("#startDate").closest('.form-group').addClass('has-error');
					$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}

				if(endDate == "") {
					$("#endDate").closest('.form-group').addClass('has-error');
					$("#endDate").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Row Material Returns Report Slip</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax

			} // /else

			return false;
		});		
	}
	else if(divRequest == 'dp') 
	{
		// top nav child bar 
		$('#topNavdpReport').addClass('active');
		
		// order date picker
		$("#startDate").datepicker();
		// order date picker
		$("#endDate").datepicker();

		$("#getdpReportForm").unbind('submit').bind('submit', function() {
			
			var startDate = $("#startDate").val();
			var endDate = $("#endDate").val();

			if(startDate == "" || endDate == "") {
				if(startDate == "") {
					$("#startDate").closest('.form-group').addClass('has-error');
					$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}

				if(endDate == "") {
					$("#endDate").closest('.form-group').addClass('has-error');
					$("#endDate").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Damaged Product Report Slip</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax

			} // /else

			return false;
		});		
	}
	else if(divRequest == 'drm') 
	{
		// top nav child bar 
		$('#topNavdrmReport').addClass('active');
		
		// order date picker
		$("#startDate").datepicker();
		// order date picker
		$("#endDate").datepicker();

		$("#getdrmReportForm").unbind('submit').bind('submit', function() {
			
			var startDate = $("#startDate").val();
			var endDate = $("#endDate").val();

			if(startDate == "" || endDate == "") {
				if(startDate == "") {
					$("#startDate").closest('.form-group').addClass('has-error');
					$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}

				if(endDate == "") {
					$("#endDate").closest('.form-group').addClass('has-error');
					$("#endDate").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Damaged Row Material Report Slip</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax

			} // /else

			return false;
		});		
	}
	else if(divRequest == 'purchaseorder') 
	{
		// top nav child bar 
		$('#topNavpurchaseorderReport').addClass('active');
		
		// order date picker
		$("#startDate").datepicker();
		// order date picker
		$("#endDate").datepicker();

		$("#getpurchaseorderReportForm").unbind('submit').bind('submit', function() {
			
			var startDate = $("#startDate").val();
			var endDate = $("#endDate").val();

			if(startDate == "" || endDate == "") {
				if(startDate == "") {
					$("#startDate").closest('.form-group').addClass('has-error');
					$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}

				if(endDate == "") {
					$("#endDate").closest('.form-group').addClass('has-error');
					$("#endDate").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Purchase Order Report Slip</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax

			} // /else

			return false;
		});		
	}
	else if(divRequest == 'message') 
	{
		// top nav child bar 
		$('#topNavmessageReport').addClass('active');
		
		// order date picker
		$("#startDate").datepicker();
		// order date picker
		$("#endDate").datepicker();

		$("#getmessageReportForm").unbind('submit').bind('submit', function() {
			
			var startDate = $("#startDate").val();
			var endDate = $("#endDate").val();

			if(startDate == "" || endDate == "") {
				if(startDate == "") {
					$("#startDate").closest('.form-group').addClass('has-error');
					$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}

				if(endDate == "") {
					$("#endDate").closest('.form-group').addClass('has-error');
					$("#endDate").after('<p class="text-danger">The End Date is required</p>');
				} else {
					$(".form-group").removeClass('has-error');
					$(".text-danger").remove();
				}
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();

				var form = $(this);

				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'text',
					success:function(response) {
						var mywindow = window.open('', 'Inventory Management System', 'height=400,width=600');
				mywindow.document.write('<html><head><title>Message Report Slip</title>');        
				mywindow.document.write('</head><body>');
				mywindow.document.write(response);
				mywindow.document.write('</body></html>');

				mywindow.document.close(); // necessary for IE >= 10
				mywindow.focus(); // necessary for IE >= 10

				mywindow.print();
				mywindow.close();
					} // /success
				});	// /ajax

			} // /else

			return false;
		});		
	}		
});