<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personas_m extends CI_Model {

    public function __construct(){
        parent::__construct();
        //$bd=$this->load->database();
    }

    public function listar_personas (){
        $tabla='principal.vw_lista_personas';
            $this->db->order_by('nombres, apellidos');
            $rs = $this->db->get($tabla);

            $data_salida['campos']=$rs->list_fields();
            $data_salida['datos']=$rs->result();
        $this->db->close();
        return $data_salida;
    }

    public function info_personas($id_persona=-1,$cedula=""){
        $tabla='principal.vw_info_persona';
            $this->db->where('id_persona',$id_persona);
            $this->db->or_where('cedula',$cedula);
            $this->db->limit(1);
            $rs = $this->db->get($tabla);
        $this->db->close();
        return $rs->row_array();   
    }

    public function proxima_cedula_menor ($por_defecto="") {
        $tabla='principal.items_apoyo as ia';
        $tabla2='principal.tablas_apoyo as ta';

        $this->db->select(array('id_item','codigo_item'));
        $this->db->from($tabla);
        $this->db->join($tabla2,'ia.codigo_tabla=ta.codigo_tabla');
        $this->db->order_by('codigo_item desc, id_item desc');

        if($id_tabla!=-1) $this->db->where('ta.id_tabla',$id_tabla);
        if($codigo_tabla!="") $this->db->or_where('ta.codigo_tabla',$codigo_tabla);
        $this->db->limit(1);

        $rs=$this->db->get();

        if($rs->num_rows()==0){
            if($codigo_tabla!=""){
                $prefijo=substr($codigo_tabla, 1, 1).substr($codigo_tabla, 4, 1);
            } else {
                $this->db->select('codigo_tabla');
                if($id_tabla!=-1) $this->db->where('ta.id_tabla',$id_tabla);
                
                $rs=$this->db->get($tabla2);
                if($rs->num_rows()>0){
                    $rs=$rs->row_array();
                    $codigo_tabla=$rs['codigo_tabla'];
                }
                $prefijo=substr($codigo_tabla, 0, 1).substr($codigo_tabla, 3, 1);
            }
            $n_proximo_codigo=1;
            $proximo_codigo=substr_replace($prefijo.'000',$n_proximo_codigo,strlen($prefijo.'000')-strlen((string) $n_proximo_codigo));
        } else {
            $rs=$rs->row_array();
            $codigo_item=$rs['codigo_item'];
            $l_codigo=strlen($codigo_item);
            for($j=1;$j<$l_codigo;$j++){
                $letra=substr($codigo_item, $j, 1);
                if(is_numeric($letra)){
                    $prefijo=substr($codigo_item,0,$j);
                    $n_codigo=(integer) substr($codigo_item,$j);
                    break;
                }
            }
            $n_proximo_codigo=$n_codigo+1;
            $proximo_codigo=substr_replace($prefijo.'000',$n_proximo_codigo,strlen($prefijo.'000')-strlen((string) $n_proximo_codigo));
        }
        $this->db->close();
        return $proximo_codigo;
    }
    public function guardar_persona ($parametros){
        $tabla='principal.tablas_apoyo';
        $tabla2='principal.items_apoyo';
        $datos=array();
        
        if($parametros['tabla_editada']!='SI'){

        }

        foreach ($parametros['id_item'] as $indice => $valor) {
            if($parametros['registro_editado'][$indice]=='SI'){
                $datos=array(
                    'codigo_tabla'=>$parametros['codigo_tabla'][$indice],
                    'codigo_item'=>$parametros['codigo_item'][$indice],
                    'nombre_corto'=>$parametros['nombre_corto'][$indice],
                    'otros_nombres'=>$parametros['otros_nombres'][$indice],
                    'descripcion'=>$parametros['descripcion'][$indice]
                );
                if($parametros['id_item'][$indice]!="NULL" && $parametros['id_item'][$indice]!=""){
                    $where='id_item = '.$parametros['id_item'][$indice];
                    $this->db->where($where);
                    $this->db->update($tabla2, $datos);

                } else {
                    $this->db->insert($tabla2, $datos);
                }
            }
        }
    }
}
    
?>
