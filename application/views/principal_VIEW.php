<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$fechas = array('name' => 'fechas', 'placeholder' => 'Elija un rango de fechas', 'type' => 'date', 'class' => 'form-control input-sm datepicker');
$numero = array('name' => 'numero', 'placeholder' => '1', 'type' => 'number','min'=>'1','max'=>'10', 'class' => 'form-control input-sm');
$submit = array('name' => 'submit', 'value' => 'Entrar', 'title' => 'Entrar', 'class' => 'btn btn-primary input-sm btn-sm');
?>
<div class="contenedor">
    <div class="formulario">

        <?php echo form_open('Principal_CONT'); ?>
        <div class="row">
            <div class="col-md-4">
                <label for="fechas">Fechas</label>
                <?php echo form_input($fechas) ?>
            </div>
            <div class="col-md-4">
                <label for="numero">Nº de personas</label>
                <?php echo form_input($numero) ?>
            </div>
            <div class="col-md-1">
                <?php echo form_input($submit) ?>
            </div>
        </div>
        <?php echo form_close() ?>
        <br>
        <?php echo validation_errors(); ?>
    </div>
</div>