{extends file='shared/login_layout.tpl'}

{block name='head'}	
	{bundle name='formz'}
	{bundle name='knockout'}
	<title>Log in</title>


{/block}

{block name='body'}
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4"><div class="logo"></div>
				<div class="account-wall">
					<form id="authForm" class="form-signin" action="{site_url url="authenticate/auth"}" method="post">
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
{/block}

{block name='scripts'}
	<script>
		var messages;
		{if isset($messages)}
			messages = {$messages};
		{/if}
		var redirect;
		{if isset($redirect)}
			redirect = '{$redirect}';
		{/if}
	</script>
	<script src="/assets/js/pulse/authenticate.js"></script>

{/block}
