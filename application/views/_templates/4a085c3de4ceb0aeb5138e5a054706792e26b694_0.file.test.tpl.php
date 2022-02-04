<?php
/* Smarty version 3.1.29, created on 2016-07-28 17:37:43
  from "C:\Users\andreea\Documents\NetBeansProjects\pulse\application\views\test.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579a18b79edd76_84189142',
  'file_dependency' => 
  array (
    '4a085c3de4ceb0aeb5138e5a054706792e26b694' => 
    array (
      0 => 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\views\\test.tpl',
      1 => 1469716661,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579a18b79edd76_84189142 ($_smarty_tpl) {
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
