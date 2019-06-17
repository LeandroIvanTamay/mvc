<h1 class="page-header">
    <?php
    echo $publicidad->id_pub != null ? $publicidad->id_pub : 'Nuevo registro de publicidad'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Publicidad">Publicidad</a></li>
  <li class="active"><?php echo $publicidad->id_pub != null ? $publicidad->id_pub : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Publicidad&a=Guardar&id_pub=<?php echo $publicidad->id_pub; ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>ID. Publicidad</label>
      <input type="text" name="id_pub" value="<?php echo $publicidad->id_pub; ?>" class="form-control" disabled/>
    </div>

    <div class="form-group">
        <label>Establecimiento</label>
        <input type="text" name="id_estab" value="<?php echo $publicidad->id_estab; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre_pub" value="<?php echo $publicidad->nombre_pub; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Detalles</label>
        <input type="text" name="descripcion_pub" value="<?php echo $publicidad->descripcion_pub; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Productos</label>
        <input type="text" name="productos_pub" value="<?php echo $publicidad->productos_pub; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>
    <div class="form-group">
        <label for="imagen">Url foto de Establecimiento</label>
        <input type="file" name="imagen_pub" value="<?php echo $publicidad->imagen_pub; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
