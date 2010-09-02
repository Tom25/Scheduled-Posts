<?php
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'INSTALL_TEST_MOD'				=> 'Install Future Posts',
	'INSTALL_TEST_MOD_CONFIRM'		=> 'Are you ready to install the Future Posts MOD?',
	'TEST_MOD'						=> 'Future Posts',

	'UNINSTALL_TEST_MOD'			=> 'Uninstall Future Posts',
	'UNINSTALL_TEST_MOD_CONFIRM'	=> 'Are you ready to uninstall the Future Posts MOD?  All settings and data saved by this mod will be removed!',
	'UPDATE_TEST_MOD'				=> 'Update Future Posts MOD',
	'UPDATE_TEST_MOD_CONFIRM'		=> 'Are you ready to update the Future Posts MOD?',
));

?>