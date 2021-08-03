<?php class Admin_Model extends CI_Model {

    protected $table = 'communes';

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        return $this->db->get($this->table)
                        ->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, array('id' => $id))
                        ->row();
    }
	
	 
    public function get_where($where) {
        return $this->db->where($where)
                        ->get($this->table)
                        ->result();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}
