<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Actividad_CONT extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Actividad_MOD');
//        $this->load->library('session');
    }

    /**
     * Metodo generador del listado de actividades.
     * Carga la vista del listado.
     */
    public function listar()
    {

        $datos['info'] = $this->session->flashdata('datos');
        $fecha_ini = date('Y-m-d', strtotime($datos['info']['fecha_ini']));
        $fecha_fin = date('Y-m-d', strtotime($datos['info']['fecha_fin']));

        //Obtenemos todas las actividades entre las fechas dadas
        $datos['actividades'] = $this->Actividad_MOD->getActividades($fecha_ini, $fecha_fin);

        //Llamamos al metodo para obtener las actividades relacionadas
        $datos['actividades'] = self::obtenerRelacionadas($datos);

        $this->output->cache(5);
        $this->load->view('utils/head');
        $this->load->view('listado_VIEW', $datos);
        $this->load->view('utils/foot');
    }

    /**
     * Metodo para obtener las actividades relacionadas
     * @param $datos matriz de actividades
     * @return mixed matriz de actividades procesada con relacionadas
     */
    public function obtenerRelacionadas($datos)
    {
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

            //Aprovechamos para hacer la operación para obtener el total
//            $datos['actividades'][$key]->precioTotal = $datos
            $datos['actividades'][$key]->relacionadas = $relacionadas;
        }

        return $datos['actividades'];
    }

}