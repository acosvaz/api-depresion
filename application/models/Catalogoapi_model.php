<?php

class Catalogoapi_model extends CI_Model {
    
    public function __construct(){
        Parent::__construct();
    }
    
    public function get($id = null) {
        
        if(!is_null($id)){
            $this->db->select('c.id, c.nombre, c.descripcion, co.nombre_consola, c.sub_imagen1, c.sub_imagen2, c.sub_imagen3, c.sub_imagen4');
            $this->db->from('eg_catalago as c');
            $this->db->join('eg_consolas as co' , 'c.nu_consola=co.id','left');
            $this->db->where('c.id', $id);
            $query = $this->db->get();
            
            if ($query->num_rows() === 1){
            return $query->result_array();
            
            }
            
            return false;
            
        }
      
            $this->db->select('*');
            $this->db->from('respuestas as r');
            $this->db->join('usuarios as u' , 'r.user_id=u.id');
            $query = $this->db->get();
      
      if($query->num_rows() > 0){
          return $query->result_array();
      }
      
      return false;
      
    }

    public function filtro($max, $min) {
      
            $this->db->select('*');
            $this->db->from('respuestas as r');
            $this->db->join('usuarios as u' , 'r.user_id=u.id');
            $this->db->where('r.elaboracion BETWEEN"'. date('Y-m-d', strtotime($max)) . '"AND"'. date('Y-m-d', strtotime($min)).'"');
            //$this->db->where('r.elaboracion <=', $max);
            $query = $this->db->get();
      
      if($query->num_rows() > 0){
          return $query->result_array();
      }
      
      return false;
      
    }

    public function porcent() {
      $sql = "select ROUND((ROUND((COUNT( r.nivel = 'No depresion' or null)* 100),1)/ROUND(COUNT(r.nivel),1)),1) AS NoDepresion,  ROUND((ROUND((COUNT( r.nivel = 'Depresion Leve' or null)* 100),1)/ROUND(COUNT(r.nivel),1)),1) AS DepresionLeve, ROUND((ROUND((COUNT( r.nivel = 'Depresion Moderada' or null)* 100),1)/ROUND(COUNT(r.nivel),1)),1) AS DepresionModerada, ROUND((ROUND((COUNT( r.nivel = 'Depresion Grave' or null)* 100),1)/ROUND(COUNT(r.nivel),1)),1) AS DepresionGrave from respuestas as r inner join usuarios as u on u.id = r.user_id";

      $query = $this->db->query($sql);
      
      if($query->num_rows() > 0){
          return $query->row();
      }
      
      return false;
      
    }

    
    public function carrera_no() {
        
       // if(!is_null($id,$nu)){
      $sql = "select ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Sistemas Computacionales' or null)* 100),1)/ROUND(COUNT(u.carrera ),1)),1) AS isc, ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Energias Renovables' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS ier, ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Industrias Alimentarias' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS iia, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Administracion' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS la, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Turismo' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS lt, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Gatronomia' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS lg from respuestas as r inner join usuarios as u on u.id = r.user_id where r.nivel = 'No Depresion'";

      $query = $this->db->query($sql);

            return $query->row();

    }

public function carrera_leve() {
        
      $sql = "select ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Sistemas Computacionales' or null)* 100),1)/ROUND(COUNT(u.carrera ),1)),1) AS isc, ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Energias Renovables' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS ier, ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Industrias Alimentarias' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS iia, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Administracion' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS la, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Turismo' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS lt, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Gatronomia' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS lg from respuestas as r inner join usuarios as u on u.id = r.user_id where r.nivel = 'Depresion Leve'";

      $query = $this->db->query($sql);

      if($query->num_rows() > 0){
          return $query->row();
      }
      

      return false;
      
              
    }

public function carrera_moderado() {
        
      $sql = "select ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Sistemas Computacionales' or null)* 100),1)/ROUND(COUNT(u.carrera ),1)),1) AS isc, ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Energias Renovables' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS ier, ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Industrias Alimentarias' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS iia, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Administracion' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS la, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Turismo' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS lt, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Gatronomia' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS lg from respuestas as r inner join usuarios as u on u.id = r.user_id where r.nivel = 'Depresion Moderada'";

      $query = $this->db->query($sql);

      if($query->num_rows() > 0){
          return $query->row();
      }
      
      return false;
      
              
    }

public function carrera_grave() {
        
      $sql = "select ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Sistemas Computacionales' or null)* 100),1)/ROUND(COUNT(u.carrera ),1)),1) AS isc, ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Energias Renovables' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS ier, ROUND((ROUND((COUNT( u.carrera = 'Ingenieria en Industrias Alimentarias' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS iia, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Administracion' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS la, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Turismo' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS lt, ROUND((ROUND((COUNT( u.carrera = 'Licenciatura en Gatronomia' or null)* 100),1)/ROUND(COUNT(u.carrera),1)),1) AS lg from respuestas as r inner join usuarios as u on u.id = r.user_id where r.nivel = 'Depresion Grave'";

      $query = $this->db->query($sql);

      if($query->num_rows() > 0){
          return $query->row();
      }
      

      return false;
      
              
    }

public function sexo_no() {
        
      $sql = "select ROUND((ROUND((COUNT( u.sexo = 'Mujer' or null)* 100),1)/ROUND(COUNT(u.sexo),1)),1) AS Mujer, ROUND((ROUND((COUNT( u.sexo = 'Hombre' or null)* 100),1)/ROUND(COUNT(u.sexo),1)),1) AS Hombre from respuestas as r inner join usuarios as u on u.id = r.user_id where r.nivel = 'No depresion'";

      $query = $this->db->query($sql);

      if($query->num_rows() > 0){
          return $query->row();
      }
      

      return false;
      
              
    }

public function sexo_leve() {
        
      $sql = "select ROUND((ROUND((COUNT( u.sexo = 'Mujer' or null)* 100),1)/ROUND(COUNT(u.sexo),1)),1) AS Mujer, ROUND((ROUND((COUNT( u.sexo = 'Hombre' or null)* 100),1)/ROUND(COUNT(u.sexo),1)),1) AS Hombre from respuestas as r inner join usuarios as u on u.id = r.user_id where r.nivel = 'Depresion Leve'";

      $query = $this->db->query($sql);

      if($query->num_rows() > 0){
          return $query->row();
      }
      

      return false;
      
              
    }

public function sexo_moderado() {
        
      $sql = "select ROUND((ROUND((COUNT( u.sexo = 'Mujer' or null)* 100),1)/ROUND(COUNT(u.sexo),1)),1) AS Mujer, ROUND((ROUND((COUNT( u.sexo = 'Hombre' or null)* 100),1)/ROUND(COUNT(u.sexo),1)),1) AS Hombre from respuestas as r inner join usuarios as u on u.id = r.user_id where r.nivel = 'Depresion Moderada'";

      $query = $this->db->query($sql);

      if($query->num_rows() > 0){
          return $query->row();
      }
      

      return false;
      
              
    }

public function sexo_grave() {
        
      $sql = "select ROUND((ROUND((COUNT( u.sexo = 'Mujer' or null)* 100),1)/ROUND(COUNT(u.sexo),1)),1) AS Mujer, ROUND((ROUND((COUNT( u.sexo = 'Hombre' or null)* 100),1)/ROUND(COUNT(u.sexo),1)),1) AS Hombre from respuestas as r inner join usuarios as u on u.id = r.user_id where r.nivel = 'Depresion Grave'";

      $query = $this->db->query($sql);

      if($query->num_rows() > 0){
          return $query->row();
      }
      

      return false;
      
              
    }

}
