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


    function get()
    {
        $query = $this->db->get('games', 18);
        return $query->result();
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
        $this->db->where('start_time <', date('Y-m-d H:i:s'));
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
