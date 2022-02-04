{extends file='shared/layout.tpl'}


{block name="head"}
	{bundle name = 'grid2'}
	{bundle name = 'formz'}
	{bundle name = 'select2'}
	{bundle name = 'knockout'}


{/block}		
{block name='body'}


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
{/block}

{block name='scripts'}

	<script>
	var addActionUrl = '{site_url url = 'async/Authorizations/addAction'}';
	var updateActionUrl = '{site_url url = 'async/Authorizations/updateAction'}';
	var getActionUrl = '{site_url url="async/authorizations/getAction"}';
	var getResourceUrl = '{site_url url='async/Authorizations/getResource'}';
	var deleteActionUrl = '{site_url url="async/authorizations/deleteAction"}';
	var browseAuthorizationsUrl = '{site_url url="async/Authorizations/browseAuthorizations"}';
	</script>
	<script src="/assets/js/pulse/authorizations.js"></script>
{/block}						

