<h1 class="page-header">
    <?php
    echo $pedido->id_estab != null ? $pedido->id_estab : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Establecimientos">Establecimientos</a></li>
  <li class="active"><?php echo $pedido->id_estab != null ? $pedido->id_estab : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Establecimientos&a=Guardar&folio=<?php echo $pedido->id_estab; ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">

    <label>ID</label>
      <input type="text" name="id_estab" value="<?php echo $pedido->id_estab; ?>" class="form-control" disabled/>
    </div>

    <div class="form-group">
        <label>nombre del Establecimiento</label>
        <input type="text" name="nombre_estab" value="<?php echo $pedido->nombre_estab; ?>" class="form-control" placeholder="Ingrese el nombre" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Numero de exterior</label>
        <input type="text" name="num_exterior_estab" value="<?php echo $pedido->num_exterior_estab; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Calle</label>
        <input type="text" name="calle_estab" value="<?php echo $pedido->calle_estab; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Cruzamiento 1</label>
        <input type="text" name="cruzamiento1_calle_estab" value="<?php echo $pedido->cruzamiento1_calle_estab; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Cruzamiento 2</label>
        <input type="text" name="cruzamiento2_calle_estab" value="<?php echo $pedido->cruzamiento2_calle_estab; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Colonia</label>
        <input type="text" name="colonia_estab" value="<?php echo $pedido->colonia_estab; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Ciudad</label>
        <input type="text" name="ciudad_estab" value="<?php echo $pedido->ciudad_estab; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Telefono</label>
        <input type="text" name="telefono_estab" value="<?php echo $pedido->telefono_estab; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="correo_estab" value="<?php echo $pedido->correo_estab; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Horarios</label>
        <input type="text" name="horarios" value="<?php echo $pedido->horarios; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion_estab" value="<?php echo $pedido->descripcion_estab; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Tipo de cocina</label>
        <input type="text" name="id_tipo_cocina" value="<?php echo $pedido->id_tipo_cocina; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Servicio a domicilio</label>
        <input type="text" name="serv_domicilio" value="<?php echo $pedido->serv_domicilio; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Servicio de resevacion</label>
        <input type="text" name="serv_reserv" value="<?php echo $pedido->serv_reserv; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Servicio de resevacion</label>
        <input type="text" name="serv_reserv" value="<?php echo $pedido->serv_reserv; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Calificacion</label>
        <input type="text" name="calificacion" value="<?php echo $pedido->calificacion; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Tipo de restaurante</label>
        <input type="text" name="id_tipo_rest" value="<?php echo $pedido->id_tipo_rest; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>ubicacion</label>
        <input type="text" name="ubicacion_gps_estab" value="<?php echo $pedido->ubicacion_gps_estab; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label for="imagen">Url foto de Establecimiento</label>
        <input type="file" name="foto_estab" value="<?php echo $pedido->foto_estab; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Url foto de logo</label>
        <input type="text" name="logo_estab" value="<?php echo $pedido->logo_estab; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
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
