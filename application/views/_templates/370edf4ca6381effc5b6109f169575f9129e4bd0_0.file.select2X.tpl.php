<?php
/* Smarty version 3.1.29, created on 2016-07-27 13:21:51
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\poc\select2X.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57988b3f13a524_00021479',
  'file_dependency' => 
  array (
    '370edf4ca6381effc5b6109f169575f9129e4bd0' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\poc\\select2X.tpl',
      1 => 1469614909,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57988b3f13a524_00021479 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
?>
<!DOCTYPE html>

<html>
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<?php echo '</script'; ?>
>
	<?php echo smarty_function_bundle(array('name'=>'jquery'),$_smarty_tpl);?>
	
	<?php echo smarty_function_bundle(array('name'=>'bootstrap'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'select2'),$_smarty_tpl);?>

</head>
<body>
	<?php echo '<script'; ?>
>

		$(function () {
			$('#select').select2();

		});
	<?php echo '</script'; ?>
>


	<div class='container'>
		<div class="row">
			<div class="col-sm-6">
				<form>
					<select id="select">
						<option value="valoare1">Nume1</option>
						<option value="valoare2">Nume2</option>
						<option value="valoare3">Nume3</option>
					</select>	
				</form>
			</div>

		</div>

	</div>

</body>
</html>
<?php }
}
