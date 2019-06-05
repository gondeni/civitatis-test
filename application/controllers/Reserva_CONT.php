<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_CONT extends CI_Controller
{
    /**
     * Reserva_CONT constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reserva_MOD');
    }

    public function reservar()
    {

        $idActividad = $_POST['idActividad'];

        do {
            $referencia = $idActividad . "-" . rand(0,9999);
            $existe = $this->Reserva_MOD->comprobarReferencia($referencia);
        } while ($existe == 1);


        $reserva = array(
            "idReserva" => null,
            "referencia" => $referencia,
            "personas" => intval($_POST['numero']),
            "precio" => floatval($_POST['precio']),
            "fechaReserva" => Date('Y-m-d'),
            "fechaRealizacion" => null
        );

        $this->Reserva_MOD->nuevaReserva($reserva);

        $dat['referencia'] = $referencia;
        $this->load->view('utils/head');
        $this->load->view('utils/confirmacion_reserva', $dat);
        $this->load->view('utils/foot');

    }

    public function comprobarReferencia($referencia)
    {


    }
}