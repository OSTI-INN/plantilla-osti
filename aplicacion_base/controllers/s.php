<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class S extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
	public function index(){
		$this->cs("inicio");
	}
	public function cs($seccion="inicio",$parametros=array()){
		global $config;
		$config['sesion']['seccion_activa']=$seccion;

		$accion=(isset($parametros['accion']) && $parametros['accion']!="")?'_'.$parametros['accion']:"";
		$parametros['seccion']=$seccion;

		//  definición de las pestañas del menú .... jjy
		$tabs=array(
			'inicio'      	=>'Inicio',
			'modulo_gtk'    =>'Atenci&oacute;n a Usuarios',
			'modulo_bdc'    =>'Dudas Frecuentes',
		);
		//.. para enlaces específicos ... jjy
		$url_enlaces=array( 
			'modulo_gtk'	=> site_url().'/s/cm/modulo_gtk',
			'modulo_bdc'    => site_url().'/s/cm/modulo_bdc',
		); 
	
		$this->load->view('comun/encabezado_html_v', array('tabs'=>$tabs, 'url_enlaces'=>$url_enlaces));
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














/** 
REVISAR !!!!!!!!!!!!!!!!!! jjy
**/

		$parametros['seccion']=$config['sesion']['seccion_activa'];

		//  definición de las pestañas del menú .... jjy
		$tabs=array(
			'inicio'      	=>'Inicio',
			'modulo_gtk'    =>'Atenci&oacute;n a Usuarios',
			'modulo_bdc'    =>'Dudas Frecuentes',
		);
		//.. para enlaces específicos ... jjy
		$url_enlaces=array( 
			'modulo_gtk'	=> site_url().'/s/cm/modulo_gtk',
			'modulo_bdc'    => site_url().'/s/cm/modulo_bdc',
		); 
	
		$this->load->view('comun/encabezado_html_v', array('tabs'=>$tabs, 'url_enlaces'=>$url_enlaces));
			$this->load->view('comun/menu_izquierda_v',$parametros);
			
        
        	$this->load->view('modulo/modulo_v',$data);



		$this->load->view('comun/pie_html_v');

    }

/*
	public function recetas($accion="", $parametros=""){

		$this->load->model('recetas/recetas_m');
		$parametros=explode(':',$parametros);

		if(isset($_POST['accion_secundaria']) && $_POST['accion_secundaria']!=""){
			$accion_secundaria=$_POST['accion_secundaria'];
		} else {
			$accion_secundaria=$accion;
		}

		switch ($accion){
			case "e":
				$id_receta=$parametros[0];
				$datos=$this->recetas_m->info_receta($id_receta);
				break;
			
			default:
				$datos=$this->recetas_m->listar_recetas();
				break;
		}
		$parametros['accion']=$accion;

		if(isset($datos['campos']) && isset($datos['datos'])){
			$parametros['campos']=$datos['campos'];
			$parametros['datos']=$datos['datos'];
		} else {
			$parametros['datos']=$datos;
		}
		
		$this->cargar_seccion("recetas", $parametros);	

	}
	public function programas($accion="",$parametros=""){

		$this->load->model('programas/programas_m');
		$parametros=explode(':',$parametros);

		if(isset($_POST['accion_secundaria']) && $_POST['accion_secundaria']!=""){
			$accion_secundaria=$_POST['accion_secundaria'];
		} else {
			$accion_secundaria=$accion;
		}

		switch ($accion){
			case "e":
				$id_receta=$parametros[0];
				$datos=$this->programas_m->info_programas($id_receta);
				break;
			
			default:
				$datos=$this->programas_m->listar_programas();
				break;
		}
		$parametros['accion']=$accion;

		if(isset($datos['campos']) && isset($datos['datos'])){
			$parametros['campos']=$datos['campos'];
			$parametros['datos']=$datos['datos'];
		} else {
			$parametros['datos']=$datos;
		}
		
		$this->cargar_seccion("programas", $parametros);	
	}

	public function personas($accion="", $parametros=""){

		$seccion = "personas";
		$this->load->model($seccion.'/'.$seccion.'_m');
		$parametros=explode(':',$parametros);

		if(isset($_POST['accion_secundaria']) && $_POST['accion_secundaria']!=""){
			$accion_secundaria=$_POST['accion_secundaria'];
		} else {
			$accion_secundaria=$accion;
		}

		switch ($accion){
			case "e":
				$id_persona=$parametros[0];
				$datos=$this->personas_m->info_personas($id_persona);
				break;
			
			default:
				$datos=$this->personas_m->listar_personas();
				break;
		}
		$parametros['accion']=$accion;

		if(isset($datos['campos']) && isset($datos['datos'])){
			$parametros['campos']=$datos['campos'];
			$parametros['datos']=$datos['datos'];
		} else {
			$parametros['datos']=$datos;
		}
		
		$this->cargar_seccion($seccion, $parametros);	
	}
	public function administracion(){
		$this->cargar_seccion("administracion");	
	}
	public function tablas($accion="",$parametros=""){
		$this->load->model('tablas/tablas_m');
		$parametros=explode(':',$parametros);

		if(isset($_POST['accion_secundaria']) && $_POST['accion_secundaria']!=""){
			$accion_secundaria=$_POST['accion_secundaria'];
		} else {
			$accion_secundaria=$accion;
		}

		switch ($accion){
			case "t":
				$id_tabla=$parametros[0];
				
				if($id_tabla=='n'){
					//se está creando una nueva tabla .. jjy
					if($accion_secundaria=='g'){
						$this->tablas_m->guardar_registros_tablas($this->input->post());
						exit();
						//OJO !!!!!!!!!!!!!!!!!!!!!!! POR AQUI!!!!!!! REVISAR Y SEGUIR !!!!!!!!!!! ..jjy
					} else { 
						$accion_secundaria="n";
						$parametros['info_tabla']['id_tabla']=-1;
						$parametros['info_tabla']['codigo_tabla']="";
						$parametros['info_tabla']['nombre_tabla']="";
						$parametros['info_tabla']['descripcion_tabla']="";
						$datos=array();
					}

				} else {
					//se está editando una tabla existente .. jjy
					$info_tabla=$this->tablas_m->info_tabla_apoyo($id_tabla);

					if($accion_secundaria=='t'){

						//$parametros['mensaje']="Se encuentra editando la tabla de  <strong>{$info_tabla['nombre_tabla']}</strong>";
						//$parametros['tipo_mensaje']="info";
						
					} else if($accion_secundaria=='g'){

						$this->tablas_m->guardar_registros_tablas($this->input->post());
						$parametros['mensaje']="Los cambios en la tabla <strong>{$info_tabla['nombre_tabla']}</strong> se guardaron con éxito.";
						$parametros['tipo_mensaje']="exito";
					}
					$codigo_tabla=$info_tabla['codigo_tabla'];
					$parametros['info_tabla']=$info_tabla;

					$proximo_codigo=$this->tablas_m->proximo_codigo_tabla_apoyo($id_tabla);
					$parametros['proximo_codigo']=$proximo_codigo;

					$datos=$this->tablas_m->listar_registros_tablas_apoyo($codigo_tabla);
				}
				break;

			case "":
			default:
				$datos=$this->tablas_m->listar_tablas_apoyo();
				break;
		}
		$parametros['accion']=$accion;
		$parametros['accion_secundaria']=$accion_secundaria;
		if(isset($datos['campos']) && isset($datos['datos'])){
			$parametros['campos']=$datos['campos'];
			$parametros['datos']=$datos['datos'];
		} else {
			$parametros['datos']=$datos;
		}
		$this->cargar_seccion("tablas", $parametros);	
	}
*/
}
