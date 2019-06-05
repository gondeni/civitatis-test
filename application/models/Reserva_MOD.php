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

    public function nuevaReserva($data)
    {
        $this->db->set($data);
        $this->db->insert('reservas', $data);
    }

    public function getReservas()
    {
        $this->db->select('*');
        $this->db->from('reservas');
        $consulta = $this->db->get();
        $resultados = $consulta->custom_result_object('Reserva_MOD');
        return $resultados;
    }

    public function comprobarReferencia($referencia)
    {
        $this->db->select('*');
        $this->db->from('reservas');
        $this->db->like('referencia',$referencia, 'both');
        $consulta = $this->db->get();
        $resultados = $consulta->num_rows();
        return $resultados;
    }


}