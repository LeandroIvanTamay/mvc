<h1 class="page-header">
    <?php
    echo $pedido->folio != null ? $pedido->folio : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Pedido">Pedidos</a></li>
  <li class="active"><?php echo $pedido->folio != null ? $pedido->folio : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Pedido&a=Guardar&folio=<?php echo $pedido->folio; ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Folio</label>
      <input type="text" name="folio" value="<?php echo $pedido->folio; ?>" class="form-control" disabled/>
    </div>

    <div class="form-group">
        <label>Id cliente</label>
        <input type="text" name="id_cte" value="<?php echo $pedido->id_cte; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Id estab</label>
        <input type="text" name="id_estab" value="<?php echo $pedido->id_estab; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>hora solicitud</label>
        <input type="text" name="hora_solicitud" value="<?php echo $pedido->hora_solicitud; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Status pedido</label>
        <input type="text" name="status_pedido" value="<?php echo $pedido->status_pedido; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Forma de pago</label>
        <input type="text" name="forma_pago" value="<?php echo $pedido->forma_pago; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>

    <div class="form-group">
        <label>Total</label>
        <input type="text" name="total" value="<?php echo $pedido->total; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
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
