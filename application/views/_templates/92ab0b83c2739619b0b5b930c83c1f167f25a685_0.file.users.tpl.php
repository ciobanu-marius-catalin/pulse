<?php
/* Smarty version 3.1.29, created on 2016-08-02 17:55:38
  from "C:\Users\andreea\Documents\NetBeansProjects\pulse\application\views\users\users.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a0b46aa2cfe7_95182321',
  'file_dependency' => 
  array (
    '92ab0b83c2739619b0b5b930c83c1f167f25a685' => 
    array (
      0 => 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\views\\users\\users.tpl',
      1 => 1470149737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/layout.tpl' => 1,
  ),
),false)) {
function content_57a0b46aa2cfe7_95182321 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
if (!is_callable('smarty_function_site_url')) require_once 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.site_url.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_75357a0b46a9fd810_04361755',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
		
<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_2427857a0b46aa05761_28825220',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "scripts", array (
  0 => 'block_1775157a0b46aa0da53_49020416',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
						
<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:users\users.tpl */
function block_75357a0b46a9fd810_04361755($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo smarty_function_bundle(array('name'=>'select2'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'grid2'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'formz'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'datetimepicker'),$_smarty_tpl);?>

<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:users\users.tpl */
function block_2427857a0b46aa05761_28825220($_smarty_tpl, $_blockParentStack) {
?>


	<div class="container">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">Administration</a></li>
				<li  class="active">Users</li>
			</ol>
		</div>		
		<div class="row">

			<button id = "AddUserButton " type="button" data-toggle="modal" data-target="#addUserModal" class="btn btn-primary pull-right">New user</button>					
		</div>
		<div id="users">

		</div>
	</div>

	<!-- Add user modal -->
	<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="addUserLabel">Add User</h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="addUserForm">

                                                <div class="col-sm-6">
                                                        <label for="username">Username</label>
                                                        <input type="text" id="username" name="username" autocomplete="off"  class="form-control typeahead"/>
                                                </div>

												<div class='col-sm-6'>
													<div class="form-group">
														<label for="startDate">Start Date</label>
														<div class='input-group date' id='datetimepicker1'>
															<input type="text" id="startDate" name="startDate" autocomplete="off" class="form-control"><br/>
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>
												</div>

                                               

                                                <div class="col-sm-6">
                                                        <label for="password">Password</label>
                                                        <input type="text" id="password" name="password" autocomplete="off"  class="form-control typeahead"/>
                                                </div>

                                                <div class="col-sm-6">
                                                        <label for="confirmPassword">Confirm password</label>
                                                        <input type="text" id="confirmPassword" name="confirmPassword" autocomplete="off"  class="form-control typeahead"/>
                                                </div>

                                                <div class="col-sm-6">
                                                        <label for="givenName">Given Name</label>
                                                        <input type="text" id="givenName" name="givenName" autocomplete="off"  class="form-control typeahead"/>
                                                </div>

                                                <div class="col-sm-6">
                                                        <label for="familyName">Family Name</label>
                                                        <input type="text" id="familyName" name="familyName" autocomplete="off"  class="form-control typeahead"/>
                                                </div>

                                                <div class="form-group ">
                                                        <label for="email">Email</label>
                                                        <input type="text" id="email" name="email" autocomplete="off"  class="form-control typeahead"/>
                                                </div>      

												<div class="form-group" >	
													<label for="roles">Roles</label>
													<select id="roles" style="width:100%" name="roles" class="roles ">
													</select>
												</div>


					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button id="addUser" type="button" class="btn btn-primary" >Add User</button>
				</div>
			</div>
		</div>
	</div>
<!-- end Add User modal -->

<!-- Delete User -->
	<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="deleteUserLabel">Delete User</h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="deleteUserForm">
						<div class="form-group">
							<label>Are you sure you want to delete this user?</label>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button id="deleteUserOk" type="button" class="btn btn-danger">Delete</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end Delete Action -->


<?php
}
/* {/block 'body'} */
/* {block 'scripts'}  file:users\users.tpl */
function block_1775157a0b46aa0da53_49020416($_smarty_tpl, $_blockParentStack) {
?>


	<?php echo '<script'; ?>
>
	var _actionId = null;		

		function addAction() {
			
			$.blockUI({ baseZ: 9000});
			//$('#addUserModal').formz('clearErrors');
			var data = $('#addUserForm').formz();
			
			data.id = _actionId; 
						
			var url = '<?php echo smarty_function_site_url(array('url'=>'async/Users/addUser'),$_smarty_tpl);?>
';
			if(_actionId) url = '<?php echo smarty_function_site_url(array('url'=>'async/Users/updateUser'),$_smarty_tpl);?>
';
			
			$.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: data,
				error: function () {
					$.unblockUI();
					new PNotify({ title: 'Error', text: 'Server communication error.', type: 'error', styling: 'bootstrap3'});
				},
				success: function (response) {
					$.unblockUI();

					if (!$('#addUserForm').formz('processErrors', response))
						return;
					$('#addUserModal').modal('hide');
					$('#addUserModal').grid('reload');
					
				}
			});
		}	

		function showAddUserModal() {
		
			_actionId = null;
			$('#addUserLabel').text('Add Resource');

			$('#roles').select2();
			

						
			$('#addUserModal').modal('show');
			$('#addUserModal').formz('clearErrors');
		}		

		function onEditUser(id) {
			_actionId = id;
			
			$.ajax({
				url: '<?php echo smarty_function_site_url(array('url'=>"async/Users/getUser"),$_smarty_tpl);?>
'
				, type: 'POST'
				, dataType: 'json'
				, data: { id: id }
				, error: function() {
					new PNotify({ title: 'Eroare', text: 'Server communication error.', type: 'error', styling: 'bootstrap3' });
		
				}
				, success: function(response) {	
					if( ! $('#addUserModal').formz('processErrors', response) )
						return;			
				
					$('#username').val(response.user.username);
					$('#startDate').val(response.user.startDate);
					$('#password').val(response.user.password);
					$('#confirmPassword').val(response.user.confirmPassword);
					$('#givenName').val(response.user.givenName);
					$('#familyName').val(response.user.familyName);
					$('#email').val(response.user.email);
					$('#roles').select2("trigger", "select", {
				    data: { id: response.action.groupName, text: response.action.groupName }
					});
					
					//$('#roles').val(response.user.roles);
					
					$('#addUserLabel').text('Update User');
					
					$('#addUserModal').formz('clearErrors');
					$('#addUserModal').modal('show');
					
				}
			});
		}		

		function onDeleteUser(id){
			_actionId = id;
			$('#deleteUserModal').modal('show');
		}		

		function actionFormatter(value, id) {
			return '<a href="javascript:onEditUser(' + id + ')"><span class="glyphicon glyphicon-edit"></span></a>'
					+ ' <a href="javascript:onDeleteUser(' + id + ')"><span class="glyphicon glyphicon-trash"></span></a>';
		}		

		function setData(dataResource) {
			$('#roles').select2({ data: dataResource});
		}

		function deleteUser(){
			
			var data = { };
			
			data.actionId = _actionId;

			$.blockUI({ baseZ: 9000 });
			
			$.ajax({
				url: '<?php echo smarty_function_site_url(array('url'=>"async/Users/deleteUser"),$_smarty_tpl);?>
'
				, type: 'POST'
				, dataType: 'json'
				, data: data
				, error: function() {
					$.unblockUI();
					new PNotify({ title: 'Eroare', text: 'Server communication error.', type: 'error', styling: 'bootstrap3' });
				}
				, success: function(response) {
					if( ! $('#deleteUserModal').formz('processErrors', response) )
						return;
					$('#deleteUserModal').modal('hide');
					$('#authorizations').grid('reload');
					$.unblockUI();

					new PNotify({ title: 'Into', text: 'The user was deleted.', type: 'info', styling: 'bootstrap3' });
				}
			});
		}

		$(function () {

			$('#startDate').datetimepicker();
			$('#AddUserButton').click(showAddUserModal);
			$('#deleteUserOk').click(deleteUser);
			$('#saveChanges').click(addUser);

			$('#addUser').click(addAction);
			

			$('#users').grid({
				url: '<?php echo smarty_function_site_url(array('url'=>"async/Users/browseUsers"),$_smarty_tpl);?>
'
				, columns: [
										{ index: 'username', label: 'Username', sortable: true}
                                        ,{ index: 'familyName', label: 'First Name', sortable: true}	
                                        ,{ index: 'givenName', label: 'Last Name', sortable: true} 
                                        ,{ index: 'email', label: 'Email', sortable: true}
                                        ,{ index: 'status', label: 'Status',searchOptions: { type: 'select', values:<?php echo $_smarty_tpl->tpl_vars['userSelector']->value;?>
 },sortable: false}
										, { index: 'actions', label: '', sortable: false, width: 40, formatter: actionFormatter, searchable: false}
				]

				, columnFilters: true
				, rowNumbers: true

						//, searchBox: true
			});

			

			$("#roles").select2({
				placeholder: 'Select an option',
				allowClear: true,
				multiple: true,
				ajax: {
					url: '<?php echo smarty_function_site_url(array('url'=>'async/Users/getResource'),$_smarty_tpl);?>
',
					dataType: 'json',					
					delay: 250,
					type: 'POST',
					data: function (params) {
						return {
							search: params.term, // search term
							rows : 20
						};
					},
					processResults: function (data, params) {
						//alert(data.items[0][0].id)
						return {
							results: $.map(data.items, function (item) {
								return {
									id: item[0].id,
									text: item[1].text
								};
							})
						};
					}
				},tags : true	
			});			

		});


	<?php echo '</script'; ?>
>
<?php
}
/* {/block 'scripts'} */
}
