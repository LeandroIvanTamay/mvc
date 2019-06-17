<h1 class="page-header">
    <?php
    echo $alimento->id_alim != null ? $alimento->id_alim : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Alimento">Menu</a></li>
  <li class="active"><?php echo $alimento->id_alim != null ? $alimento->id_alim : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Alimento&a=Guardar&id_alim=<?php echo $alimento->id_alim; ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Id</label>
    <input type="text" name="id_alim" value="<?php echo $alimento->id_alim; ?>" class="form-control" />
  </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre_alim" value="<?php echo $alimento->nombre_alim; ?>" class="form-control" placeholder="Nombre de la comida o bebida" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Descripción</label>
        <input type="text" name="descripcion_alim" value="<?php echo $alimento->descripcion_alim; ?>" class="form-control" placeholder="Descripción del alimento o bebida" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Unidad</label>
        <input type="text" name="u_medida" value="<?php echo $alimento->u_medida; ?>" class="form-control" placeholder="Pieza, botella, orden,paquete,etc." data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Tiempo prep.</label>
        <input type="number" name="tiempo_prep" value="<?php echo $alimento->tiempo_prep; ?>" class="form-control" placeholder="Tiempo de preparación(minutos)" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Precio</label>
        <input type="text" name="precio_unit" value="<?php echo $alimento->precio_unit; ?>" class="form-control" placeholder="Precio unitario del producto" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Estilo</label>
        <input type="text" name="id_tipo_cocina" value="<?php echo $alimento->id_tipo_cocina; ?>" class="form-control" placeholder="Tipo de comida, ej: mexicana, regional,mariscos,italiana, etc." data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Tiempo de menú</label>
        <input type="text" name="tiempo_menu" value="<?php echo $alimento->tiempo_menu; ?>" class="form-control" placeholder="Botana, plato fuerte, desayuno, postre" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Foto</label>
        <input type="text" name="foto_alim" value="<?php echo $alimento->foto_alim; ?>" class="form-control" placeholder="imagen del alimento o bebida" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Existencia</label>
        <input type="text" name="existencia" value="<?php echo $alimento->existencia; ?>" class="form-control" placeholder="Existencias" data-validacion-tipo="requerido|email" />
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
