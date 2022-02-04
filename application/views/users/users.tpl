{extends file='shared/layout.tpl'}

{block name="head"}
	{bundle name='select2'}
	{bundle name='grid2'}
	{bundle name='formz'}
	{bundle name='datetimepicker'}
	{bundle name='knockout'}
{/block}		
{block name="body"}


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

	<!-- Add user modal -->
	<div class="modal fade" id="addUserModal" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="addUserLabel">Add User</h4>
				</div>
				<div class="modal-body" >
					<form method="POST" id="addUserForm">
							<div class="form-group col-sm-6">
									<label for="username">Username</label>
									<input data-bind="value: username" type="text" id="username" name="username" autocomplete="off"  class="form-control"/>
							</div>

							<div class="form-group col-sm-6">
											<label for="startDate">Start Date</label>
											<div class='input-group date' data-bind='datepicker: test_date' >
													<input id="startDate" name="startDate"  class="form-control"><br/>
													<span class="input-group-addon">
															<span class="glyphicon glyphicon-calendar"></span>
													</span>
											</div>
							</div>



							<div class="form-group col-sm-6">
									<label for="password">Password</label>
									<input data-bind="value: password" type="text" id="password" name="password" autocomplete="off"  class="form-control"/>
							</div>

							<div class="form-group col-sm-6">
									<label for="confirmPassword">Confirm password</label>
									<input data-bind="value: confirmPassword" type="text" id="confirmPassword" name="confirmPassword" autocomplete="off"  class="form-control"/>
							</div>

							<div class="form-group col-sm-6">
									<label for="givenName">Given name</label>
									<input data-bind="value: givenName" type="text" id="givenName" name="givenName" autocomplete="off"  class="form-control"/>
							</div>

							<div class="form-group col-sm-6">
									<label for="familyName">Family name</label>
									<input data-bind="value: familyName" type="text" id="familyName" name="familyName" autocomplete="off"  class="form-control"/>
							</div>

							<div class="form-group" style="padding-left:15px; padding-right:15px;">
									<label for="email">Email</label>
									<input data-bind="value: email" type="text" id="email" name="email"  class="form-control"/>
							</div>
      
							
							<div class="form-group" style="padding-left:15px; padding-right:15px;">	
									<label for="roles">Roles</label>
									<select id="roles" style="width:100%" name="roles" class="form-control " ></select>
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


{/block}

{block name="scripts"}

	<script>
	
		var deleteUserViewModel = (function () {
		function deleteUserViewModel() {
			this.userId = ko.observable();
		}
		return deleteUserViewModel;
}());

		var addUpdateUserViewModel = (function () {
		function addUpdateUserViewModel() {
			this.username= ko.observable("");
			this.startDate = ko.observable(new Date());
			this.password= ko.observable("");
			this.confirmPassword= ko.observable("");
			this.givenName= ko.observable("");
			this.familyName= ko.observable("");
			this.email= ko.observable("");
			this.roles= ko.observable("");
		}
		return addUpdateUserViewModel;
}());
		
		var deleteUserModel = new deleteUserViewModel();
		ko.applyBindings(deleteUserModel, $('#deleteUserForm')[0]);
		
		var addUpdateUserModel = new addUpdateUserViewModel();
		ko.applyBindings(addUpdateUserModel, $('#addUserForm')[0]);	
		
		//nr de rezultate întoarse pentru auto complete. Daca sunt întoarse 0 trebuie să creez un nou grup
		//deci trebuie să afișez și descrierea grupului
		//este nevoie de o valoare implicită nenulă pentru a nu se afișa descrierea înainte ca utilizatorul
		//să selecteze ceva
		numberOfResults = 1;
		
		showingAddModal = true;

		function addUser() {
			
			$.blockUI({ baseZ: 9000});
			
			var data = ko.toJS(addUpdateUserModel);
			
			data.roles = $('#roles').val();
						
			var url = '{site_url url = 'async/Users/addUser'}';

			//document.write(addUpdateUserModel.userId);
			if ( addUpdateUserModel.userId)
				url = '{site_url url = 'async/Users/updateUser'}';
			
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
					if (addUpdateUserModel.userId) 
						new PNotify({ title: 'Info', text: 'User was updated', type: 'info', styling: 'bootstrap3'});
					else 
						new PNotify({ title: 'Info', text: 'User was added', type: 'info', styling: 'bootstrap3'});

					$('#addUserModal').modal('hide');
					$('#users').grid('reload');
					
				}
			});
		}

		function showAddUserModal() {
		
			addUpdateUserModel.userId(undefined);
			
			showingAddModal = true;
			$('#addUserLabel').text('Add User');

			addUpdateUserModel.username(null);
			addUpdateUserModel.startDate(null);
			addUpdateUserModel.password(null);
			addUpdateUserModel.confirmPassword(null);
			addUpdateUserModel.givenName(null);
			addUpdateUserModel.familyName(null);
			addUpdateUserModel.email(null);

			$('#roles').empty();
			$('#roles').append($("<option></option>")
				.attr("value", '')
				.text(''));
			$('#selectElement').select2('val', '', true);
			$('#addActionModal').formz('clearErrors');
		}

		function onEditUser(id) {
			addUpdateUserModel.userId;

			$.ajax({
				url: '{site_url url="async/Users/getUser"}'
				, type: 'POST'
				, dataType: 'json'
				, data: { id: id}
				, error: function () {
					new PNotify({ title: 'Eroare', text: 'Server communication error.', type: 'error', styling: 'bootstrap3'});

				}
				, success: function (response) {
					if( ! $('#addUserModal').formz('processErrors', response) )
						return;
					
					showingAddModal = false;

					
					addUpdateUserModel.username(response.action.username);
					addUpdateUserModel.startDate(response.action.startDate);
					addUpdateUserModel.password(response.action.password);
					addUpdateUserModel.confirmPassword(response.action.confirmPassword);
					addUpdateUserModel.givenName(response.action.givenName);
					addUpdateUserModel.familyName(response.action.familyName);
					addUpdateUserModel.email(response.action.email);

					$('#roles').empty();
					$('#roles').append($("<option></option>")
						.attr("value", response.action.groupName)
						.text(response.action.roles));
					$('#selectElement').select2('val', response.action.roles, true);

					$('#addUserLabel').text('Update Action');
					$('#addUserModal').formz('clearErrors');
					$('#addUserModal').modal('show');					

					//alert(ko.toJSON(addUpdateActionModel));

				}
			});
		}

		function onDeleteUser(id) {
		
		//alert(ko.toJSON(addUpdateActionModel));
			deleteUserModel.userId(id);
			$('#deleteUserModal').modal('show');
		}

		function actionFormatter(value, id) {
			return '<a href="javascript:onEditUser(' + id + ')"><span class="glyphicon glyphicon-edit"></span></a>'
					+ ' <a href="javascript:onDeleteUser(' + id + ')"><span class="glyphicon glyphicon-trash"></span></a>';
		}	
		
		function actionFormatterStatus(value, id) {
			if(value==1)
				return 'Activ';
			if(value==2)
				return 'Suspendat';
		}

		function deleteUser(){
			
			$.blockUI({ baseZ: 9000 });
			
			$.ajax({
				url: '{site_url url="async/users/deleteUser"}'
				, type: 'POST'
				, dataType: 'json'
				, data: ko.toJS(deleteUserModel)
				, error: function() {
					$.unblockUI();
					new PNotify({ title: 'Eroare', text: 'Server communication error.', type: 'error', styling: 'bootstrap3' });
				}
				, success: function(response) {
					if( ! $('#deleteUserModal').formz('processErrors', response) )
						return;
					$('#deleteUserModal').modal('hide');
					$('#users').grid('reload');
					$.unblockUI();

					new PNotify({ title: 'Into', text: 'The user was deleted.', type: 'info', styling: 'bootstrap3' });
				}
			});
		}

		$(function () {

			$('#startDate').datetimepicker();
			$('#AddUserButton').click(showAddUserModal);
			$('#deleteUserOk').click(deleteUser);
			$('#addUser').click(addUser);

			//Dacă este apăsat enter într-un input din formular se dă submit formularului, modific acțiunea formularului.
			//Formularul la submit va apela funcția ce adaugă datele folosind ajax
			
			$('#addUserForm').submit(function(event){
				// prevent default browser behaviour
				event.preventDefault();				
				addUser();
			});

			$('#users').grid({
				url: '{site_url url="async/Users/browseUsers"}'
				, columns: [
										{ index: 'username', label: 'Username', sortable: true}
                                        ,{ index: 'familyName', label: 'First Name', sortable: true}	
                                        ,{ index: 'givenName', label: 'Last Name', sortable: true} 
                                        ,{ index: 'email', label: 'Email', sortable: true}
                                        ,{ index: 'status', label: 'Status',searchOptions: { type: 'select', values:{$userSelector }},sopt:{$userSelector }, formatter: actionFormatterStatus,sortable: false}
										, { index: 'actions', label: '', sortable: false, width: 40, formatter: actionFormatter, searchable: false}
				]

				, columnFilters: true
				, rowNumbers: true
				, sortname: 'status'

						//, searchBox: true
			});

			

			$("#roles").select2({
				placeholder: 'Select / search',
				allowClear: true,
				multiple: true,			
				closeOnSelect: true,
				ajax: {
					url: '{site_url url='async/Users/getResource'}',
					dataType: 'json',					
					delay: 250,
					type: 'POST',
					data: function (params) {
						return {
							search: params.term, // search term
							rows : 10
						};
					},
					processResults: function (data, params) {
						numberOfResults = data.items.length;
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


	</script>
{/block}						
