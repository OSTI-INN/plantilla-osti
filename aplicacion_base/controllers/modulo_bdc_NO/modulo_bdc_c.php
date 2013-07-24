<?php 

class Formularios_c extends CI_Controller { 
    
    public function __construct() {
        parent::__construct();
        //$this->load->helper(array('url','form','mod_ppal_reddsa'));
        //$this->load->library(array('form_validation'));
        //$this->load->model(array('comun/comun_m'));
    }

    public function index(){

        $data['sTitulo']="Red de Defensores y Defensoras de la Soberanía Alimentaria";
        $data['sSubTitulo']="Formularios Externos";

        global $config;
        $config['sesion']['seccion_activa']="formularios";

        $this->load->view('formularios/formularios_v',$data);
    }

    public function enlazar_formulario($id_formulario=""){
        $url_formulario_externo="javascript:alert('E!');";
        switch ($id_formulario) {
            case "1001":
                $url_formulario_externo="https://docs.google.com/forms/d/1bqJ4PdPMVW5HKcEFFIdD5XWp06Xnbnnz-79wpnzLLnc/viewform";
                break;
            case "1002":
                $url_formulario_externo="https://docs.google.com/forms/d/1Vx8bdxH7zCAgesGCCIgAJ_aLQox6d3Sn1u1QbrctuRI/viewform";
                break;
            default:
                break;
        }
        global $config;
        $config['sesion']['seccion_activa']="formularios";
        
        $data['url_formulario_externo']=$url_formulario_externo;
        $this->load->view('formularios/formulario_externo_v',$data);
    }

}      
