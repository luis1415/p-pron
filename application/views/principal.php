<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Pronóstico</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href=""> </a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>imagenes/icono.jpg" height="32" width="42"></a></li>
            <li><a href="#">Pronóstico</a></li>
            <li><a href="#">Forecast</a></li>
            <li><a href="#">Acerca del Pronóstico</a></li>
        </ul>
    </div>
</nav>

<div>
    <h2 style="text-align: center">Pronóstico</h2>
    <p style="text-align: center">Mapa Estaciones de Temperatura</p>
</div>
<div><iframe src="https://www.google.es/maps/d/u/0/embed?mid=1uWo46bIDtsQ9mmhabQYoonmeZnw" width="100%" height="1040"></iframe></div>

<!--END FOOTER -->

<div width="100%" height="10%" id="footer" style="background-color:#000000; color: white; align: center;">
    <table border="0" border="0" width="100%">
        <tr style="padding-bottom:2px;" align="center">
            <td> Sistema de Alerta Temprana de Medellín y el valle de Aburrá</td>
        </tr>
        <tr style="padding-bottom:2px;" align="center">
            <td> Calle 50 # 71-147- Torre SIATA </td>
        </tr>
        <tr style="padding-bottom:2px;" align="center">
            <td> Tel&eacute;fonos: 4341987- 4341993 </td>
        </tr>
        <tr align="center">
            <td> monitoreo.siata@gmail.com </td>
        </tr>
        <tr align="center">
            <td> 2017 </td>
        </tr>
    </table>
</div>


<!--END FOOTER -->
</body>
</html>




