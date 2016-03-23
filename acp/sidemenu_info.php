<?php

/**
*
* @package - Maps
* @version $Id: acp_maps.php
* @copyright (c) emmea90
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace emmea90\socialsidemenu\acp;

/**
* @package tracks
*/
class maps_info
{
	function module()
	{
		return array(
			'filename'    => '\emmea90\socialsidemenu\acp\sidemenu_module',
			'title'        => 'ACP_SOCIALSIDEMENU',
			'version'    => '1.0.0',
			'modes'		=> array(
				'manage'	=> array(
				'title'		=> 'ACP_SOCIALSIDEMENU_CATEGORY',
				'auth'		=> 'acl_a_can_manage_sidemenu',
				'cat'		=> array('ACP_SOCIALSIDEMENU'),
				),
			),
		);
	}
}
