<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{*base_url*}">{$version}</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				{foreach $menus as $menu}
					<li class="dropdown{$menu['activeClass']}}">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">{$menu['label']} <b class="caret"></b></a>
							<ul class="dropdown-menu">
								{foreach $menu['menus'] as $submenu}
									{if isset($submenu)}
										<li><a href="{$submenu['url']}">{$submenu['label']}</a></li>
									{else}
										<li class="divider"></li>
									{/if}
								{/foreach}
							</ul>
					</li>
				{/foreach}
			</ul>
			{if $user !== null }		
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> 
							{$user->getUsername()} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{site_url url="users/preferences"}"><span class="glyphicon glyphicon-cog"></span> Setări cont</a></li>
							<li class="divider"></li>
							<li><a href="{site_url('authenticate/logout')}" alt="Deconectare"><span class="glyphicon glyphicon-log-out"></span> Deconectare </a></li>
						</ul>
					</li>					
				</ul>
			{else}
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{site_url url="authenticate/index"}">Log in</a></li>
				</ul>
			{/if}
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
