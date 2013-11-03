<?php
class GameModel extends CI_Model {

    var $id = '';
    var $opponent = '';
    var $start_time = '';
    var $end_time = '';
    var $blocks = '';
    var $columns = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $this->load->model('GameBlockModel', 'block');

        $this->columns = array('B', 'I', 'N', 'G', 'O');
    }


    function get($id=null)
    {
        $this->db->select('*');
        $this->db->select("DATE_FORMAT(start_time, '%a, %b %D') AS nice_start_date", false);
        $this->db->select("DATE_FORMAT(start_time, '%W, %M %D') AS nicer_start_date", false);
        $this->db->select("DATE_FORMAT(start_time, '%h:%i%p') AS nice_start_time", false);

        if ($id)
        {
            $this->db->where("id", $id);
            $query = $this->db->get('games');
            if ($query->num_rows()>0) {
                $results = $query->result_array();
                return $results[0];
            }
            return null;
        }

        $this->db->where("start_time <=", date('Y-m-d 23:59:59'));
        $this->db->order_by("start_time", "desc");
        $query = $this->db->get('games', 12);

        return $query->result_array();
    }

    
    function get_blocks($game_id)
    {
        $this->block->game_id = $game_id;
        return $this->block->get_all();
    }


    function create_gameboard()
    {
        if (!$this->id)
        {
            return null;
        }

        $this->db->where('active', 1);
        $this->db->order_by("id", "random");
        $this->db->limit(25);
        $suggestions_query = $this->db->get('suggestions');

        $suggestions = $suggestions_query->result_array();

        $suggestion_counter = 0;

        foreach ($this->columns as $col)
        {
            for($row = 1; $row <= 5; $row++)
            {
                $random_suggestion = $suggestions[$suggestion_counter];
                $this->blocks[] = array(
                    'suggestion_id' => $random_suggestion['id'],
                    'suggestion' => $random_suggestion['suggestion'],
                    'details' => $random_suggestion['details'],
                    'row' => $row,
                    'column' => $col,
                    'hit' => 0
                );

                $suggestion_counter++;
            }
        }
        return $this->blocks;
    }

    function create()
    {
        $saved = $this->save();
        if (!$saved)
        {
            return false;
        }

        $this->create_gameboard();
        $this->save_gameboard();
    }

    function save()
    {
        if (!$this->opponent || !$this->start_time)
        {
            return false;
        }

        $data = array(
            'opponent' => $this->opponent,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time
        );

        if ($this->id)
        {
            $this->db->where('id', $this->id);
            $this->db->update('games', $data);
            return true;
        }

        $this->db->insert('games', $data);
        $this->id = $this->db->insert_id();
        return true;
    }

    function save_gameboard()
    {
        foreach ($this->blocks as $block) {
            if (isset($block['id']))
            {
                $this->block->id = $block['id'];
            }

            $this->block->suggestion_id = $block['suggestion_id'];
            $this->block->game_id = $this->id;
            $this->block->row = $block['row'];
            $this->block->column = $block['column'];
            $this->block->hit = $block['hit'];

            $this->block->save();
        }
    }

    function get_next()
    {
        $this->db->where('start_time <', date('Y-m-d 23:59:59'));
        $query = $this->db->get('games');

        $next_game = null;

        foreach ($query->result() as $game)
        {
            if (!$next_game OR $game->start_time > $next_game->start_time)
            {
                $next_game = $game;
            }
        }
        return $next_game;
    }
}
