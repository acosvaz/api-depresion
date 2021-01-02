<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Catalogo extends REST_Controller {
    
    public function __construct(){
        parent:: __construct();
        $this->load->model('Catalogoapi_model');
    }
    
    public function index_get(){
        $catalogo = $this->Catalogoapi_model->get();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }

    public function filtro_post(){
        $min = $this->post('fecha_inicio');
        $max = $this->post('fecha_final');
        $catalogo = $this->Catalogoapi_model->filtro($min, $max);
        
        if(!is_null($catalogo)){
            $this->response($catalogo);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }
    
    public function find_get($id){
        
        if(!$id){
            $this->response(null, 400);
        }
        
        $catalogo = $this->Catalogoapi_model->get($id);
        
        if(!is_null($catalogo)){
            $this->response( $catalogo, 200);
        } else {
            $this->response(array('error' => 'Catalogo no disponible'), 404);
        }
    }

    public function porcent_get(){
        $catalogo = $this->Catalogoapi_model->porcent();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }

    public function carrerano_get(){

        $catalogo = $this->Catalogoapi_model->carrera_no();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }

    public function carreraleve_get(){

        $catalogo = $this->Catalogoapi_model->carrera_leve();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }

    public function carreramoderado_get(){

        $catalogo = $this->Catalogoapi_model->carrera_moderado();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }

    public function carreragrave_get(){

        $catalogo = $this->Catalogoapi_model->carrera_grave();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }

    public function sexono_get(){

        $catalogo = $this->Catalogoapi_model->sexo_no();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }

    public function sexoleve_get(){

        $catalogo = $this->Catalogoapi_model->sexo_leve();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }

    public function sexomoderado_get(){

        $catalogo = $this->Catalogoapi_model->sexo_moderado();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }

    public function sexograve_get(){

        $catalogo = $this->Catalogoapi_model->sexo_grave();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }

}

