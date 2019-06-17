<h2>Lista de establecimientos</h2>
<div class="well well-sm text-right">
    <a class="btn btn-success" href="?c=Establecimientos&a=Crud">Agregar establecimiento</a>
    <a class="btn btn-info" href="view/pedido/reporte.php" target="_blank">Imprimir</a>
</div>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th style="width:90px;">Folio</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">Numero de Exterior</th>
            <th style="width:100px;">Calle Principal</th>
            <th style="width:120px;">Cruzamientos</th>
            <th style="width:120px;">Colonia</th>
            <th style="width:120px;">Ciudad</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:120px;">Foto del Establecimiento</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>

    <?php
    $modelo = $this->model->Listar();
     foreach($modelo->datos as $pedido):
        ?>
        <tr>
            <td><?php echo $pedido->id_estab; ?></td>
            <td><?php echo $pedido->nombre_estab; ?></td>
            <td><?php echo $pedido->num_exterior_estab; ?></td>
            <td><?php echo $pedido->calle_estab; ?></td>
            <td><?php echo $pedido->cruzamiento1_calle_estab . " & " . $pedido->cruzamiento2_calle_estab;?></td>
            <td><?php echo $pedido->colonia_estab; ?></td>
            <td><?php echo $pedido->ciudad_estab; ?></td>
            <td><?php echo $pedido->telefono_estab; ?></td>
            <td><img src="/mvc/assets/img/<?php echo $pedido->foto_estab;?>" width="90px"></td>
            <td>
                <a href="?c=Establecimientos&a=Crud&folio=<?php echo $pedido->id_estab; ?>" class="btn btn-warning">Editar</a>
            </td>
            <td>
                <a href ="?c=detallePedido&a=Crud&folio=<?php echo $pedido->folio; ?>" class="btn btn-primary">Ver detalles</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Establecimientos&a=Eliminar&folio=<?php echo $pedido->id_estab; ?>" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
