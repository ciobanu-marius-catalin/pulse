<?php
/* Smarty version 3.1.29, created on 2016-07-28 17:46:34
  from "C:\Users\dell1\Documents\NetBeansProjects\pulse\application\views\poc\jquery3X.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579a1aca64fa84_61543052',
  'file_dependency' => 
  array (
    '8584e383efd5f933a5d569472ad2bf78465e8274' => 
    array (
      0 => 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\views\\poc\\jquery3X.tpl',
      1 => 1469617081,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shared/layout.tpl' => 1,
  ),
),false)) {
function content_579a1aca64fa84_61543052 ($_smarty_tpl) {
if (!is_callable('smarty_function_bundle')) require_once 'C:\\Users\\dell1\\Documents\\NetBeansProjects\\pulse\\application\\libraries\\Smarty\\plugins\\function.bundle.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "head", array (
  0 => 'block_24109579a1aca6448d6_26926639',
  1 => false,
  3 => 0,
  2 => 0,
));
?>
	
<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "body", array (
  0 => 'block_32610579a1aca64c172_57003455',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, "scripts", array (
  0 => 'block_18675579a1aca64e493_08630424',
  1 => false,
  3 => 0,
  2 => 0,
));
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:shared/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'}  file:poc/jquery3X.tpl */
function block_24109579a1aca6448d6_26926639($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo smarty_function_bundle(array('name'=>'datetimepicker'),$_smarty_tpl);?>

<?php
}
/* {/block 'head'} */
/* {block 'body'}  file:poc/jquery3X.tpl */
function block_32610579a1aca64c172_57003455($_smarty_tpl, $_blockParentStack) {
?>



	<div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
					<input type="text" id="datetimepicker" class="form-control"><br/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
		</div>
	</div>

<?php
}
/* {/block 'body'} */
/* {block 'scripts'}  file:poc/jquery3X.tpl */
function block_18675579a1aca64e493_08630424($_smarty_tpl, $_blockParentStack) {
?>

	<?php echo '<script'; ?>
>

		$(function () {
			$('#datetimepicker').datetimepicker()

		});
	<?php echo '</script'; ?>
>
<?php
}
/* {/block 'scripts'} */
}
