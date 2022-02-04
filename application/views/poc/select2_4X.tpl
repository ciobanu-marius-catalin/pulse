{extends file='shared/layout.tpl'}

{block name="head"}
	{bundle name = 'select2'}
{/block}	

{block name="body"}
	<form>
		<select id="select">
			<option value="valoare1">Nume1</option>
			<option value="valoare2">Nume2</option>
			<option value="valoare3">Nume3</option>
		</select>	
	</form>


	<form>
		<select id="select2" class = "form-control">
			<option value="valoare1">Nume1</option>
			<option value="valoare2">Nume2</option>
			<option value="valoare3">Nume3</option>
		</select>	
	</form>
{/block}
{block name="scripts"}
	<script>

		$(function () {
			$('#select').select2();
			$('#select2').select2();
		});
	</script>
{/block}
