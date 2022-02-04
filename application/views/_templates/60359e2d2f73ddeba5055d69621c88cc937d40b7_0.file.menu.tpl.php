<?php
/* Smarty version 3.1.29, created on 2016-08-04 10:15:44
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\shared\menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a2eba045a326_63533112',
  'file_dependency' => 
  array (
    '60359e2d2f73ddeba5055d69621c88cc937d40b7' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\shared\\menu.tpl',
      1 => 1470294879,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a2eba045a326_63533112 ($_smarty_tpl) {
if (!is_callable('smarty_function_site_url')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.site_url.php';
?>
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
			<a class="navbar-brand" href=""><?php echo $_smarty_tpl->tpl_vars['version']->value;?>
</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php
$_from = $_smarty_tpl->tpl_vars['menus']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_menu_0_saved_item = isset($_smarty_tpl->tpl_vars['menu']) ? $_smarty_tpl->tpl_vars['menu'] : false;
$_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['menu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
$__foreach_menu_0_saved_local_item = $_smarty_tpl->tpl_vars['menu'];
?>
					<li class="dropdown<?php echo $_smarty_tpl->tpl_vars['menu']->value['activeClass'];?>
}">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['menu']->value['label'];?>
 <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php
$_from = $_smarty_tpl->tpl_vars['menu']->value['menus'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_submenu_1_saved_item = isset($_smarty_tpl->tpl_vars['submenu']) ? $_smarty_tpl->tpl_vars['submenu'] : false;
$_smarty_tpl->tpl_vars['submenu'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['submenu']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['submenu']->value) {
$_smarty_tpl->tpl_vars['submenu']->_loop = true;
$__foreach_submenu_1_saved_local_item = $_smarty_tpl->tpl_vars['submenu'];
?>
									<?php if (isset($_smarty_tpl->tpl_vars['submenu']->value)) {?>
										<li><a href="<?php echo $_smarty_tpl->tpl_vars['submenu']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['submenu']->value['label'];?>
</a></li>
									<?php } else { ?>
										<li class="divider"></li>
									<?php }?>
								<?php
$_smarty_tpl->tpl_vars['submenu'] = $__foreach_submenu_1_saved_local_item;
}
if ($__foreach_submenu_1_saved_item) {
$_smarty_tpl->tpl_vars['submenu'] = $__foreach_submenu_1_saved_item;
}
?>
							</ul>
					</li>
				<?php
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_0_saved_local_item;
}
if ($__foreach_menu_0_saved_item) {
$_smarty_tpl->tpl_vars['menu'] = $__foreach_menu_0_saved_item;
}
?>
			</ul>
			<?php if ($_smarty_tpl->tpl_vars['user']->value !== null) {?>		
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> 
							<?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
 <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo smarty_function_site_url(array('url'=>"users/preferences"),$_smarty_tpl);?>
"><span class="glyphicon glyphicon-cog"></span> Setări cont</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo site_url('authenticate/logout');?>
" alt="Deconectare"><span class="glyphicon glyphicon-log-out"></span> Deconectare </a></li>
						</ul>
					</li>					
				</ul>
			<?php } else { ?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo smarty_function_site_url(array('url'=>"authenticate/index"),$_smarty_tpl);?>
">Log in</a></li>
				</ul>
			<?php }?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<?php }
}
