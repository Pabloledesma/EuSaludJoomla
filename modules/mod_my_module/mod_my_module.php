<?php
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once( dirname(__FILE__) . '/helper.php' );

$hello = modMyModuleHelper::getHello($params);
require( JModuleHelper::getLayoutPath('mod_my_module'));