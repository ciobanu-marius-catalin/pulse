<?php
/* Smarty version 3.1.29, created on 2016-08-03 17:16:46
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\errors\accessDenied.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a1fcce41a801_81818827',
  'file_dependency' => 
  array (
    '3ce360a35e306b8e6a631ab7ffe843a8111f8d76' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\errors\\accessDenied.tpl',
      1 => 1470233760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/layout.tpl' => 1,
  ),
),false)) {
function content_57a1fcce41a801_81818827 ($_smarty_tpl) {
if (!is_callable('smarty_function_site_url')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.site_url.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_2723357a1fcce413851_14682955',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
    
<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_243857a1fcce415786_74713174',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:errors/accessDenied.tpl */
function block_2723357a1fcce413851_14682955($_smarty_tpl, $_blockParentStack) {
?>

    <title>Access denied</title>
<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:errors/accessDenied.tpl */
function block_243857a1fcce415786_74713174($_smarty_tpl, $_blockParentStack) {
?>

    <p></p><p></p>
    <div class="row">

        <div class="col-sm-3">
            <img src="<?php echo smarty_function_site_url(array(),$_smarty_tpl);?>
assets/images/error403.png" />
        </div>
        
        <div class="col-sm-9">
            
            <h3>Access denied.</h3>
            
        </div>
    </div>      
            
<?php
}
/* {/block 'body'} */
}
