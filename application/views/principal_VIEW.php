<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$fecha_ini = array('name' => 'fecha_ini', 'placeholder' => 'dd-mm-aaaa', 'class' => 'form-control input-sm fecha_ini');
$fecha_fin = array('name' => 'fecha_fin', 'placeholder' => 'dd-mm-aaaa', 'class' => 'form-control input-sm fecha_fin');
$numero = array('name' => 'numero', 'placeholder' => '1','value'=>'1', 'type' => 'number','min'=>'1','max'=>'10', 'class' => 'form-control input-sm');
$submit = array('name' => 'submit', 'value' => 'Buscar', 'title' => 'Buscar','type'=>'submit', 'class' => 'btn btn-primary input-sm btn-sm');
?>
<div class="contenedor">
    <div class="formulario">

        <?php echo form_open('Principal_CONT'); ?>
        <div class="row">
            <div class="col-md-3">
                <label for="fecha_ini">Fecha Inicio</label>
                <?php echo form_input($fecha_ini) ?>
            </div>
            <div class="col-md-3">
                <label for="fecha_fin">Fecha Fin</label>
                <?php echo form_input($fecha_fin) ?>
            </div>
            <div class="col-md-3">
                <label for="numero">Nº Reservas</label>
                <?php echo form_input($numero) ?>
            </div>
            <div class="col-md-2">
                <?php echo form_input($submit) ?>
            </div>
            </div>
        <div class="row" style="margin-top:20px">

            <div class="col-md-12 errores">
                <?php echo validation_errors(); ?>
            </div>

        </div>
        <?php echo form_close() ?>
        <br>
    </div>
</div>