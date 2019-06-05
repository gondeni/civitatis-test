<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_CONT extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {

//        Borramos chache del listado
        $this->output->delete_cache('Actividad_CONT/listar');

        $this->load->library('form_validation', 'session');

        $this->form_validation->set_rules('fecha_ini', 'Fecha Inicio', 'required', array('required' => 'La fecha de inicio es obligatoria'));
        $this->form_validation->set_rules('fecha_fin', 'Fecha Fin', 'required', array('required' => 'La fecha fin es obligatoria'));
        $this->form_validation->set_rules('numero', 'Nº de reservas', 'required|trim|min_length[1]|max_length[150]', array('required' => 'El nº de personas de la reserva es obligatorio'));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('utils/head');
            $this->load->view('principal_VIEW');
            $this->load->view('utils/foot');
        } else {
            $dat = array('fecha_ini' => $_POST['fecha_ini'], 'fecha_fin' => $_POST['fecha_fin'], 'numero' => $_POST['numero']);
            $this->session->set_flashdata('datos', $dat);
            redirect('Actividad_CONT/listar');
        }
    }
}
