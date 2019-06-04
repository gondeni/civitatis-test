<?php
/**
 * Created by PhpStorm.
 * User: GNICOLAS
 * Date: 04/06/2019
 * Time: 15:57
 */

class Actividad_MOD extends CI_Model
{
    public $idActividad;
    public $titulo;
    public $descripcion;
    public $fechaInicio;
    public $fechaFin;
    public $precio;
    public $popularidad;

    public function __construct()
    {
        parent::__construct();

    }

    public function getActividades()
    {
//        $actividad = new Actividad_MOD();
        $this->db->select('*');
        $this->db->from('actividades');
        $consulta = $this->db->get();
        $resultados = $consulta->custom_result_object('Actividad_MOD');

        return $resultados;
    }

    public function getActividad($idActividad = null, $titulo = null)
    {
        $actividad = new Actividad_MOD();
        $this->db->select('*');
        $this->db->from('actividades');
        $this->db->where('idActividad', $idActividad);
        $this->db->or_where('titulo', $titulo);
        $consulta = $this->db->get();
        $resultados = $consulta->custom_result_object('Actividad_MOD');
        return $resultados;
    }

    public function getActividadesRelacionadas($idActividad)
    {
        $this->db->select('*');
        $this->db->from('actividades_relacionadas');
        $this->db->where('idActividad1', $idActividad);
        $this->db->or_where('idActividad2', $idActividad);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    /**
     * @return null
     */
    public function getIdActividad()
    {
        return $this->idActividad;
    }

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @return null
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * @return null
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * @return int
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @return int
     */
    public function getPopularidad()
    {
        return $this->popularidad;
    }

    /**
     * @param int $popularidad
     */
    public function setPopularidad($popularidad)
    {
        $this->popularidad = $popularidad;
    }
}