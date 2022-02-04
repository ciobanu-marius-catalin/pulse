<?php
/* Smarty version 3.1.29, created on 2016-08-11 12:49:14
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\authenticate\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ac4a1aa9cac5_84370868',
  'file_dependency' => 
  array (
    '46606bf0f71ad3074c629c138eb7f432271cbfc8' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\authenticate\\index.tpl',
      1 => 1470908943,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/login_layout.tpl' => 1,
  ),
),false)) {
function content_57ac4a1aa9cac5_84370868 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
if (!is_callable('smarty_function_site_url')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.site_url.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'head', array (
  0 => 'block_1654457ac4a1aa81ce5_69416268',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_2978557ac4a1aa88d19_82550401',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'scripts', array (
  0 => 'block_2255857ac4a1aa8fea0_16051603',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/login_layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:authenticate/index.tpl */
function block_1654457ac4a1aa81ce5_69416268($_smarty_tpl, $_blockParentStack) {
?>
	
	<?php echo smarty_function_bundle(array('name'=>'formz'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'knockout'),$_smarty_tpl);?>

	<title>Log in</title>


<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:authenticate/index.tpl */
function block_2978557ac4a1aa88d19_82550401($_smarty_tpl, $_blockParentStack) {
?>

	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4"><div class="logo"></div>
				<div class="account-wall">
					<form id="authForm" class="form-signin" action="<?php echo smarty_function_site_url(array('url'=>"authenticate/auth"),$_smarty_tpl);?>
" method="post">
						<input type="hidden" name="redirect" data-bind="value: redirect"/>
						<div class="left-inner-addon ">
							<label for="username">Username</label>					
							<input type="text" class="form-control" placeholder="username" data-bind="value: username" name="username" id="username" required autofocus>
						</div>
						<div class="left-inner-addon ">
							<label for="password">Password</label>           
							<input type="password" class="form-control" placeholder="Password" data-bind="value: password" name="password" id="password"  required>
						</div>   
						<button class="btn btn-lg btn-success btn-block"  type="submit" id="login"><i class="glyphicon glyphicon-log-in"></i> Log in</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
}
/* {/block 'body'} */
/* {block 'scripts'}  file:authenticate/index.tpl */
function block_2255857ac4a1aa8fea0_16051603($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo '<script'; ?>
>
		var messages;
		<?php if (isset($_smarty_tpl->tpl_vars['messages']->value)) {?>
			messages = <?php echo $_smarty_tpl->tpl_vars['messages']->value;?>
;
		<?php }?>
		var redirect;
		<?php if (isset($_smarty_tpl->tpl_vars['redirect']->value)) {?>
			redirect = '<?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
';
		<?php }?>
	<?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/assets/js/pulse/authenticate.js"><?php echo '</script'; ?>
>

<?php
}
/* {/block 'scripts'} */
}
