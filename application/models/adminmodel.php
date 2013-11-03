<?php

class AdminModel extends CI_Model
{
	function _get_admin($game_id)
	{
		include('get-admin.php');
		return $is_admin;
	}
}