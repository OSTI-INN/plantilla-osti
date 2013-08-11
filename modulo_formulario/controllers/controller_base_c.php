<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_base_c extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index() {       
        //parametros pasados a la vista .. jjy
        $datos = array( 'variable' => 0 );
        // llamado a la vista ... jjy
        $this->load->view('vista_base_v', $datos);
	}

    public function metodo_demo( $parametros = array() ){
        //parametros esperados y sus valores por omisión ... jjy
        $var1 = '';
        $var2 = 0;
        //se extraen los parametros recibidos ... jjy
        extract ( $parametros ); // esto reemplaza los valores por omisión en los parámetros recibidos con mismo nombre ... jjy
        //se validan los parámetros recibidos y se ajustan para evitar errores ... jjy
        $var2 = (integer) $var2; // ej, para asegurarse que var2 sea entero! ... jjy
        //se define la variable o estructura de retorno del método ... jjy
        $salida = '';

        // inicia el código del método ... jjy

        $salida = 0; // se prepara la salida
        
        /* *** */ $this->index(); // esta instrucción es sólo para llamar a la vista ... no debería estar acá .. es solo para efectos de demo .... jjy

        return $salida; // se retorna el valor o estructura sólo al final ... jjy
    }

}