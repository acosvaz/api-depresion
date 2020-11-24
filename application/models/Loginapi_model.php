<?php

class Loginapi_model extends CI_Model {
    
    public function __construct() {
        Parent::__construct();
    $this->load->database();
    }
    
    public function login($username, $password) {
                $this->db->where('username',$username);
                $this->db->where('password',$password);
		$query = $this->db->get('usuarios');
        if ($query->num_rows() === 1) {
            $result = $query->result();
            return $result[0]->id;
            //return $query->row();
        }
        return false;
    }

  public function rol($id) {
                $this->db->select('tipo');
                $this->db->from('usuarios');
                $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() === 1) {
            $result = $query->result();
            return $result[0]->tipo;
            //return $query->row();
        }
        return false;
    }

  public function nombre($id) {
                $this->db->select('nombre');
                $this->db->from('usuarios');
                $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() === 1) {
            $result = $query->result();
            return $result[0]->nombre;
        }
        return false;
    }
}