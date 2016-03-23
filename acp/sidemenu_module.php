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

			$config->set('socialsidemenu_active', $request->variable('socialsidemenu_active', 0, false));
			$config->set('socialpopup_active', $request->variable('socialpopup_active', 0, false));
			$config->set('facebook_page', $request->variable('facebook_page', '', true));

			trigger_error($user->lang['SOCIALSIDEMENU_SAVED_SETTINGS'] . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'SOCIALSIDEMENU_ACTIVE'			=> $config['socialsidemenu_active'],
			'SOCIALPOPUP_ACTIVE'			=> $config['socialpopup_active'],
			'FACEBOOK_PAGE'			=> $config['facebook_page'],
			'U_ACTION'				=> $this->u_action,
		));

	}

}
