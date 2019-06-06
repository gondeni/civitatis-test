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
    public $fechaIni;
    public $fechaFin;
    public $precio;
    public $popularidad;

    /**
     * Metodo que obtiene todas las actividades entre las fechas pasadas.
     *
     * @param $fechaIni
     * @param $fechaFin
     * @return mixed matriz de actividades
     */
    public function getActividades($fechaIni,$fechaFin)
    {
        $this->db->select('*');
        $this->db->from('actividades');
        $this->db->where('fechaIni>=',date($fechaIni));
        $this->db->where('fechaFin<=',date($fechaFin));
        $this->db->order_by('popularidad','DESC');
        $consulta = $this->db->get();
        $resultados = $consulta->custom_result_object('Actividad_MOD');
        return $resultados;
    }

    /**
     * Metodo que obtiene una unica actividad
     * @param null $idActividad
     * @param null $titulo
     * @return mixed objecto actividad
     */
    public function getActividad($idActividad = null, $titulo = null)
    {
        $this->db->select('*');
        $this->db->from('actividades');
        $this->db->where('idActividad', $idActividad);
        $this->db->or_where('titulo', $titulo);
        $consulta = $this->db->get();
        $resultados = $consulta->custom_result_object('Actividad_MOD');
        return $resultados;
    }

    /**
     * Metodo que muestra las actividades relacionadas a la pasada por parametro
     * @param $idActividad
     * @return mixed array de identificadores de actividad
     */
    public function getActividadesRelacionadas($idActividad)
    {
        $this->db->select('*');
        $this->db->from('actividades_relacionadas');
        $this->db->where('actividadPrincipal', $idActividad);
        $consulta = $this->db->get();
        $resultado = $consulta->result_array();
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