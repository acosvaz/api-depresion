<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Insertlista extends REST_Controller {
    
     /**
     * Get All Data from this method.
     *
     * @return Response
    */
    
    public function __construct(){
        parent:: __construct();
        $this->load->database();
        //$this->load->model('Insert_asesoria', 'InsertAsesoria');
    }
       
     /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function lista_post($id){
        header("Access-Control-Allow-Origin: *");
        $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")),true);

        $input = $this->input->post();
        $this->db->insert_batch('asistencias',$input);
        $data = array ( 'status'=>'1');
        $this->db->set('status', '1', FALSE);
        $this->db->update('asesorias', $data, array('id'=>$id));
     
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);         
    }


  public function registro_post(){
        header("Access-Control-Allow-Origin: *");
        $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")),true);

        $matricula = $this->input->post('matricula');
        $input = $this->input->post();
        $this->db->insert('usuarios', $input);
        $data = $this->db->get_where('usuarios', ['matricula' => $matricula]) ->row();
     
        $this->response($data, REST_Controller::HTTP_OK);         
    }
    
       public function test_post($matricula){
    header("Access-Control-Allow-Origin: *");
    $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")),true);
    
    $id = $this->db->get_where('usuarios', ['matricula' => $matricula])->row();
    
                    $respuesta_1 = $this->input->post('respuesta_1');
                    $respuesta_2 = $this->input->post('respuesta_2');
                    /*$respuesta_3 = $this->input->post('respuesta_3');
                    $respuesta_4 = $this->input->post('respuesta_4');
                    $respuesta_5 = $this->input->post('respuesta_5');
                    $respuesta_6 = $this->input->post('respuesta_6');
                    $respuesta_7 = $this->input->post('respuesta_7');
                    $respuesta_8 = $this->input->post('respuesta_8');
                    $respuesta_9 = $this->input->post('respuesta_9');
                    $respuesta_10 = $this->input->post('respuesta_10');
                    $respuesta_11 = $this->input->post('respuesta_11');
                    $respuesta_12 = $this->input->post('respuesta_12');*/
                    $resultado= $respuesta_1 + 
                                $respuesta_2 ; /*+
                                $respuesta_3 +
                                $respuesta_4 +
                                $respuesta_5 +
                                $respuesta_6 +
                                $respuesta_7 +
                                $respuesta_8 +
                                $respuesta_9 +
                                $respuesta_10+
                                $respuesta_11+
                                $respuesta_12;*/
                    
                    $data = array (
                        'res_1'=>$respuesta_1,
                        'res_2'=>$respuesta_2,
                        /*'respuesta_3'=>$respuesta_3,
                        'respuesta_4'=>$respuesta_4,
                        'respuesta_5'=>$respuesta_5,
                        'respuesta_6'=>$respuesta_6,
                        'respuesta_7'=>$respuesta_7,
                        'respuesta_8'=>$respuesta_8,
                        'respuesta_9'=>$respuesta_9,
                        'respuesta_10'=>$respuesta_10,
                        'respuesta_11'=>$respuesta_11,
                        'respuesta_12'=>$respuesta_12,*/
                        'total'=>$resultado,
                        'user_id'=>$id->id,
                    );
        
        $this->db->insert('respuestas', $data);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }   
}

