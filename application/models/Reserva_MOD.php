<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Reserva_MOD extends CI_Model
{
    public $idReserva;
    public $referencia;
    public $personas;
    public $precio;
    public $fechaReserva;
    public $fechaRealizacion;

    /**
     * Metodo para insertar nueva reserva en la tabla
     * @param $data
     */
    public function nuevaReserva($data)
    {
        $this->db->set($data);
        $this->db->insert('reservas', $data);
    }

    /**
     * Obtiene todas las reservas
     * @return mixed
     */
    public function getReservas()
    {
        $this->db->select('*');
        $this->db->from('reservas');
        $consulta = $this->db->get();
        $resultados = $consulta->custom_result_object('Reserva_MOD');
        return $resultados;
    }

    /**
     * Comprueba las repeticiones del cod de reserva presente en la bbdd
     * @param $referencia
     * @return mixed
     */
    public function comprobarReferencia($referencia)
    {
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->like('referencia',$referencia, 'both');
        $consulta = $this->db->get();
        $resultados = $consulta->num_rows();
        return $resultados;
    }

    /**
     * @return mixed
     */
    public function getIdReserva()
    {
        return $this->idReserva;
    }

    /**
     * @return mixed
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @return mixed
     */
    public function getPersonas()
    {
        return $this->personas;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @return mixed
     */
    public function getFechaReserva()
    {
        return $this->fechaReserva;
    }

    /**
     * @return mixed
     */
    public function getFechaRealizacion()
    {
        return $this->fechaRealizacion;
    }


}