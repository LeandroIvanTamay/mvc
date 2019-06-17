<h2>Menú de alimentos y bebidas</h2>

<div class="well well-sm text-right">
    <a class="btn btn-success" href="?c=Alimento&a=Crud">Agregar alimento/bebida</a>
    <a class="btn btn-info" href="view/pedido/reporte.php" target="_blank">Imprimir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id.</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Unidad</th>
            <th>Tiempo prep.</br>(minutos)</th>
            <th>Tipo de comida</th>
            <th>Tiempo de menú</th>
            <th>Imagen</th>
            <th>existencia</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $modelo = $this->model->Listar();
     foreach($modelo->datos as $alimento):
        ?>
        <tr>
            <td><?php echo $alimento->id_alim;?></td>
            <td><?php echo $alimento->nombre_alim;?></td>
            <td><a href="#" data-toggle="tooltip" title="<?php echo $alimento->descripcion_alim;?>">Detalles</a></td>
            <td><?php echo $alimento->precio_unit;?></td>
            <td><?php echo $alimento->u_medida;?></td>
            <td><?php echo $alimento->tiempo_prep;?></td>
            <td><?php echo $alimento->id_tipo_cocina;?></td>
            <td><?php echo $alimento->tiempo_menu;?></td>
            <td><?php echo $alimento->foto_alim;?></td>
            <td><?php echo $alimento->existencia;?></td>
            <td>
                <a href="?c=Alimento&a=Crud&id_alim=<?php echo $alimento->id_alim; ?>" class="btn btn-warning">Modificar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Alimento&a=Eliminar&id_alim=<?php echo $alimento->id_alim; ?>" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
