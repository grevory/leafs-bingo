<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Play extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($game_id = false)
	{
		$this->load->model('GameModel', 'games');
		$this->load->model('TeamModel', 'teams');
		$this->load->model('AdminModel', 'admin');
		$this->load->helper('html');
		$this->load->helper('url');

		if (!$game_id)
		{
			$next_game = $this->games->get_next();
			$game_id = $next_game->id;
		}

		$data = array(
			'blocks' => $this->games->get_blocks($game_id),
			'current_game' => $this->games->get($game_id),
			'games' => $this->games->get(),
			'teams' => $this->teams->get(),
			'admin' => $this->admin->_get_admin($game_id)
		);
		$this->load->view('gameboard', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */