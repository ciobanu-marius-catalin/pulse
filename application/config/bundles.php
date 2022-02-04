<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

$config['bundles'] = array();


$config['bundles']['knockout-3.4.0'] = array(
	'knockout-3.4.0/knockout-3.4.0.js'
	);
$config['bundles']['grid2'] = array(
	'grid2/grid2.css'
	, 'grid2.js'
	);

$config['bundles']['select2-4.0.3'] = array(
	'select2-4.0.3/select2.min.css'
	, 'select2-4.0.3/select2.css'
	, 'select2-4.0.3/select2.full.js'
);

$config['bundles']['datetimepicker-4.17.37'] = array (
		'moment-with-locales.min.js'
		, 'bootstrap-datetimepicker-4.17.37/bootstrap-datetimepicker.min.js'
		, 'bootstrap-datetimepicker-4.17.37/bootstrap-datetimepicker.min.css'
);

$config['bundles']['pnotify-3.0.0'] = array(
	'pnotify-3.0.0/pnotify.custom.min.css'
	, 'pnotify-3.0.0/pnotify.custom.min.js'
);

$config['bundles']['bootstrap-3.3.7'] = array (
	'bootstrap-3.3.7/css/bootstrap.min.css'
	, 'bootstrap-3.3.7/css/bootstrap-theme.css'
	, 'bootstrap-3.3.7/bootstrap.min.js'
);

$config['bundles']['jquery-2.2.4'] = array(
	'jquery-2.2.4.js'
);

$config['bundles']['blockui-2.70'] = array(
	'jquery.blockUI-2.70/jquery.blockUI.js'
);

$config['bundles']['formz'] = array (
	'forms.js'
);



$config['bundles']['select2'] = $config['bundles']['select2-4.0.3'];
$config['bundles']['pnotify'] = $config['bundles']['pnotify-3.0.0'];
$config['bundles']['blockui'] = $config['bundles']['blockui-2.70'];
$config['bundles']['bootstrap'] = $config['bundles']['bootstrap-3.3.7'];
$config['bundles']['datetimepicker'] = $config['bundles']['datetimepicker-4.17.37'];
$config['bundles']['jquery'] = $config['bundles']['jquery-2.2.4'];
$config['bundles']['grid2'] = $config['bundles']['grid2'];
$config['bundles']['knockout'] = $config['bundles']['knockout-3.4.0'];
