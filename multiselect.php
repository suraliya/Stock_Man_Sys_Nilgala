<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">-
		<div class="form-group">
			<select id="countries" name="countries[]" multiple >						    
				<option value="Brazil">Brazil</option>
				<option value=" Argentina"> Argentina</option>		
				<option value="Germany">Germany</option>
				<option value=" Chile"> Chile</option>
				<option value="Colombia">Colombia</option>
				<option value=" France"> France</option>
				<option value=" Belgium"> Belgium</option>
				<option value="Spain">Spain</option>
			</select>	
		</div>	  

<script type="text/javascript">
	$(document).ready(function() {       
	$('#countries').multiselect({		
		nonSelectedText: 'Select Teams'				
	});
});

</script>