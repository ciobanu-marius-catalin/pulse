<?php
/* Smarty version 3.1.29, created on 2016-07-29 11:44:03
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\shared\layout.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579b1753c4ae86_63088251',
  'file_dependency' => 
  array (
    '8a5bc8f1db13c4e76a38f177d9d7a91a7c69baa9' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\shared\\layout.tpl',
      1 => 1469781841,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/menu.tpl' => 1,
  ),
),false)) {
function content_579b1753c4ae86_63088251 ($_smarty_tpl) {
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
  0 => 'block_23615579b1753c3f2b8_81829179',
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
  0 => 'block_10508579b1753c45228_14950108',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
</div>
	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'nocontainer', array (
  0 => 'block_21077579b1753c46883_17806347',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

	

	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'footer', array (
  0 => 'block_9322579b1753c47e09_22693367',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

	
	<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'scripts', array (
  0 => 'block_32091579b1753c49528_98841747',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

</body>
</html>
<?php }
/* {block 'head'}  file:shared/layout.tpl */
function block_23615579b1753c3f2b8_81829179($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'head'} */
/* {block 'body'}  file:shared/layout.tpl */
function block_10508579b1753c45228_14950108($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'body'} */
/* {block 'nocontainer'}  file:shared/layout.tpl */
function block_21077579b1753c46883_17806347($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'nocontainer'} */
/* {block 'footer'}  file:shared/layout.tpl */
function block_9322579b1753c47e09_22693367($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'footer'} */
/* {block 'scripts'}  file:shared/layout.tpl */
function block_32091579b1753c49528_98841747($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'scripts'} */
}
