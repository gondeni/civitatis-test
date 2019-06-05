<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test_civitatis</title>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\bootstrap-4.3.1-dist\css\bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!--JQUERY-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--JavaScript-->
    <script href="<?= base_url() ?>assets\bootstrap-4.3.1-dist\js\bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script href="<?= base_url() ?>assets\datepicker-es.js"></script>

    <script>
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
                onSelect: function(date){
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

    </script>
    <style type="text/css">
        body {
            background-color: #CAEBF2;
            font-family: 'Roboto', sans-serif;
        }

        .login {
            border-style: outset;
            border-width: 1px;
            box-shadow: 1px 1px 1px 1px;
            margin-top: 200px;
            padding: 20px;
            border-radius: 10px;
            background-color: #EFEFEF;
        }

        .contenedor {
            postion: relative;
            max-width: 800px;
            max-height: 350px;
            margin: auto;
            border-style: outset;
            border-width: 1px;
            box-shadow: 1px 1px 1px 1px;
            margin-top: 200px;
            padding: 20px;
            border-radius: 10px;
            background-color: #EFEFEF;
        }

        .formulario {
            margin: auto;
            padding: 10px;
            margin-top: 10%;
            width: 90%;
        }

        .btn-primary {
            margin-top: 40%;
        }

        .seccion {
            padding: 20px;
            background-color: #EFEFEF;
            color: #565656;
            border-radius: 5px;
        }

        .errores {
            color: red;
        }

        h2 {
            color: #565656;
        }

        h3 {
            color: #565656;
        }

        label {
            color: #565656;
        }

        .error {
            background-color: #FF3B3F;
        }

        table {
            text-align: center;
        }

        table th {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">