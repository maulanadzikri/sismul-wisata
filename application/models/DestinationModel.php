<?php

class DestinationModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAll() {
        $query = $this->db->get('destinasi');
        return $query->result_array();
    }

    public function getById($id) {
        $query = $this->db->get_where('destinasi', array('id' => $id));
        return $query->row_array();
    }

    public function insert($data) {
        return $this->db->insert('destinasi', $data);
    }

    public function update($id, $data){
        return $this->db->update('destinasi', $data, array('id' => $id));
    }

    public function delete($id) {
        return $this->db->delete('destinasi', array('id' => $id));
    }

	public function deleteAll(){
		return $this->db->empty_table('destinasi');
	}
}
