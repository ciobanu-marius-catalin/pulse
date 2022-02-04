<?php
/* Smarty version 3.1.29, created on 2016-08-12 10:06:30
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\authorizations\authorizations.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ad757675a8c5_46172251',
  'file_dependency' => 
  array (
    '6bb4d36ecbb25afa9f82e2ccf5e66288ebdcbbfc' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\authorizations\\authorizations.tpl',
      1 => 1470985588,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/layout.tpl' => 1,
  ),
),false)) {
function content_57ad757675a8c5_46172251 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
if (!is_callable('smarty_function_site_url')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.site_url.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_1166057ad7576741717_30900028',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
		
<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_1557357ad7576749e57_37268508',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'scripts', array (
  0 => 'block_3197857ad75767511e0_42939219',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
						

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:authorizations\authorizations.tpl */
function block_1166057ad7576741717_30900028($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo smarty_function_bundle(array('name'=>'grid2'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'formz'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'select2'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'knockout'),$_smarty_tpl);?>



<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:authorizations\authorizations.tpl */
function block_1557357ad7576749e57_37268508($_smarty_tpl, $_blockParentStack) {
?>



	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">Administration</a></li>
			<li  class="active">Authorizations</li>
		</ol>
	</div>
	<div class="row">
		<button id = "AddActionButton" type="button" data-toggle="modal" data-target="#addActionModal" class="btn btn-primary pull-right">Add action</button>
	</div>

	<div id="authorizations">
	</div>

	<!-- Add Action modal -->
	<div class="modal fade" id="addActionModal" role="dialog" aria-labelledby="addActionLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="addActionLabel">Add Action</h4>
				</div>
				<div class="modal-body">					
					<form method="POST" id="addActionForm">

						<div class="form-group " >
							<label for="resourceName">Resource</label>							
							<select id="resourceName"  style="width:100%" name="resourceName"  class="form-control">
							</select>
						</div>

						<div class="form-group hide" id="resourceDescriptionGroup">
							<label for="resourceDescription">Resource description</label>									
							<textarea type="text" id="resourceDescription"  name="resourceDescription" data-bind="value : resourceDescription" class="form-control "></textarea>
						</div>

						<div class="form-group ">
							<label for="actionName">Action</label>
							<input type="text" id="actionName" name="actionName" data-bind="value : actionName" class="form-control"/>
						</div>

						<div class="form-group ">
							<label for="resourceDescription">Action description</label>									
							<textarea type="text" id="actionDescription" name="actionDescription" data-bind="value : actionDescription" class="form-control "></textarea>
						</div>

					</form>						
				</div>
				<div class="modal-footer">
					<button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="saveChanges" type="button" class="btn btn-primary" >Save Changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- end Add Action modal -->

	<!-- Delete Action -->
	<div class="modal fade" id="deleteActionModal" tabindex="-1" role="dialog" aria-labelledby="deleteActionLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="deleteACtionLabel">Delete action</h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="deleteActionForm">
						<div class="form-group">
							<label>Are you sure you want to delete this action?</label>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button id="deleteActionOk" type="button" class="btn btn-danger">Delete</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end Delete Action -->
<?php
}
/* {/block 'body'} */
/* {block 'scripts'}  file:authorizations\authorizations.tpl */
function block_3197857ad75767511e0_42939219($_smarty_tpl, $_blockParentStack) {
?>


	<?php echo '<script'; ?>
>
	var addActionUrl = '<?php echo smarty_function_site_url(array('url'=>'async/Authorizations/addAction'),$_smarty_tpl);?>
';
	var updateActionUrl = '<?php echo smarty_function_site_url(array('url'=>'async/Authorizations/updateAction'),$_smarty_tpl);?>
';
	var getActionUrl = '<?php echo smarty_function_site_url(array('url'=>"async/authorizations/getAction"),$_smarty_tpl);?>
';
	var getResourceUrl = '<?php echo smarty_function_site_url(array('url'=>'async/Authorizations/getResource'),$_smarty_tpl);?>
';
	var deleteActionUrl = '<?php echo smarty_function_site_url(array('url'=>"async/authorizations/deleteAction"),$_smarty_tpl);?>
';
	var browseAuthorizationsUrl = '<?php echo smarty_function_site_url(array('url'=>"async/Authorizations/browseAuthorizations"),$_smarty_tpl);?>
';
	<?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/assets/js/pulse/authorizations.js"><?php echo '</script'; ?>
>
<?php
}
/* {/block 'scripts'} */
}
