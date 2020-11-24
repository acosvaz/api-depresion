<?php

require_once APPPATH . '/libraries/REST_Controller.php';
//require_once APPPATH . '/libraries/jwt/JWT.php';
use \Firebase\JWT\JWT;

class Token extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Loginapi_model');
    }

    public function login_post() {
        
        $username = $this->post('username');
        //$password = sha1($this->post('password'));
        $password = $this->post('password');
          
        $invalidLogin = ['invalid' => $username];
        if(!$username || !$password) $this->response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);
        $id = $this->Loginapi_model->login($username,$password);
        $nu_rol = $this->Loginapi_model->rol($id);
        $nombre = $this->Loginapi_model->nombre($id);
        
        if($id) {
            $token['id'] = $id;
            $token['username'] = $username;
            $date = new DateTime();
            $token['iat'] = $date->getTimestamp();

            $valid = array ('id' => $id,
                            'username' => $username,
                            'rol' => $nu_rol,
                            'nombre' => $nombre,
                            'token' => JWT::encode($token, "my Secret key!"));
            $this->set_response($valid, REST_Controller::HTTP_OK);
        }
        else {
            $this->set_response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);
        }
    }


public function registro_post()

    {
        header("Access-Control-Allow-Origin: *");
        $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")), true);
        
        $input = $this->input->post();
        $this->db->insert('usuarios',$input);
     
        $this->response(['Usuario creado'], REST_Controller::HTTP_OK);
    } 

public function test_post()

    {
        header("Access-Control-Allow-Origin: *");
        $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")),true);
        
        $input = $this->input->post();
        $this->db->insert('respuestas', $input);
     
        $this->response(['Respuesta agregada'], REST_Controller::HTTP_OK);
    }
}

