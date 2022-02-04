<?php
/* Smarty version 3.1.29, created on 2016-08-01 17:19:43
  from "C:\Users\andreea\Documents\NetBeansProjects\pulse\application\views\authorizations\authorizations.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579f5a7f532b18_97025398',
  'file_dependency' => 
  array (
    '9ef88ffb6e22f94a1607eabf8c72fc689a7b0ea3' => 
    array (
      0 => 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\views\\authorizations\\authorizations.tpl',
      1 => 1470054215,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/layout.tpl' => 1,
  ),
),false)) {
function content_579f5a7f532b18_97025398 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
if (!is_callable('smarty_function_site_url')) require_once 'C:\\Users\\andreea\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.site_url.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_31926579f5a7f50f196_31861277',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
		
<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_15799579f5a7f518625_06049897',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "scripts", array (
  0 => 'block_14628579f5a7f51e004_65280788',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
						

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:authorizations\authorizations.tpl */
function block_31926579f5a7f50f196_31861277($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo smarty_function_bundle(array('name'=>'grid2'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'formz'),$_smarty_tpl);?>

	<?php echo smarty_function_bundle(array('name'=>'select2'),$_smarty_tpl);?>

<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:authorizations\authorizations.tpl */
function block_15799579f5a7f518625_06049897($_smarty_tpl, $_blockParentStack) {
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
					<h4 class="modal-title" id="addActionLabel">Add Resource</h4>
				</div>
				<div class="modal-body">					
					<form method="POST" id="addActionForm">


						<div class="form-group" >							
							<select id="resourceName" style="width:100%" name="resourceName" class="form-control">
								<option></option>
							</select>
						</div>

						<div class="form-group ">
							<label for="resourceDescription">Resource description</label>									
							<textarea type="text" id="resourceDescription" name="resourceDescription" class="form-control "></textarea>
						</div>

						<div class="form-group ">
							<label for="actionName">Action</label>
							<input type="text" id="actionName" name="actionName" class="form-control"/>
						</div>

						<div class="form-group ">
							<label for="resourceDescription">Action description</label>									
							<textarea type="text" id="actionDescription" name="actionDescription" class="form-control "></textarea>
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
function block_14628579f5a7f51e004_65280788($_smarty_tpl, $_blockParentStack) {
?>


	<?php echo '<script'; ?>
>
	var _actionId = null;
	

	
		function addAction() {
			
			$.blockUI({ baseZ: 9000});
			//$('#addActionModal').formz('clearErrors');
			var data = $('#addActionForm').formz();
			
			data.id = _actionId; 
						
			var url = '<?php echo smarty_function_site_url(array('url'=>'async/Authorizations/addAction'),$_smarty_tpl);?>
';
			if(_actionId) url = '<?php echo smarty_function_site_url(array('url'=>'async/Authorizations/updateAction'),$_smarty_tpl);?>
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

					if (!$('#addActionForm').formz('processErrors', response))
						return;
					$('#addActionModal').modal('hide');
					$('#authorizations').grid('reload');
					
				}
			});
		}
		
		function showAddActionModal() {
		
			_actionId = null;
			$('#addActionLabel').text('Add Resource');
			
			$('#resourceName').select2("trigger", "select", {
			data: { id: '', text: '' }
			});
			
			$('#addActionModal').find('input,textarea').val('');	
			$('#addActionModal').formz('clearErrors');
		}
		function onEditAction(id) {
			_actionId = id;
			
			$.ajax({
				url: '<?php echo smarty_function_site_url(array('url'=>"async/authorizations/getAction"),$_smarty_tpl);?>
'
				, type: 'POST'
				, dataType: 'json'
				, data: { id: id }
				, error: function() {
					new PNotify({ title: 'Eroare', text: 'Server communication error.', type: 'error', styling: 'bootstrap3' });
		
				}
				, success: function(response) {	
					if( ! $('#addActionModal').formz('processErrors', response) )
						return;			
				
					$('#resourceName').select2("trigger", "select", {
				    data: { id: response.action.groupName, text: response.action.groupName }
					});

					$('#resourceDescription').val(response.action.groupDescription);
					$('#actionName').val(response.action.actionName);
					$('#actionDescription').val(response.action.actionDescription);
					
					$('#addActionLabel').text('Update Resource');
					
					$('#addActionModal').formz('clearErrors');
					$('#addActionModal').modal('show');
					
				}
			});
		}		
		
		function onDeleteAction(id){
			_actionId = id;
			$('#deleteActionModal').modal('show');
		}

		function actionFormatter(value, id) {
			return '<a href="javascript:onEditAction(' + id + ')"><span class="glyphicon glyphicon-edit"></span></a>'
					+ ' <a href="javascript:onDeleteAction(' + id + ')"><span class="glyphicon glyphicon-trash"></span></a>';
		}

		function setData(dataResource) {
			$('#resourceName').select2({ data: dataResource});
		}

		function deleteAction(){
			
			var data = { };
			
			data.actionId = _actionId;

			$.blockUI({ baseZ: 9000 });
			
			$.ajax({
				url: '<?php echo smarty_function_site_url(array('url'=>"async/authorizations/deleteAction"),$_smarty_tpl);?>
'
				, type: 'POST'
				, dataType: 'json'
				, data: data
				, error: function() {
					$.unblockUI();
					new PNotify({ title: 'Eroare', text: 'Server communication error.', type: 'error', styling: 'bootstrap3' });
				}
				, success: function(response) {
					if( ! $('#deleteActionlModal').formz('processErrors', response) )
						return;
					$('#deleteActionModal').modal('hide');
					$('#authorizations').grid('reload');
					$.unblockUI();

					new PNotify({ title: 'Into', text: 'The action was deleted.', type: 'info', styling: 'bootstrap3' });
				}
			});
		}
		
		$(function () {
			
			$('#AddActionButton').click(showAddActionModal);
			$('#deleteActionOk').click(deleteAction);
			$('#saveChanges').click(addAction);

			$('#authorizations').grid({
				url: ' <?php echo smarty_function_site_url(array('url'=>"async/Authorizations/browseAuthorizations"),$_smarty_tpl);?>
'
				, columns: [
					{ index: 'groupName', label: 'Resource', sortable: true, searchable: true}
					, { index: 'actionName', label: 'Action', sortable: true, searchable: true}
					, { index: 'description', label: 'Description', sortable: true, searchable: true}
					, { index: 'actions', label: '', sortable: false, width: 40, formatter: actionFormatter, searchable: false}
				]

				, columnFilters: true
				, rowNumbers: true

						//, searchBox: true
			});
			
			$("#resourceName").select2({
				ajax: {
					url: '<?php echo smarty_function_site_url(array('url'=>'async/Authorizations/getResource'),$_smarty_tpl);?>
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
				}
				,tags : true		
			});

		});
	<?php echo '</script'; ?>
>
<?php
}
/* {/block 'scripts'} */
}
