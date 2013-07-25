<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket_c extends CI_Controller {

       public function __construct() {
        parent::__construct();
        $this->load->model('modulo_gtk/ticket_m');
    }

	public function index(){
		$listar['tickets'] = $this->listar_ticket();
		$listar['categoria'] = $this->listar_categoria();
		$listar['sub_categoria'] = $this->listar_sub_categoria();

		$this->load->view('modulo_gtk/ticket_v', $listar);
	}

	public function insertar_ticket(){
		$id='';
	
    		$datos  = array(
				'codigo_categoria' 	 => $this->input->post('codigo_categoria') , 
				'codigo_ticket'  	 => mt_rand(), /*$this->input->post( 'codigo_ticket' ) ,*/
				'asunto_ticket' 	 => $this->input->post( 'asunto_ticket' ) ,
				'descripcion_ticket' => $this->input->post('descripcion_ticket'),
				'codigo_prioridad' 	 => $this->input->post('codigo_prioridad'),
	    		);  
		$insertar = $this->ticket_m->insertar_ticket($id,$datos);
    	//echo $salida;
   // echo '<pre>',print_r($_POST),'</pre>';
	//echo '<pre>',print_r($datos),'</pre>';
	//echo 'aqui estoy';	*/
   }

	public function listar_tickets(){
		$id='';
 
		$datos['tickets'] = $this->ticket_m->listar_ticket();
		$this->load->view('modulo_gtk/listar_tickets_v', $datos);
   	}

	public function listar_categoria(){
		$id='';
 
		$listar = $this->ticket_m->listar_categoria();
		return $listar;
   	}
	
	public function listar_sub_categoria(){
		$id='';
 
		$listar = $this->ticket_m->listar_sub_categoria();
		return $listar;
   }


}
