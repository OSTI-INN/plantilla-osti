<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comun_m extends CI_Model {

    public function __construct(){
        parent::__construct();
        //$bd=$this->load->database();
    }

    public function valores_lista_segun_tabla ($parametros=array()){
        //parametros esperados ... jjy
        $texto_por_defecto  ="";
        $valor_por_defecto  ="";
        $valor_seleccionado ="";
        $tabla_origen       ="";
        $condicion_filtro   ="";
        $orden_salida       ="";
        $consulta_sql_origen="";
        $campo_lista_valor  ="";
        $campo_lista_texto  ="";

        extract($parametros);

        $this->db->select($campo_lista_valor.','.$campo_lista_texto);
        $this->db->from($tabla_origen);
        $this->db->where($condicion_filtro);
        $this->db->order_by($orden_salida);
        $rs = $this->db->get();

        $resultado['campos']=$rs->list_fields();
        $resultado['datos']=$rs->result();
        
        $this->db->close();
        return $resultado;
    }

}
    
?>
