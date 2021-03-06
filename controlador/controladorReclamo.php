<?php
class controladorReclamo
{
    public function reclamo()
    {

        include_once("../modelo/Eproforma.php");
        $objCliente = new Eproforma;
        $nombre_function = 'funct_' . $_REQUEST['accion'];

        if (method_exists($objCliente, $nombre_function)) {

            $regreso = call_user_func(array($objCliente, $nombre_function));

            return json_encode($regreso, JSON_PRETTY_PRINT);
        } else {
            return 'no existe';
        }
        // } else {
        //     // header("Location: http://www.google.com/");

        // }

    }

    public function funct_vista_listareclamo()
    {

        include_once("../vistas/ModuloReclamo/formListaReclamo.php");
        include_once('../componentes/cabecera.php');

        $objCabecera = new html;
        $objCabecera->cabecera();
        listaReclamo::mostrarListaReclamo();
        $objCabecera->footer('listaReclamo');
    }

    public function funct_vista_reclamo()
    {

        include_once("../vistas/ModuloReclamo/formReclamo.php");
        include_once('../componentes/cabecera.php');

        $objCabecera = new html;
        $objCabecera->cabecera();
        reclamo::mostrarReclamo();
        $objCabecera->footer('listaReclamo');
    }
}
