<?php
class GameBlockModel extends CI_Model {

    var $id = null;
    var $suggestion_id = null;
    var $game_id = null;
    var $row = 'B';
    var $column = 1;
    var $hit = 0;


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->reset();
    }

    function reset()
    {
        $this->id = null;
        $this->suggestion_id = null;
        $this->game_id = null;
        $this->row = 'B';
        $this->column = 1;
        $this->hit = 0;
    }

    function get()
    {
        if (!$this->id)
        {
            return null;
        }

        $this->db->where('id', $this->id);
        $query = $this->db->get('blocks');

        foreach ($query->result() as $row)
        {
            $this->suggestion_id = $row->suggestion_id;
            $this->game_id = $row->game_id;
            $this->row = $row->row;
            $this->column = $row->column;
            $this->hit = $row->hit;
        }
    }

    function get_all()
    {
        if (!$this->game_id)
        {
            return null;
        }

        $this->db->where('game_id', $this->game_id);
        $this->db->limit(25);
        $this->db->join('suggestions', 'suggestions.id = blocks.suggestion_id and suggestions.active = 1');

        $query = $this->db->get('blocks');

        $organized_blocks = array();

        foreach ($query->result_array() as $block)
        {
            $organized_blocks[$block['row']][] = $block;
        }

        return $organized_blocks;
    }

    function save()
    {
        if (!$this->_is_valid_block())
        {
            return false;
        }

        if ($this->id && is_numeric($this->id))
        {
            $this->db->where('id', $this->id);
            $this->db->update('blocks', $this);
            return true;
        }

        $this->db->insert('blocks', $this);
        return true;
    }

    private function _is_valid_block()
    {
        if (!$this->suggestion_id OR !$this->game_id OR !$this->row OR !$this->column)
        {
            return false;
        }

        if (!in_array($this->column, array('B','I','N','G','O')))
        {
            return false;
        }

        if ($this->row < 1 OR $this->row > 5)
        {
            return false;
        }

        return true;
    }
}