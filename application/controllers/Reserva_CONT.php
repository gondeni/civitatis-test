<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Reserva_CONT
 */
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

    /**
     * Función para iniciar el proceso de reserva de actividad
     * Imprime el codigo de reserva devuelto por el modelo para posterior mostrado en la vista
     */
    public function reservar()
    {
        $idActividad = $_POST['idActividad'];
        $personas = $_POST['personas'];
        $precio = $_POST['precio'];

        do {
            $referencia = $idActividad . "-" . rand(0,9999);
            $existe = $this->Reserva_MOD->comprobarReferencia($referencia);
        } while ($existe == 1);


        $reserva = array(
            "idReserva" => null,
            "referencia" => $referencia,
            "personas" => intval($personas),
            "precio" => floatval($precio),
            "fechaReserva" => Date('Y-m-d'),
            "fechaRealizacion" => null
        );

        $this->Reserva_MOD->nuevaReserva($reserva);

        echo json_encode($referencia);
    }

}