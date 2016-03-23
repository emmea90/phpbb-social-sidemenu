<?php

namespace emmea90\socialsidemenu\acp;

/**
* @package tracks
*/
class sidemenu_module
{
	var $u_action;

	public function main($id, $mode)
	{
		global $user, $template, $config, $request;

		// Add the pages ACP lang file
		$user->add_lang_ext('emmea90/socialsidemenu', 'acp_socialsidemenu');

		add_form_key('acp_socialsidemenu');

		$this->page_title = 'ACP_SOCIALSIDEMENU';
		$this->tpl_name = 'acp_socialsidemenu';
		$submit = (isset($_POST['submit'])) ? true : false;

		if ($submit)
		{
			if (!check_form_key('acp_socialsidemenu'))
			{
				trigger_error('FORM_INVALID');
			}

			$config->set('tracks_apikey', $request->variable('tracks_apikey', '', true));

			trigger_error($user->lang['TRACKS_SAVED_SETTINGS'] . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'TRACKS_APIKEY'			=> $config['tracks_apikey'],
			'U_ACTION'				=> $this->u_action,
		));

	}

}
