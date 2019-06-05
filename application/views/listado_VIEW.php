<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre/>";
//var_dump($actividades);
/*var_dump($actividades);
var_dump($info);*/
?>
<div class="contenedor">
    <div class="row">
        <div class="col-md-12">
            <h2>Actividades</h2>
            <hr/>
            <?php if (count($actividades)) { ?>
                <table class="table table-striped" style="text-align: center;">
                    <thead>
                    <tr>
                        <th class="text-left">Título</th>
                        <!--                <th>Descripción</th>
                                        <th>Fechas</th>-->
                        <th>Precio total (<?php echo $info['numero'] ?> persona/s)</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($actividades as $actividad) { ?>
                        <?php echo form_open('Reserva_CONT/reservar'); ?>
                        <tr>
                            <td name="titulo"><?php echo $actividad->titulo ?>
                            </td>
                            <td class="text-center"><?php echo ($actividad->precio) * ($info['numero']) ?> €</td>
                            <td>
                                <input id="prodId" name="idActividad" type="hidden" value="<?php echo $actividad->idActividad?>">
                                <input id="prodId" name="numero" type="hidden" value="<?php echo $info['numero']?>">
                                <input id="prodId" name="precio" type="hidden" value="<?php echo ($actividad->precio) * ($info['numero'])?>">
                                <button class="btn btn-md btn-info ver-mas" type="submit">Ver más</button>
                            </td>
                        </tr>
                        <?php echo form_close(); ?>
                    <?php } ?>
                    </tbody>
                    <a class="btn btn-danger" href="<?= site_url('Principal_CONT') ?>">Volver</a>
                </table>
                <div class="modal" id="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">m
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <a class="btn btn-danger" href="<?= site_url('Principal_CONT') ?>">Volver</a>
                <p> No hay datos </p>
            <?php } ?>
        </div>
    </div>
</div>
