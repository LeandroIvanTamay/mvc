<?php
require_once 'model/reservacion.php';

class ReservacionController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Reservacion();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/reservaciones/reservaciones.php';
        require_once 'view/footer.php';
    }
//Soap Implementation
    public function Detail(){
        $reservaciones = new Reservacion();
        if(isset($_REQUEST['id_reservacion'])){
            $datos = $this->model->ObtenerSoap($_REQUEST['id_reservacion'])->datos[0];

           
        $reservaciones->id_reservacion = $datos['id_reservacion'];
        $reservaciones->id_estab = $datos['id_estab'];
        $reservaciones->num_mesa = $datos['num_mesa'];
        $reservaciones->cantidad_personas = $datos['cantidad_personas'];
        $reservaciones->hora_reservacion = $datos['hora_reservacion'];
        $reservaciones->hora_registro = $datos['hora_registro'];
        $reservaciones->id_cte = $datos['id_cte'];
        $reservaciones->status_reservacion = $datos['status_reservacion'];


        }

        require_once 'view/header.php';
        require_once 'view/reservaciones/reservaciones-vista.php';
        require_once 'view/footer.php';
        

    }

    public function Crud(){
        $reservaciones = new  Reservacion();

        if(isset($_REQUEST['id_reservacion'])){
            $datos = $this->model->Obtener($_REQUEST['id_reservacion'])->datos[0];
            $reservaciones->id_reservacion = $datos->id_reservacion;
            $reservaciones->id_estab = $datos->id_estab;
            $reservaciones->num_mesa = $datos->num_mesa;
            $reservaciones->cantidad_personas = $datos->cantidad_personas;
            $reservaciones->hora_reservacion = $datos->hora_reservacion;
            $reservaciones->hora_registro = $datos->hora_registro;
            $reservaciones->id_cte = $datos->id_cte;
            $reservaciones->status_reservacion = $datos->status_reservacion;

        }
        require_once 'view/header.php';
        require_once 'view/reservaciones/reservaciones-editar.php';
        require_once 'view/footer.php';
    }

    public function VIEW(){
        $reservaciones = new  Reservacion();

        if(isset($_REQUEST['id_reservacion'])){
            $datos = $this->model->Obtener($_REQUEST['id_reservacion'])->datos[0];
            $reservaciones->id_reservacion = $datos->id_reservacion;
            $reservaciones->id_estab = $datos->id_estab;
            $reservaciones->num_mesa = $datos->num_mesa;
            $reservaciones->cantidad_personas = $datos->cantidad_personas;
            $reservaciones->hora_reservacion = $datos->hora_reservacion;
            $reservaciones->hora_registro = $datos->hora_registro;
            $reservaciones->id_cte = $datos->id_cte;
            $reservaciones->status_reservacion = $datos->status_reservacion;

        }
        require_once 'view/header.php';
        require_once 'view/reservaciones/reservaciones-vista.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $reservaciones = new Reservacion();

        $id_reservacion = $_REQUEST['id_reservacion'];
        $reservaciones->id_estab = $_REQUEST['id_estab'];
        $reservaciones->num_mesa = $_REQUEST['num_mesa'];
        $reservaciones->cantidad_personas = $_REQUEST['cantidad_personas'];
        $reservaciones->hora_reservacion = $_REQUEST['hora_reservacion'];
        $reservaciones->hora_registro = $_REQUEST['hora_registro'];
        $reservaciones->id_cte = $_REQUEST['id_cte'];
        $reservaciones->status_reservacion = $_REQUEST['status_reservacion'];
        $datos_json = json_encode(
            array(
              //'id_pub' => $publicidad->id_pub,
              'id_estab' => $reservaciones->id_estab,
              'num_mesa' => $reservaciones->num_mesa,
              'cantidad_personas' => $reservaciones->cantidad_personas,
              'hora_reservacion' => $reservaciones->hora_reservacion,
              'hora_registro' => $reservaciones->hora_registro,
              'id_cte' => $reservaciones ->id_cte,
              'status_reservacion' => $reservaciones ->status_reservacion
            )
        );
        echo $datos_json;
        $id_reservacion > 0
            ? $this->model->Actualizar($datos_json, $id_reservacion)
            : $this->model->Registrar($datos_json);
        header('Location: index.php?c=Reservacion');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_reservacion']);
        header('Location: index.php?c=Reservacion');
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('Location: login.php');
    }

    //creacion del reporte
    public function Reporte(){
        require_once 'model/reportes.php';
    }
}
