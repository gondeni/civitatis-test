<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</div>
</body>
<script src="<?= base_url() ?>assets/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
<script src="<?= base_url() ?>assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<!--JavaScript-->
<script href="<?= base_url() ?>assets/datepicker-es.js"></script>
<script src="<?= base_url() ?>assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script href="<?= base_url() ?>assets/bootbox.min.js"></script>
<!--<script href="--><? //= base_url() ?><!--assets/bootbox.locales.min.js"></script>-->

<script>
    $('document').ready(function () {

        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '< Ant',
            nextText: 'Sig >',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };

        $.datepicker.setDefaults($.datepicker.regional['es']);
        $(function () {
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $(".fecha_ini").datepicker({
                dateFormat: 'dd-mm-yy',
                minDate: new Date(),
                onSelect: function (date) {
                    var date2 = $('.fecha_ini').datepicker('getDate');
                    date2.setDate(date2.getDate() + 1);
                    $('.fecha_fin').datepicker('setDate', date2);
                    //sets minDate to dt1 date + 1
                    $('.fecha_fin').datepicker('option', 'minDate', date2);
                }
            });
            $(".fecha_fin").datepicker({
                dateFormat: 'dd-mm-yy',
                minDate: new Date()
            });

        });
    });


    function reservar(element) {
        var datos = $(element).val();
        datos = datos.split(',');
        idActividad = datos[0];
        personas = datos[1];
        precio = datos[2];
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/Reserva_CONT/reservar',
            data: {idActividad: idActividad, personas: personas, precio: precio},
            async: false,
            success: function (datos) {
                $('.modal-body').append('<p>Actividad reservada. Número de reserva:'+datos+'</p> <button type="button" class="btn btn-secondary pull-right" id="cerrar" onclick="location.reload()" data-dismiss="modal">Cerrar</button>');
                $(element).hide();
            }
        });
    }

</script>

</html>