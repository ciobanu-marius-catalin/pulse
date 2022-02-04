<?php
/* Smarty version 3.1.29, created on 2016-08-04 09:19:35
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\errors\pageNotFound.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a2de77256126_31192078',
  'file_dependency' => 
  array (
    '440756fc72636f0ae76557e8691e015c28ab6311' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\errors\\pageNotFound.tpl',
      1 => 1470291561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/layout.tpl' => 1,
  ),
),false)) {
function content_57a2de77256126_31192078 ($_smarty_tpl) {
if (!is_callable('smarty_function_site_url')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.site_url.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_380557a2de7724eec2_34597961',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
    
<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_2312257a2de77250ef0_66465714',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:errors/pageNotFound.tpl */
function block_380557a2de7724eec2_34597961($_smarty_tpl, $_blockParentStack) {
?>

    <title>Access denied</title>
<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:errors/pageNotFound.tpl */
function block_2312257a2de77250ef0_66465714($_smarty_tpl, $_blockParentStack) {
?>

    <p></p><p></p>
    <div class="row">

        <div class="col-sm-3">
            <img src="<?php echo smarty_function_site_url(array(),$_smarty_tpl);?>
assets/images/error404.jpg" />
        </div>
        
        <div class="col-sm-9">
            
            <h3>Page not found.</h3>
            
        </div>
    </div>      
            
<?php
}
/* {/block 'body'} */
}
