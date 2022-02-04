{extends file='shared/layout.tpl'}


{block name="head"}
	{bundle name = 'grid2'}
	{bundle name = 'formz'}
	{bundle name = 'select2'}
	{bundle name = 'knockout'}
	{bundle name='datetimepicker'}

{/block}		
{block name='body'}
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

{/block}

{block name='scripts'}
	<script>
		var browseEmployeesUrl = '{site_url url="async/Employees/browseEmployees"}';
	</script>
	<script src="/assets/js/pulse/employees.js"></script>
{/block}	