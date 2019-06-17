<?php
require_once 'model/publicidad.php';

class PublicidadController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Publicidad();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/publicidad/publicidad.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $publicidad = new  Publicidad();

        if(isset($_REQUEST['id_pub'])){
            $datos = $this->model->Obtener($_REQUEST['id_pub'])->datos[0];
            $publicidad->id_pub = $datos->id_pub;
            $publicidad->id_estab = $datos->id_estab;
            $publicidad->nombre_pub = $datos->nombre_pub;
            $publicidad->descripcion_pub = $datos->descripcion_pub;
            $publicidad->productos_pub = $datos->productos_pub;
            $publicidad->imagen_pub = $datos->imagen_pub;
        }
        require_once 'view/header.php';
        require_once 'view/publicidad/publicidad-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $publicidad = new Publicidad();

        $id_pub = $_REQUEST['id_pub'];
        $publicidad->id_estab = $_REQUEST['id_estab'];
        $publicidad->nombre_pub = $_REQUEST['nombre_pub'];
        $publicidad->descripcion_pub = $_REQUEST['descripcion_pub'];
        $publicidad->productos_pub = $_REQUEST['productos_pub'];
        //$publicidad->imagen_pub = $_REQUEST['imagen_pub'];

        //subida de archivos
        $nombre_imagen = $_FILES['imagen_pub']['name'];
        $tipo_imagen =$_FILES['imagen_pub']['type'];
        $tama_imagen = $_FILES['imagen_pub']['size'];
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT']. '/mvc/assets/img/';
        $publicidad->imagen_pub = $nombre_imagen;
        move_uploaded_file($_FILES['imagen_pub']['tmp_name'],$carpeta_destino.$nombre_imagen);
    

        $datos_json = json_encode(
            array(
              //'id_pub' => $publicidad->id_pub,
              'id_estab' => $publicidad->id_estab,
              'nombre_pub' => $publicidad->nombre_pub,
              'descripcion_pub' => $publicidad->descripcion_pub,
              'productos_pub' => $publicidad->productos_pub,
              'imagen_pub' => $publicidad->imagen_pub
            )
        );
        echo $datos_json;
        $id_pub > 0
            ? $this->model->Actualizar($datos_json, $id_pub)
            : $this->model->Registrar($datos_json);
        header('Location: index.php?c=Publicidad');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_pub']);
        header('Location: index.php?c=Publicidad');
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
