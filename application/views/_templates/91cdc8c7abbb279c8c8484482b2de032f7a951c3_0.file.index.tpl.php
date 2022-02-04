<?php
/* Smarty version 3.1.29, created on 2016-08-03 13:24:18
  from "C:\Users\andreea\Documents\NetBeansProjects\pulse\application\views\authenticate\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a1c652b23b41_21993166',
  'file_dependency' => 
  array (
    '91cdc8c7abbb279c8c8484482b2de032f7a951c3' => 
    array (
      0 => 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\views\\authenticate\\index.tpl',
      1 => 1470219764,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/login_layout.tpl' => 1,
  ),
),false)) {
function content_57a1c652b23b41_21993166 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
if (!is_callable('smarty_function_site_url')) require_once 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.site_url.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_2385357a1c652b0f6a7_92082340',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_470657a1c652b1faa1_22175064',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/login_layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:authenticate/index.tpl */
function block_2385357a1c652b0f6a7_92082340($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo smarty_function_bundle(array('name'=>"formz"),$_smarty_tpl);?>


	<title>Autentificare</title>

	<?php echo '<script'; ?>
 type="text/javascript">

		function setUser() {

			var data = $('#authenticateForm').formz();
			console.log(data);

			$.blockUI({ baseZ: 9000});

			var url = '<?php echo smarty_function_site_url(array('url'=>"async/authenticate/auth"),$_smarty_tpl);?>
';

			$.ajax({
				url: url
				, type: 'POST'
				, dataType: 'json'
				, data: data
				, error: function (xhr, status, response) {
					//console_log(response);
					$.unblockUI();
					new PNotify({ title: 'Eroare', text: 'Eroare în comunicația cu serverul.', type: 'error', styling: 'bootstrap3'});
				}
				, success: function (response) {
					if (!$('#authenticateModal').formz('processErrors', response))
						return;

					$.unblockUI();

					new PNotify({ title: 'Into', text: 'Autentificare cu succes', type: 'info', styling: 'bootstrap3'});
					location.href = '<?php echo smarty_function_site_url(array('url'=>"users/index"),$_smarty_tpl);?>
';
				}
			});

			return;
		}

		$(function () {

			$("#password").keydown(function (event) {
				if (event.keyCode == 13) {
					setUser();
				}
			});
			$("#btn-auth").click(setUser);
		});
	<?php echo '</script'; ?>
>
<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:authenticate/index.tpl */
function block_470657a1c652b1faa1_22175064($_smarty_tpl, $_blockParentStack) {
?>


	<!-- Begin Login -->

	<div class="center-block" style="max-width: 200px;">
		<form method="POST" id="authenticateForm" action="<?php echo smarty_function_site_url(array('url'=>"async/authenticate/auth"),$_smarty_tpl);?>
" enctype="multipart/form-data">		
			<div class="row">        
				<div class="col-sm-12">
					<h4>Autentificare</h4>
				</div> 
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group" style="margin: .2em 0em 0em 0em;">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" value="" class="form-control input-sm"/>
					</div>
				</div>
			</div>
			<div class="row">    
				<div class="col-sm-12">					
					<div class="form-group" style="margin: .2em 0em 0em 0em;">
						<label for="password">Parolă</label>
						<input type="password" id="password" name="password" value="" class="form-control input-sm"/>
					</div>
				</div>
			</div>
			<div class="row">    
				<div class="col-sm-12">
					<br>
					<p><button id="btn-auth" type="button" class="btn btn-info pull-left"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Autentifica-te</a></button></p>
				</div> 
			</div>
		</form>
	</div>

	<!-- End Login --> 	


<?php
}
/* {/block 'body'} */
}
