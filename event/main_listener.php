<?php
// ext/emmea90/socialsidemenu/event/main_listener.php

/**
 *
 * @package socialsidemenu
 * @copyright emmea90
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace emmea90\socialsidemenu\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class main_listener implements EventSubscriberInterface
{
	/** @var \phpbb\controller\auth */
	protected $auth;

	/** @var \phpbb\controller\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\helper */
	protected $helper;

	/** @var root_path */
	protected $root_path;

	/** @var php_ext */
	protected $php_ext;

	/**
	* Constructor
	*
	* @param \phpbb\auth\auth               $auth               Authentication object
	* @param \phpbb\config\config	       	$config				Configurations
	* @param \phpbb\controller\helper       $helper             Controller helper object
	* @param \phpbb\template\template       $template           Template object
	* @param \phpbb\user                    $user               User object
	* @param string                         $phpbb_root_path    phpbb_root_path
	* @param string                         $php_ext            phpEx
	* @access public
	*/
	public function __construct(\phpbb\auth\auth $auth, \phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user, \phpbb\controller\helper $helper, $root_path, $php_ext)
	{
		$this->auth = $auth;
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
		$this->helper = $helper;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'	=>	'load_language_on_setup',
			'core.permissions'	=> 'permissions_language',
			'core.page_header'	=>	'add_main_functions',
		);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'emmea90/socialsidemenu',
			'lang_set' => 'socialsidemenu',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function permissions_language($event)
	{
		$event['categories'] = array_merge($event['categories'], array(
			'emmea90_sidemenu' => 'ACL_CAT_SOCIALSIDEMENU',
		));

		$event['permissions'] = array_merge($event['permissions'], array(
			'a_can_manage_sidemenu'	=> array('lang' => 'ACL_A_CAN_MANAGE_SITEMENU', 'cat' => 'emmea90_sidemenu')
		));
	}

	public function add_main_functions()
	{
		// Tracks editor
		$this->user->add_lang_ext('emmea90/socialsidemenu', 'socialsidemenu_global');

		$this->template->assign_vars(array(
			'SOCIALSIDEMENU_ACTIVE'			=> $this->config['socialsidemenu_active'],
			'SOCIALPOPUP_ACTIVE'			=> $this->config['socialpopup_active'],
			'FACEBOOK_PAGE'			=> $this->config['facebook_page'],
		));

	}
}
