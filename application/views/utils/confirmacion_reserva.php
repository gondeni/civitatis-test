<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="contenedor">
    <div class="row">
        <div class="col-md-12">

            <?php if (!empty($referencia)) { ?>
                <h1>¡Reserva confirmada!</h1>
                <p>Su número de código de reserva es: <?php echo $referencia ?></p>

                <a class="btn btn-danger" href="<?= site_url('Principal_CONT') ?>">Volver</a>
            <?php } else { ?>
                <h2>Algo no ha salido como debería... Vuelve a intentarlo.</h2>
                <a class="btn btn-danger" href="<?= site_url('Principal_CONT') ?>">Volver</a>
            <?php } ?>

        </div>
    </div>
</div>



