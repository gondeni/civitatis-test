<?php
/**
 * Created by PhpStorm.
 * User: GNICOLAS
 * Date: 04/06/2019
 * Time: 15:45
 */

class Actividad_CONT extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Actividad_MOD');
        $this->load->library('session');
    }

    public function listar()
    {
        $datos['info'] = $this->session->flashdata('datos');
        $fecha_ini = date('Y-m-d', strtotime($datos['info']['fecha_ini']));
        $fecha_fin = date('Y-m-d', strtotime($datos['info']['fecha_fin']));

        //Obtenemos todas las actividades entre las fechas dadas
        $datos['actividades'] = $this->Actividad_MOD->getActividades($fecha_ini, $fecha_fin);

        $datos['actividades'] = self::obtenerRelacionadas($datos);


        /* $datos['actividades'] = array(
             0 =>
                 Actividad_MOD::__set_state(array(
                     'idActividad' => '1',
                     'titulo' => 'prueba1',
                     'descripcion' => 'descripcion act1',
                     'fechaInicio' => NULL,
                     'fechaFin' => '2019-06-05',
                     'precio' => '100',
                     'popularidad' => '10',
                     'fechaIni' => '2019-06-04',
                 )),
             1 =>
                 Actividad_MOD::__set_state(array(
                     'idActividad' => '2',
                     'titulo' => 'prueba2',
                     'descripcion' => 'descripcion act2',
                     'fechaInicio' => NULL,
                     'fechaFin' => '2019-06-05',
                     'precio' => '50',
                     'popularidad' => '5',
                     'fechaIni' => '2019-06-04',
                 )),
         );*/
        $this->load->view('utils/head');
        $this->load->view('listado_VIEW', $datos);
        $this->load->view('utils/foot');
    }

    public function obtenerRelacionadas($datos){
        //Recorremos las actividades para obtener sus relacionadas
        foreach ($datos['actividades'] as $key => $actividad) {
//            $relacionadas = array();
            $relacionadas = $this->Actividad_MOD->getActividadesRelacionadas($actividad->idActividad);

            //Buscamos las actividades relacionadas
            foreach ($relacionadas as $key_r => $relacionada) {
                //obj Actividad
                $relacionada = $this->Actividad_MOD->getActividad($relacionada['actividadRelacionada']);
                //Recuperamos exclusivamente el título de cada actividad relacionada
                $relacionadas[$key_r] = $relacionada[0]->titulo;
            }
            //TODO
            //Aprovechamos para hacer la operación para obtener el total
//            $datos['actividades'][$key]->precioTotal = $datos
            $datos['actividades'][$key]->relacionadas = $relacionadas;
        }

        return $datos['actividades'];
    }
}