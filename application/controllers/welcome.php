<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
echo '<pre>';
		$this->load->model('GameModel', 'games');
		print_r($this->games->get_next_game());
		// $this->games->opponent = 'Carolina Hurricanes';
		// $this->games->start_time = date('Y-m-d H:i:s');
		// $this->games->create();
		print_r($this->games->get_blocks(2));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */