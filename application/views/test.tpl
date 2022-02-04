<html lang="ro">

<html>
	<head>


	
</head>
<body>
	<script>

		$(function () {
			$('#PNotify').click(function(){
			new PNotify({ title: 'Titlul', text: 'Merge PNotify.', type: 'error', styling: 'bootstrap3' });
			});
				
			$('#select').select2();
			
			$('#datetimepicker').datetimepicker()
			$('#block').click(function(){
			$.blockUI();
			});
			
		});
	</script>

	
	<div class='container'>
		<div class="row">
			<div class="col-sm-6">
				merge bootstrap
				<form>
		<input type="text"><br/>
		<input type="button" value="BlockUi" id="block"><br/>
		<input type="button" value="PNotify" id="PNotify"><br/>
		<input type="text" id="datetimepicker"><br/>
		<select id="select">
		<option value="valoare1">Nume1</option>
		<option value="valoare2">Nume2</option>
		<option value="valoare3">Nume3</option>
		</select>	
	</form>
			</div>

		</div>

	</div>
	{if isset($action)} {$action} {/if}
	{if isset($redirect)} {$redirect} {/if}
</body>
</html>
