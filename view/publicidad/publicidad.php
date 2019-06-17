
<h2>Lista de promociones/publicidad</h2>
<div class="well well-sm text-right">
    <a class="btn btn-success" href="?c=Publicidad&a=Crud">Subir nueva promoción</a>
    <a class="btn btn-info" href="view/pedido/reporte.php" target="_blank">Imprimir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:90px;">ID</th>
            <th style="width:120px;">ID_negocio</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:100px;">Descripción</th>
            <th style="width:120px;">Productos</th>
            <th style="width:120px;">Imagen</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $modelo = $this->model->Listar();
     foreach($modelo->datos as $publicidad):
        ?>
        <tr>
            <td><?php echo $publicidad->id_pub; ?></td>
            <td><?php echo $publicidad->id_estab; ?></td>
            <td><?php echo $publicidad->nombre_pub; ?></td>
            <td><?php echo $publicidad->descripcion_pub; ?></td>
            <td><?php echo $publicidad->productos_pub;?></td>
            <td><img src="/mvc/assets/img/<?php echo $publicidad->imagen_pub;?>" width="90px"></td>
            <td>
                <a href="?c=Publicidad&a=Crud&id_pub=<?php echo $publicidad->id_pub; ?>" class="btn btn-warning">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Publicidad&a=Eliminar&id_pub=<?php echo $publicidad->id_pub; ?>" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
