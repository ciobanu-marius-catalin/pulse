<?php
/* Smarty version 3.1.29, created on 2016-07-29 16:55:26
  from "C:\Users\andreea\Documents\NetBeansProjects\pulse\application\views\shared\layout.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579b604eb6f648_61246813',
  'file_dependency' => 
  array (
    'e0645b242f1e10971b18468ba5fa645bb11c60a8' => 
    array (
      0 => 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\views\\shared\\layout.tpl',
      1 => 1469795336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/menu.tpl' => 1,
  ),
),false)) {
function content_579b604eb6f648_61246813 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
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
  0 => 'block_24620579b604eb60a15_28117341',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

</head>
<body>
	  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  

	<div class="container"><?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2805579b604eb67577_36491445',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
</div>
	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'nocontainer', array (
  0 => 'block_138579b604eb68e82_20721814',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

	

	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'footer', array (
  0 => 'block_30459579b604eb6bac4_91918209',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

	
	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'scripts', array (
  0 => 'block_21272579b604eb6da97_46485091',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

</body>
</html>
<?php }
/* {block 'head'}  file:shared/layout.tpl */
function block_24620579b604eb60a15_28117341($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'head'} */
/* {block 'body'}  file:shared/layout.tpl */
function block_2805579b604eb67577_36491445($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'body'} */
/* {block 'nocontainer'}  file:shared/layout.tpl */
function block_138579b604eb68e82_20721814($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'nocontainer'} */
/* {block 'footer'}  file:shared/layout.tpl */
function block_30459579b604eb6bac4_91918209($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'footer'} */
/* {block 'scripts'}  file:shared/layout.tpl */
function block_21272579b604eb6da97_46485091($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'scripts'} */
}
