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
* Migration stage 1: Initial module
*/
class m1_module_installation extends \phpbb\db\migration\migration
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
		return array('\phpbb\db\migration\data\v310\gold');
	}

	/**
	* Add or update data in the database
	*
	* @return array Array of table data
	* @access public
	*/
	public function update_data()
	{
		return array(
			// Add the new category
			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_SOCIALSIDEMENU'
			)),

			// Add the new module under category
			array('module.add', array(
				'acp', 'ACP_SOCIALSIDEMENU', array(
					'module_basename'	=> '\emmea90\socialsidemenu\acp\sidemenu_module',
					'modes'				=> array('manage'),
				),
			)),
		);
	}

	public function revert_data()
	{
		return array(
			// Remove Category
			array('module.remove', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_SOCIALSIDEMENU')),
		);
	}
}
