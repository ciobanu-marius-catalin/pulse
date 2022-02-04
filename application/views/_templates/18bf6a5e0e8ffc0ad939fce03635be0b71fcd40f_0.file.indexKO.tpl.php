<?php
/* Smarty version 3.1.29, created on 2016-08-08 09:58:20
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\authenticate\indexKO.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a82d8c78d762_56426543',
  'file_dependency' => 
  array (
    '18bf6a5e0e8ffc0ad939fce03635be0b71fcd40f' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\authenticate\\indexKO.tpl',
      1 => 1470637874,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/login_layout.tpl' => 1,
  ),
),false)) {
function content_57a82d8c78d762_56426543 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
if (!is_callable('smarty_function_site_url')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.site_url.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_2613057a82d8c765ac4_64551126',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_867557a82d8c76ecc5_76327168',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "scripts", array (
  0 => 'block_1840057a82d8c7787c6_93839516',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/login_layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:authenticate/indexKO.tpl */
function block_2613057a82d8c765ac4_64551126($_smarty_tpl, $_blockParentStack) {
?>
	
	<?php echo smarty_function_bundle(array('name'=>"formz"),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'knockout'),$_smarty_tpl);?>

	<title>Log in</title>


<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:authenticate/indexKO.tpl */
function block_867557a82d8c76ecc5_76327168($_smarty_tpl, $_blockParentStack) {
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
/* {block 'scripts'}  file:authenticate/indexKO.tpl */
function block_1840057a82d8c7787c6_93839516($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo '<script'; ?>
 type="text/javascript">
		var _messages = null;

		$(function () {
		<?php if (isset($_smarty_tpl->tpl_vars['messages']->value)) {?>
			_messages = <?php echo $_smarty_tpl->tpl_vars['messages']->value;?>
;
			$('#authForm').formz('processErrors', _messages);
			for (var i = 0; i < _messages.length; i++) {
				new PNotify({ title: 'Eroare', text: messages[i], type: 'error', styling: 'bootstrap3'});
			}

		<?php }?>

			function authenticateViewModel() {
				this.username = ko.observable('');
				this.password = ko.observable('');
				this.redirect = ko.observable('<?php if (isset($_smarty_tpl->tpl_vars['redirect']->value) && $_smarty_tpl->tpl_vars['redirect']->value != '/' && strtoupper($_smarty_tpl->tpl_vars['redirect']->value) != '%2F') {
echo $_smarty_tpl->tpl_vars['redirect']->value;
}?>');
			}
			var viewModel = new authenticateViewModel();
			ko.applyBindings(viewModel);
		});
	<?php echo '</script'; ?>
>


<?php
}
/* {/block 'scripts'} */
}
