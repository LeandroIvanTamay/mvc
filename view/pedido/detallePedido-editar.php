<h1 class="page-header">
    <?php
    echo $pedido->folio != null ? $pedido->folio : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Pedido">Pedidos</a></li>
  <li class="active"><?php echo $pedido->folio != null ? $pedido->folio : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Pedido" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Folio</label>
      <input type="text" name="folio" value="<?php echo $pedido->folio; ?>" class="form-control" disabled/>
    </div>

    <div class="form-group">
        <label>Id cliente</label>
        <input type="text" name="id_cte" value="<?php echo $pedido->id_alim; ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label>Id estab</label>
        <input type="text" name="id_estab" value="<?php echo $pedido->precio_unit_alim; ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label>hora solicitud</label>
        <input type="text" name="hora_solicitud" value="<?php echo $pedido->cantidad; ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label>Status pedido</label>
        <input type="text" name="status_pedido" value="<?php echo $pedido->subtotal; ?>" class="form-control" disabled />
    </div>

    <div class="form-group">
        <label>Forma de pago</label>
        <input type="text" name="forma_pago" value="<?php echo $pedido->lugar_entrega; ?>" class="form-control" disabled />
    </div>


    <hr />

    <div class="text-right">
        <button class="btn btn-success">Atras</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>
