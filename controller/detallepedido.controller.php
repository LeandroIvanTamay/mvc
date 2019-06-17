<?php
require_once 'model/detallePedido.php';

class detallepedidoController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new detallePedido();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/pedido/pedido.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $pedido = new detallepedido();
        if(isset($_REQUEST['folio'])){
            $datos = $this->model->Obtener($_REQUEST['folio'])->datos[0];
            $pedido->folio = $datos->folio;
            $pedido->id_cte = $datos->id_cte;
            $pedido->id_estab = $datos->id_estab;
            $pedido->hora_solicitud = $datos->hora_solicitud;
            $pedido->status_pedido = $datos->status_pedido;
            $pedido->forma_pago = $datos->forma_pago;
            $pedido->total = $datos->total;
            //$pedido->folio = $this->model->Obtener($_REQUEST['folio'])->folio;
        }

        require_once 'view/header.php';
        require_once 'view/pedido/detallePedido-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $pedido = new detallePedido();

        $folio = $_REQUEST['folio'];
        $pedido->id_cte = $_REQUEST['id_cte'];
        $pedido->id_estab = $_REQUEST['id_estab'];
        $pedido->hora_solicitud = $_REQUEST['hora_solicitud'];
        $pedido->status_pedido = $_REQUEST['status_pedido'];
        $pedido->forma_pago = $_REQUEST['forma_pago'];
        $pedido->total = $_REQUEST['total'];

        $datos_json = json_encode(
            array(
                //'folio' => $pedido->folio,
                'id_alim' => $pedido->id_alim,
                'precio_unit_alim' =>$pedido->precio_unit_alim,
                'cantidad'=>$pedido->cantidad,
                'subtotal'=>$pedido->subtotal,
                'lugar_entrega'=>$pedido->lugar_entrega,
            )
        );
        $folio > 0
            ? $this->model->Actualizar($datos_json,$folio)
            : $this->model->Registrar($datos_json);

        header('Location: index.php');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['folio']);
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
