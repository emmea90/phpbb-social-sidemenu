<?php
/**
*
* Socialsidemenu for Phpbb
*
* @copyright (c) 2014 phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace emmea90\socialsidemenu\migrations\v001;

/**
* Migration stage 4: set permissions
*/
class m2_permission_installation extends \phpbb\db\migration\migration
{
	/**
	* Assign migration file dependencies for this migration
	*
	* @return array Array of migration files
	* @static
	* @access public
	*/
	static public function depends_on()
	{
		return array('\emmea90\socialsidemenu\migrations\v001\m1_module_installation');
	}

	/**
	* Add or update permissions
	*
	* @return array Array of table data
	* @access public
	*/
	public function update_data()
	{
		return array(
			array('permission.add', array('a_can_manage_sidemenu')),

			// Set permissions
			array('permission.permission_set', array('ROLE_ADMIN_FULL', 'a_can_manage_sidemenu')),
			array('permission.permission_set', array('ROLE_ADMIN_STANDARD', 'a_can_manage_sidemenu')),

		);
	}

	public function revert_data()
	{
		return array(
			array('permission.remove', array('a_can_manage_sidemenu')),
		);
	}
}
