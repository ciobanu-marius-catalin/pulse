<?php
/* Smarty version 3.1.29, created on 2016-08-05 16:51:35
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\shared\login_layout.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a499e75414b5_60809215',
  'file_dependency' => 
  array (
    '1981b35b1bbe8d14e7fcc8c94e73c973ba620873' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\shared\\login_layout.tpl',
      1 => 1470405072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a499e75414b5_60809215 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="ro">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Pragma" content="no-cache"/>
		<meta http-equiv="Cache-Control" content="no-cache"/>
		<meta http-equiv="Expires" content="0"/>

		<meta name="application-name" content="Pulse">
			<meta name="theme-color" content="#ffffff">

				<?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?><title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title><?php }?>

				<?php echo smarty_function_bundle(array('name'=>"jquery"),$_smarty_tpl);?>

				<?php echo smarty_function_bundle(array('name'=>"bootstrap"),$_smarty_tpl);?>

				<?php echo smarty_function_bundle(array('name'=>"blockui"),$_smarty_tpl);?>

				<?php echo smarty_function_bundle(array('name'=>"pnotify"),$_smarty_tpl);?>


				<style>
					body {
						padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
					}
				</style>

			<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'head', array (
  0 => 'block_2490557a499e7536ad8_87872330',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

			</head>
			<body>
				<div class="container"><?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2311857a499e7539db9_19263618',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
</div>
			<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'nocontainer', array (
  0 => 'block_2647957a499e753bae9_72216248',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


		<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'footer', array (
  0 => 'block_319657a499e753dd77_17188429',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'scripts', array (
  0 => 'block_1869357a499e753f784_02923097',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

</body>
</html>
<?php }
/* {block 'head'}  file:shared/login_layout.tpl */
function block_2490557a499e7536ad8_87872330($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'head'} */
/* {block 'body'}  file:shared/login_layout.tpl */
function block_2311857a499e7539db9_19263618($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'body'} */
/* {block 'nocontainer'}  file:shared/login_layout.tpl */
function block_2647957a499e753bae9_72216248($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'nocontainer'} */
/* {block 'footer'}  file:shared/login_layout.tpl */
function block_319657a499e753dd77_17188429($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'footer'} */
/* {block 'scripts'}  file:shared/login_layout.tpl */
function block_1869357a499e753f784_02923097($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'scripts'} */
}
