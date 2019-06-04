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

<!--    DateRangePicker-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script>
        $(function () {
            var hoy = new Date();
            $('input[name="fechas"]').daterangepicker({
                startDate: hoy,
                minDate: hoy,
                opens: 'left',
                drops: 'down',
/*
                "locale": {
                    "format": "MM/DD/YYYY",
                    "separator": " - ",
                    "applyLabel": "Aplicar",
                    "cancelLabel": "Cancelar",
                    "fromLabel": "Desde",
                    "toLabel": "Hasta",
                    "customRangeLabel": "Personalizado",
                    "daysOfWeek": [
                        "Dom",
                        "Lun",
                        "Mar",
                        "Mie",
                        "Jue",
                        "Vie",
                        "Sa"
                    ],
                    "monthNames": [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ],
                    "firstDay": 1
                }
*/
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
            height: 300px;
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
            padding:10px;
            width: 80%;
        }
        .btn-primary{
            margin-top:100%;
        }
        .seccion {
            padding: 20px;
            background-color: #EFEFEF;
            color: #565656;
            border-radius: 5px;
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