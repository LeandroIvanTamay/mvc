<?php
require_once 'model/alimento.php';
//hola
class AlimentoController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Alimento();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/alimento/alimento.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $alimento = new  Alimento();

        if(isset($_REQUEST['id_alim'])){
            $datos = $this->model->Obtener($_REQUEST['id_alim'])->datos[0];
            $alimento->id_alim = $datos->id_alim;
            $alimento->nombre_alim = $datos->nombre_alim;
            $alimento->descripcion_alim = $datos->descripcion_alim;
            $alimento->u_medida = $datos->u_medida;
            $alimento->tiempo_prep = $datos->tiempo_prep;
            $alimento->precio_unit = $datos->precio_unit;
            $alimento->id_tipo_cocina = $datos->id_tipo_cocina;
            $alimento->tiempo_menu = $datos->tiempo_menu;
            $alimento->foto_alim = $datos->foto_alim;
            $alimento->existencia = $datos->existencia;
        }

        require_once 'view/header.php';
        require_once 'view/alimento/alimento-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $alimento = new Alimento();

        $alimento->id_alim = $_REQUEST['id_alim'];
        $alimento->nombre_alim = $_REQUEST['nombre_alim'];
        $alimento->descripcion_alim = $_REQUEST['descripcion_alim'];
        $alimento->u_medida = $_REQUEST['u_medida'];
        $alimento->tiempo_prep = $_REQUEST['tiempo_prep'];
        $alimento->precio_unit = $_REQUEST['precio_unit'];
        $alimento->id_tipo_cocina = $_REQUEST['id_tipo_cocina'];
        $alimento->tiempo_menu = $_REQUEST['tiempo_menu'];
        $alimento->foto_alim = $_REQUEST['foto_alim'];
        $alimento->existencia = $_REQUEST['existencia'];
        $datos_json = json_encode(
            array(
              'id_alim' => $alimento->id_alim,
              'nombre_alim' => $alimento->nombre_alim,
              'descripcion_alim' => $alimento->descripcion_alim,
              'u_medida' => $alimento->u_medida,
              'tiempo_prep' => $alimento->tiempo_prep,
              'precio_unit' => $alimento->precio_unit,
              'id_tipo_cocina' => $alimento->id_tipo_cocina,
              'tiempo_menu' => $alimento->tiempo_menu,
              'foto_alim' => $alimento->foto_alim,
              'existencia' => $alimento->existencia
            )
        );

        $this->model->Obtener($alimento->id_alim)->datos[0]->id_alim == (string)$alimento->id_alim
            ? $this->model->Actualizar($datos_json, $alimento->id_alim)
            : $this->model->Registrar($datos_json);
        header('Location: index.php?c=Alimento');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_alim']);
        header('Location: index.php');
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
