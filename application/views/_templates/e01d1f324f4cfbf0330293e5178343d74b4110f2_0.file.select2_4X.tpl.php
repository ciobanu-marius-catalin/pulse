<?php
/* Smarty version 3.1.29, created on 2016-08-09 16:19:31
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\poc\select2_4X.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a9d8634aadc4_46131324',
  'file_dependency' => 
  array (
    'e01d1f324f4cfbf0330293e5178343d74b4110f2' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\poc\\select2_4X.tpl',
      1 => 1470748769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/layout.tpl' => 1,
  ),
),false)) {
function content_57a9d8634aadc4_46131324 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_1824357a9d8634a1152_02593516',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
	

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_2912057a9d8634a6ec7_67469314',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "scripts", array (
  0 => 'block_792957a9d8634a90d5_42452780',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:poc/select2_4X.tpl */
function block_1824357a9d8634a1152_02593516($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo smarty_function_bundle(array('name'=>'select2'),$_smarty_tpl);?>

<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:poc/select2_4X.tpl */
function block_2912057a9d8634a6ec7_67469314($_smarty_tpl, $_blockParentStack) {
?>

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
<?php
}
/* {/block 'body'} */
/* {block 'scripts'}  file:poc/select2_4X.tpl */
function block_792957a9d8634a90d5_42452780($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo '<script'; ?>
>

		$(function () {
			$('#select').select2();
			$('#select2').select2();
			$('#select2').val('valoare2').trigger('change');
		});
	<?php echo '</script'; ?>
>
<?php
}
/* {/block 'scripts'} */
}
