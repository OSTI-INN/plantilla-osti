<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class S extends CI_Controller {
	var $tabs;
   public function __construct() {
		parent::__construct();
      /**
      Definición de Módulos del Sistema ... jjy ***
      **/
      $modulos = array( // solo modulos definidos a partir de /modulo_base/*
              'modulo_base'       => 'Módulo Base', 
              'modulo_demo'       => 'Módulo Demo', 
              'modulo_formulario' => 'Programa PAE',
      );  
      /**  
      	Definición de las pestañas del menú de navegación principal .... jjy ***********
      **/
      $this->tabs = array(  // los que no son modulos .. sino links internos
      	'pestanas' => array(
      					'inicio'            =>'Inicio',
      				),
      	//.. para enlaces específicos ... jjy
      	'url_enlaces' => array( // los que no son modulos .. sino links internos
      					'inicio'            => site_url().'s/inicio',
      				),
      ); 
      global $menus_izquierda_activos; // definicion de menús de la izquierda  .... jjy
      $menus_izquierda_activos =  array( // se definen solo los modulos de menu-secundario-superior ó sin-menu
         //'inicio'              => array(),
         'modulo_formulario'   => array( 'menu-secundario-superior' ),
      );
      // se incorporan los módulos a la definición de pestañas .. jjy
      foreach( $modulos as $id_modulo => $titulo_pestana ) {
         $this->tabs['pestanas']    += array( $id_modulo => $titulo_pestana );
         $this->tabs['url_enlaces'] += array( $id_modulo => site_url().'s/cm/'.$id_modulo );
         if ( ! isset( $menus_izquierda_activos[$id_modulo] ) ) {
            $menus_izquierda_activos[$id_modulo] = array();
         }
      }
      // ****** Fin de la definición de pestañas .... jjy *********************
   }

	public function index(){
		$this->cs("inicio");
	}

	public function cs($seccion="inicio",$parametros=array()){
		global $config;

		$config['sesion']['seccion_activa']=$seccion;

		$accion=( isset($parametros['accion']) && $parametros['accion']!="" )
                ?'_'.$parametros['accion']
                :"";
		$parametros['seccion']=$seccion;
	
		$this->load->view( 'comun/encabezado_html_v', $this->tabs );
			$this->load->view('comun/menu_izquierda_v',$parametros);
			$this->load->view('/'.$seccion.'/'.$seccion.$accion.'_v',$parametros);
		$this->load->view('comun/pie_html_v');
	}

	public function inicio(){
		$this->cs ("inicio");	
	}

    public function cm ($id_modulo=""){  //cargar módulo ... jjy
        $url_modulo="javascript:alert('E!');"; // alerta de error ... 
        global $config;
        $config['sesion']['seccion_activa']	= $id_modulo;
        $config['sesion']['modulo_activo']	= $id_modulo;
        
        $url_modulo=base_url()."/{$id_modulo}.php";
        $data['url_modulo']=$url_modulo;

		$parametros['seccion'] = $config['sesion']['seccion_activa'];

		$this->load->view( 'comun/encabezado_html_v', $this->tabs );
			$this->load->view( 'comun/menu_izquierda_v',$parametros );
        	$this->load->view( 'modulo/modulo_v',$data );
		$this->load->view( 'comun/pie_html_v' );

    }

}
