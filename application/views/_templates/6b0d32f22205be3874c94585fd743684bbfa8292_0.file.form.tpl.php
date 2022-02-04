<?php
/* Smarty version 3.1.29, created on 2016-08-04 16:54:16
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\authenticate\form.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a3490816cc59_86634046',
  'file_dependency' => 
  array (
    '6b0d32f22205be3874c94585fd743684bbfa8292' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\authenticate\\form.tpl',
      1 => 1470318854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/login_layout.tpl' => 1,
  ),
),false)) {
function content_57a3490816cc59_86634046 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
if (!is_callable('smarty_function_site_url')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.site_url.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_351557a34908154e29_30054134',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_72857a34908164c15_53696600',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/login_layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:authenticate/form.tpl */
function block_351557a34908154e29_30054134($_smarty_tpl, $_blockParentStack) {
?>
	
	<?php echo smarty_function_bundle(array('name'=>"formz"),$_smarty_tpl);?>

	
        <title>Autentificare</title>
        
	<?php echo '<script'; ?>
 type="text/javascript">
		var _messages = null;
		
		$(function(){
			<?php if (isset($_smarty_tpl->tpl_vars['messages']->value)) {?>
				_messages = <?php echo $_smarty_tpl->tpl_vars['messages']->value;?>
;
				$('#authForm').formz('processErrors', _messages);
				for(var i = 0; i < _messages.length; i++){					
					new PNotify({ title: 'Eroare', text: messages[i], type: 'error', styling: 'bootstrap3' });
				}
				
			<?php }?>
		});
	<?php echo '</script'; ?>
>
<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:authenticate/form.tpl */
function block_72857a34908164c15_53696600($_smarty_tpl, $_blockParentStack) {
?>

	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4"><div class="logo"></div>
				<div class="account-wall">
					<form id="authForm" class="form-signin" action="<?php echo smarty_function_site_url(array('url'=>"authenticate/auth"),$_smarty_tpl);?>
" method="post">
						<input type="hidden" name="redirect" value="<?php if (isset($_smarty_tpl->tpl_vars['redirect']->value) && $_smarty_tpl->tpl_vars['redirect']->value != '/' && strtoupper($_smarty_tpl->tpl_vars['redirect']->value) != '%2F') {
echo $_smarty_tpl->tpl_vars['redirect']->value;
}?>"/>
						<div class="left-inner-addon ">
							<label for="username">Username</label>					
							<input type="text" class="form-control" placeholder="username" name="username" id="username" required autofocus>
						</div>
						<div class="left-inner-addon ">
							<label for="password">Password</label>           
							<input type="password" class="form-control" placeholder="Password" name="password" id="password"  required>
						</div>    
						<button class="btn btn-lg btn-success btn-block" type="submit" id="login"><i class="glyphicon glyphicon-log-in"></i> Autentificare</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
}
/* {/block 'body'} */
}
