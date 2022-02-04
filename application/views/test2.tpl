{extends file="shared/login_layout.tpl"}

{block name="head"}	
	{bundle name="formz"}
	
        <title>Autentificare</title>
        
	<script type="text/javascript">
		var _messages = null;
		
		$(function(){
			{if isset($messages)}
				_messages = {$messages};
				$('#authForm').formz('processErrors', _messages);
				for(var i = 0; i < _messages.length; i++){					
					new PNotify({ title: 'Eroare', text: messages[i], type: 'error', styling: 'bootstrap3' });
				}
			{/if}
		});
	</script>
{/block}
{block name="body"}
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4"><div class="logo"></div>
            <div class="account-wall">
				<form id="authForm" class="form-signin" action="{site_url url="authenticate/auth_run"}" method="post">
					<input type="hidden" name="redirect" value="{if isset($redirekt) and $redirekt neq '/' and strtoupper($redirekt) neq '%2F'}{$redirekt}{/if}"/>
					<div class="left-inner-addon ">
						<span class="glyphicon glyphicon-envelope"></span> 						
						<input type="text" class="form-control" placeholder="Email" name="username" id="username" required autofocus>
					</div>
					<div class="left-inner-addon ">
						<span class="glyphicon glyphicon-asterisk"></span> 		             
						<input type="password" class="form-control" placeholder="Parolă" name="password" id="password"  required>
					</div>    
	                <button class="btn btn-lg btn-success btn-block" type="submit" id="login"><i class="glyphicon glyphicon-log-in"></i> Autentificare</button>
				</form>
            </div>
        </div>
    </div>
</div>
{/block}
