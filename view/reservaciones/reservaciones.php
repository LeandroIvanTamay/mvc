
<h2>Reservaciones</h2>
<div class="well well-sm text-right">
    <a class="btn btn-success" href="?c=Reservacion&a=Crud">Agregar Nueva Reservacion</a>
    <a class="btn btn-info" href="view/reservaciones/reporte.php" target="_blank">Imprimir</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:90px;">ID</th>
            <th style="width:120px;">Establecimiento</th>
            <th style="width:120px;">Numero de Mesa</th>
            <th style="width:100px;">Cantidad de Personas</th>
            <th style="width:120px;">Hora de Reservacion</th>
            <th style="width:120px;">Hora de Registro</th>
            <th style="width:120px;">ID Cliente</th>
       
            <th style="width:120px;">Status</th>

        </tr>
    </thead>
    <tbody>

    <?php
    $modelo = $this->model->Listar();
     foreach($modelo->datos as $reservaciones):
        ?>
        <tr>
            <td><?php echo $reservaciones->id_reservacion; ?></td>
            <td><?php echo $reservaciones->id_estab; ?></td>
            <td><?php echo $reservaciones->num_mesa; ?></td>
            <td><?php echo $reservaciones->cantidad_personas; ?></td>
            <td><?php echo $reservaciones->hora_reservacion;?></td>
            <td><?php echo $reservaciones->hora_registro; ?></td>
            <td><?php echo $reservaciones->id_cte; ?></td>
            <td><?php echo $reservaciones->id_cte; ?></td>
            <td><?php echo $reservaciones->status_reservacion; ?></td>

            <td>
                <a href="?c=Reservacion&a=Crud&id_reservacion=<?php echo $reservaciones->id_reservacion; ?>" class="btn btn-warning">Editar</a>
            </td>
            <td>
                <a href ="?c=reservacion&a=VIEW&id_reservacion=<?php echo $reservaciones->id_reservacion; ?>" class="btn btn-primary">Ver detalles</a>
            </td>
             <td>
                <a href ="?c=reservacion&a=Detail&id_reservacion=<?php echo $reservaciones->id_reservacion; ?>" class="btn btn-primary">SOAP</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Reservacion&a=Eliminar&id_reservacion=<?php echo $reservaciones->id_reservacion; ?>" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>
