<?php
/* Smarty version 3.1.29, created on 2016-08-12 13:01:47
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\employees\employees.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ad9e8bc650b5_60803311',
  'file_dependency' => 
  array (
    '1e89b788b463f1c9b463f0d15f890d375c578625' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\employees\\employees.tpl',
      1 => 1470996106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/layout.tpl' => 1,
  ),
),false)) {
function content_57ad9e8bc650b5_60803311 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
if (!is_callable('smarty_function_site_url')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.site_url.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_456057ad9e8bc50d51_22662156',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
		
<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'body', array (
  0 => 'block_967357ad9e8bc5a7a9_43699545',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'scripts', array (
  0 => 'block_123057ad9e8bc61313_27742705',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
	<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:employees/employees.tpl */
function block_456057ad9e8bc50d51_22662156($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo smarty_function_bundle(array('name'=>'grid2'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'formz'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'select2'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'knockout'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'datetimepicker'),$_smarty_tpl);?>


<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:employees/employees.tpl */
function block_967357ad9e8bc5a7a9_43699545($_smarty_tpl, $_blockParentStack) {
?>

	<div class="row">
		<button id = "AddEmployeeButton" type="button" data-toggle="modal" data-target="#addEmployeeModal" class="btn btn-primary pull-right">Add employee</button>
	</div>
	<div id="employees">
	</div>
	
	
	<!-- Add employee modal -->
	<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="addEmployeeLabel">Add User</h4>
				</div>
				<div class="modal-body" style="padding:0px">
					<form method="POST" id="addEmployeeForm">
							<div class="form-group col-sm-6">
									<label for="username">Username</label>
									<input  type="text" id="username" name="username" autocomplete="off"  class="form-control typeahead"/>
							</div>

							<div class="form-group col-sm-6">
											<label for="startDate">Start Date</label>
											<div class='input-group date' >
													<input id="startDate" name="startDate"  class="form-control"><br/>
													<span class="input-group-addon">
															<span class="glyphicon glyphicon-calendar"></span>
													</span>
											</div>
							</div>



							<div class="form-group col-sm-6">
									<label for="password">Password</label>
									<input  type="text" id="password" name="password" autocomplete="off"  class="form-control typeahead"/>
							</div>

							<div class="form-group col-sm-6">
									<label for="confirmPassword">Confirm password</label>
									<input type="text" id="confirmPassword" name="confirmPassword" autocomplete="off"  class="form-control typeahead"/>
							</div>

							<div class="form-group col-sm-6">
									<label for="givenName">Given name</label>
									<input  type="text" id="givenName" name="givenName" autocomplete="off"  class="form-control typeahead"/>
							</div>

							<div class="form-group col-sm-6">
									<label for="familyName">Family name</label>
									<input  type="text" id="familyName" name="familyName" autocomplete="off"  class="form-control typeahead"/>
							</div>

							<div class="form-group" style="padding-left:15px; padding-right:15px;">
									<label for="email">Email</label>
									<input  type="text" id="email" name="email" autocomplete="off"  class="form-control typeahead"/>
							</div>
      
							
							<div class="form-group" style="padding-left:15px; padding-right:15px;">	
									<label for="roles">Roles</label>
									<select  multiple size="6" id="roles" style="width:100%" name="roles" class="roles " ></select>
							</div>


					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button id="addEmployee" type="button" class="btn btn-primary" >Add Employee</button>
				</div>
			</div>
		</div>
	</div>
<!-- end Add Employee modal -->

<?php
}
/* {/block 'body'} */
/* {block 'scripts'}  file:employees/employees.tpl */
function block_123057ad9e8bc61313_27742705($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo '<script'; ?>
>
		var browseEmployeesUrl = '<?php echo smarty_function_site_url(array('url'=>"async/Employees/browseEmployees"),$_smarty_tpl);?>
';
	<?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/assets/js/pulse/employees.js"><?php echo '</script'; ?>
>
<?php
}
/* {/block 'scripts'} */
}
