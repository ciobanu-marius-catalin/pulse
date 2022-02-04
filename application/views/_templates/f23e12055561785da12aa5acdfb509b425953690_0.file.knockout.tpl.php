<?php
/* Smarty version 3.1.29, created on 2016-08-05 16:41:20
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\knockout.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a497801573e6_20212135',
  'file_dependency' => 
  array (
    'f23e12055561785da12aa5acdfb509b425953690' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\knockout.tpl',
      1 => 1470404471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/layout.tpl' => 1,
  ),
),false)) {
function content_57a497801573e6_20212135 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_2044157a49780148c65_39925981',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_1987057a49780152da1_45131522',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "scripts", array (
  0 => 'block_2470357a49780155014_64048647',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:knockout.tpl */
function block_2044157a49780148c65_39925981($_smarty_tpl, $_blockParentStack) {
?>

<?php echo smarty_function_bundle(array('name'=>'knockout'),$_smarty_tpl);?>
	
<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:knockout.tpl */
function block_1987057a49780152da1_45131522($_smarty_tpl, $_blockParentStack) {
?>

<p>First name: <input data-bind="value: firstName" /></p>
<p>Last name: <input data-bind="value: lastName" /></p>
<h2>Hello, <span data-bind="text: fullName"> </span>!</h2>
<?php
}
/* {/block 'body'} */
/* {block 'scripts'}  file:knockout.tpl */
function block_2470357a49780155014_64048647($_smarty_tpl, $_blockParentStack) {
?>

<?php echo '<script'; ?>
>
			$(function () {
	// Here's my data model
var ViewModel = function(first, last) {
    this.firstName = ko.observable(first);
    this.lastName = ko.observable(last);
 
    this.fullName = ko.pureComputed(function() {
        // Knockout tracks dependencies automatically. It knows that fullName depends on firstName and lastName, because these get called when evaluating fullName.
        return this.firstName() + " " + this.lastName();
    }, this);
};
 
ko.applyBindings(new ViewModel("Planet", "Earth"));
});
<?php echo '</script'; ?>
>	

<?php
}
/* {/block 'scripts'} */
}
