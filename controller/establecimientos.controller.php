<?php
require_once 'model/establecimiento.php';

class EstablecimientosController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Establecimiento();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/establecimientos/establecimientos.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $pedido = new Establecimiento();
        if(isset($_REQUEST['folio'])){
            $datos = $this->model->Obtener($_REQUEST['folio'])->datos[0];
            $pedido->id_estab = $datos->id_estab;
            $pedido->nombre_estab = $datos->nombre_estab;
            $pedido->num_exterior_estab = $datos->num_exterior_estab;
            $pedido->calle_estab = $datos->calle_estab;
            $pedido->cruzamiento1_calle_estab = $datos->cruzamiento1_calle_estab;
            $pedido->cruzamiento2_calle_estab = $datos->cruzamiento2_calle_estab;
            $pedido->colonia_estab = $datos->colonia_estab;
            $pedido->ciudad_estab = $datos->ciudad_estab;
            $pedido->telefono_estab = $datos->telefono_estab;
            $pedido->correo_estab = $datos->correo_estab;
            $pedido->horarios = $datos->horarios;
            $pedido->descripcion_estab = $datos->descripcion_estab;
            $pedido->id_tipo_cocina = $datos->id_tipo_cocina;
            $pedido->serv_domicilio = $datos->serv_domicilio;
            $pedido->serv_reserv = $datos->serv_reserv;
            $pedido->calificacion = $datos->calificacion;
            $pedido->id_tipo_rest = $datos->id_tipo_rest;
            $pedido->ubicacion_gps_estab = $datos->ubicacion_gps_estab;
            $pedido->foto_estab = $datos->foto_estab;
            $pedido->logo_estab = $datos->logo_estab;
            //$pedido->folio = $this->model->Obtener($_REQUEST['folio'])->folio;
        }
        require_once 'view/header.php';
        require_once 'view/establecimientos/establecimiento-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $pedido = new Establecimiento();
        //var_dump($_REQUEST);
        $id_estab = $_REQUEST['folio'];
        $pedido->id_estab = $_REQUEST['folio'];
        $pedido->nombre_estab = $_REQUEST['nombre_estab'];
        $pedido->num_exterior_estab = $_REQUEST['num_exterior_estab'];
        $pedido->calle_estab = $_REQUEST['calle_estab'];
        $pedido->cruzamiento1_calle_estab = $_REQUEST['cruzamiento1_calle_estab'];
        $pedido->cruzamiento2_calle_estab = $_REQUEST['cruzamiento2_calle_estab'];
        $pedido->colonia_estab = $_REQUEST['colonia_estab'];
        $pedido->ciudad_estab = $_REQUEST['ciudad_estab'];
        $pedido->telefono_estab = $_REQUEST['telefono_estab'];
        $pedido->correo_estab = $_REQUEST['correo_estab'];
        $pedido->horarios = $_REQUEST['horarios'];
        $pedido->descripcion_estab = $_REQUEST['descripcion_estab'];
        $pedido->id_tipo_cocina = $_REQUEST['id_tipo_cocina'];
        $pedido->serv_domicilio = $_REQUEST['serv_domicilio'];
        $pedido->serv_reserv = $_REQUEST['serv_reserv'];
        $pedido->calificacion = $_REQUEST['calificacion'];
        $pedido->id_tipo_rest = $_REQUEST['id_tipo_rest'];
        $pedido->ubicacion_gps_estab = $_REQUEST['ubicacion_gps_estab'];
        //$pedido->foto_estab = $_REQUEST['foto_estab'];
        $pedido->logo_estab = $_REQUEST['logo_estab'];

        //subida de archivos
        $nombre_imagen = $_FILES['foto_estab']['name'];
        $tipo_imagen =$_FILES['foto_estab']['type'];
        $tama_imagen = $_FILES['foto_estab']['size'];
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT']. '/mvc/assets/img/';
        $pedido->foto_estab = $nombre_imagen;
        move_uploaded_file($_FILES['foto_estab']['tmp_name'],$carpeta_destino.$nombre_imagen);
    
    $datos_json = json_encode(
        array(
                'id_estab'=> $pedido->id_estab,
                'nombre_estab'=> $pedido->nombre_estab,
                'num_exterior_estab'=> $pedido->num_exterior_estab,
                'calle_estab'=> $pedido->calle_estab,
                'cruzamiento1_calle_estab'=> $pedido->cruzamiento1_calle_estab,
                'cruzamiento2_calle_estab'=> $pedido->cruzamiento2_calle_estab,
                'colonia_estab'=> $pedido->colonia_estab,
                'ciudad_estab'=> $pedido->ciudad_estab,
                'telefono_estab'=> $pedido->telefono_estab,
                'correo_estab'=> $pedido->correo_estab,
                'horarios'=> $pedido->horarios,
                'descripcion_estab'=> $pedido->descripcion_estab,
                'id_tipo_cocina'=> $pedido->id_tipo_cocina,
                'serv_domicilio'=> $pedido->serv_domicilio,
                'serv_reserv'=> $pedido->serv_reserv,
                'calificacion'=> $pedido->calificacion,
                'id_tipo_rest'=> $pedido->id_tipo_rest,
                'ubicacion_gps_estab'=> $pedido->ubicacion_gps_estab,
                'foto_estab'=> $pedido->foto_estab,
                'logo_estab'=> $pedido->logo_estab
            )
        );
        $id_estab > 0
            ? $this->model->Actualizar($datos_json,$id_estab)
            : $this->model->Registrar($datos_json);
            header('Location: index.php?c=Establecimientos');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['folio']);
        header('Location: index.php?c=Establecimientos');
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
