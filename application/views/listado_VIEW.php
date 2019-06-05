<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo "<pre/>";
//var_dump($actividades);
var_dump($actividades);
die();
?>
<div class="row seccion">
    <h4>Actividades</h4>
    <hr/>
    <?php if (count($actividades)) { ?>
        <table class="table table-striped" style="text-align: center;">
            <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fechas</th>
                <th>Precio</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($actividades as $actividad) { ?>
                <tr>
                    <td><?php echo $actividad->titulo?>
                    </td>
                    <td><?php echo $actividad->descripcion ?></td>
                    <td><?php echo $actividad->fechaIni." - ".$actividad->fechaFin ?></td>
                    <td><?php echo $actividad->precio?> €</td>
                    <td><button class="btn btn-md btn-info" data-toggle="modal" value="<?php echo $actividad->idActividad?>" data-target="#informacion_adicional">Ver más</button></td>
                </tr>
            <?php } ?>
            </tbody>
            <a href="<?= site_url('Principal_CONT') ?>" class="btn btn-default">Volver</a>
        </table>
    <?php } else { ?>
        <a href="<?= site_url('Principal_CONT') ?>" class="btn btn-default">Volver</a>
        <p> No hay datos </p>
    <?php } ?>
    <div class="modal fade" id="informacion_adicional" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>