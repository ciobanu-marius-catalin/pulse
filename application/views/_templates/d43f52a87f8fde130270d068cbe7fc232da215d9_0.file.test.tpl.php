<?php
/* Smarty version 3.1.29, created on 2016-08-01 10:24:31
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\test.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579ef92f6bce35_65792045',
  'file_dependency' => 
  array (
    'd43f52a87f8fde130270d068cbe7fc232da215d9' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\test.tpl',
      1 => 1469781244,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579ef92f6bce35_65792045 ($_smarty_tpl) {
?>
<html lang="ro">

<html>
	<head>


	
</head>
<body>
	<?php echo '<script'; ?>
>

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
	<?php echo '</script'; ?>
>

	
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
	<?php if (isset($_smarty_tpl->tpl_vars['action']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>
 <?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['redirect']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
 <?php }?>
</body>
</html>
<?php }
}
