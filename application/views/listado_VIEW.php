<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                        <th>Precio total (<?php echo $info['numero'] ?> persona/s)</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($actividades as $actividad) { ?>
                        <tr>
                            <td name="titulo"><?php echo $actividad->titulo ?>
                            </td>
                            <td class="text-center"><?php echo ($actividad->precio) * ($info['numero']) ?> €</td>
                            <td>
                                <button type="button" class="ver-mas btn btn-primary btn-sm"
                                        id="myModal_<?php echo $actividad->idActividad ?>" data-toggle="modal"
                                        data-target="#exampleModal_<?php echo $actividad->idActividad ?>">Más
                                    información
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal_<?php echo $actividad->idActividad ?>" tabindex="-1"
                             role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Información
                                            actividad: <?php echo $actividad->titulo ?></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="cuerpo">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div style="white-space: nowrap">
                                                        <label>Título de la actividad</label>
                                                        <p id="idActividad"><?php echo $actividad->titulo ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="white-space: nowrap">
                                                        <label>Fechas</label>
                                                        <p><?php echo $actividad->fechaIni . " - " . $actividad->fechaFin ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="white-space: nowrap">
                                                        <label>Número de personas</label>
                                                        <p id="personas"><?php echo $info['numero'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div style="white-space: nowrap">
                                                        <label>Precio total</label>
                                                        <p id="precio"><?php echo ($actividad->precio) * ($info['numero']) ?>
                                                            €</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="white-space: nowrap">
                                                        <label>Actividades relacionadas</label>
                                                        <ul>
                                                            <?php
                                                            if (count($actividad->relacionadas)) {
                                                                foreach ($actividad->relacionadas as $relacionada) {
                                                                    ?>
                                                                    <li><?php echo $relacionada ?></li>
                                                                <?php }
                                                            } else { ?>
                                                                <p>Sin actividades relacionadas</p>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="reservar_<?php echo $actividad->idActividad ?>"
                                                value="<?php echo $actividad->idActividad . ',' . $info['numero'] . ',' . ($actividad->precio) * ($info['numero']) ?>"
                                                onclick="reservar(this)" class="btn btn-primary btn-sm">Reservar
                                        </button>
                                        <!--                                        <button type="button" id="reservar" value="-->
                                        <?php //echo $actividad->idActividad?><!--" onclick="reservar(this)" class="btn btn-primary btn-sm">Reservar-->
                                        <!--                                        </button>-->
                                        <button type="button" class="btn btn-secondary" id="cerrar"
                                                style="display: none;" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </tbody>
                    <a class="btn btn-danger" href="<?= site_url('Principal_CONT') ?>">Volver</a>
                </table>
            <?php } else { ?>
                <a class="btn btn-danger" href="<?= site_url('Principal_CONT') ?>">Volver</a>
                <p> No hay datos </p>
            <?php } ?>
        </div>
    </div>
</div>

