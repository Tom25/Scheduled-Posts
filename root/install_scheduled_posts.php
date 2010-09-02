<?php
/**
*
* @author Tom (Tom Catullo) tom@cortello.com
* @package umil
* @version $Id install_scheduled_posts.php 1.0.0 2010-07-23 16:54:36GMT Tom $
* @copyright (c) 2010 Cortello Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('mods/umil_scheduled_posts_mod');

if (!file_exists($phpbb_root_path . 'umil/umil.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

// We only allow a founder to install this MOD
if ($user->data['user_type'] != USER_FOUNDER)
{
	if ($user->data['user_id'] == ANONYMOUS)
	{
		login_box('', 'LOGIN');
	}
	trigger_error('NOT_AUTHORISED');
}

if (!class_exists('umil'))
{
	include($phpbb_root_path . 'umil/umil.' . $phpEx);
}

$umil = new umil(true);

$mod = array(
	'name'		=> $user->lang['TEST_MOD'],
	'version'	=> '1.0.0',
	'config'	=> 'scheduled_posts_version',
	'enable'	=> 'scheduled_posts_enable',
);

if (confirm_box(true))
{
	// Install the base 1.0.0 version
	if (!$umil->config_exists($mod['config']))
	{
		// Lets add a config setting for enabling/disabling the MOD and set it to true
		$umil->config_add($mod['enable'], true);

		// We must handle the version number ourselves.
		$umil->config_add($mod['config'], $mod['version']);

		$umil->permission_add(array(
			array('f_future_post', 0),
			array('m_viewfp', 0),
		));

		// Our final action, we purge the board cache
		$umil->cache_purge();
	}

	// We are done
	trigger_error('Done!');
}
else
{
	confirm_box(false, 'INSTALL_TEST_MOD');
}

// Shouldn't get here.
redirect($phpbb_root_path . $user->page['page_name']);

?>