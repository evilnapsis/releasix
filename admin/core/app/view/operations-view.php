<?php if(isset($_GET["opt"]) && $_GET["opt"]=="all"):

$ops = OperationData::getAll();
//$ins = OperationData::SumByKind(1);
//$outs = OperationData::SumByKind(2);
?>
<div class="content">
<div class="row">
<div class="col-md-12">

<h1>Operaciones</h1>
<a href="./?view=operations&opt=newdeposit" class="btn btn-default">Nuevo Deposito</a>
<a href="./?view=operations&opt=newspend" class="btn btn-default">Nuevo Gasto</a>

<br><br>




<?php if(count($ops)>0):?>
  <div class="box box-primary">
  <div class="box box-body">
	<table class="table table-bordered table-hover datatable ">
	<thead>
	<th>Id</th>
	<th>Concepto</th>		
	<th>Descripcion</th>		
	<th>Monto</th>		
  <th>Cuenta</th>    
  <th>Tipo</th>    
	<th>Fecha</th>
	<th></th>
	</thead>
	<?php foreach($ops as $op):?>
	<tr>
	<td><?php echo $op->id;?></td>
	<td><?php echo $op->concept;?></td>		
	<td><?php echo $op->description;?></td>		
	<td>$ <?php echo $op->amount;?></td>		
  <td><?php echo $op->getAccount()->name;?></td>   
  <td><?php if($op->kind==1){echo "Entrada";}else{ echo "Salida"; }?></td>    
	<td><?php echo $op->date_at;?></td>		
	<td style="width:160px;">
		<a href="./?view=operations&opt=edit&id=<?php echo $op->id;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> Editar</a>

        <?php if(Core::$user->is_admin):?>
        <a href="javascript:void" id="btn-<?php echo $op->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
        <script type="text/javascript">
        $("#btn-<?php echo $op->id;?>").click(function(){
          x<?php echo $op->id; ?> = confirm("Estas seguro que deseas eliminar ?");
          if(x<?php echo $op->id; ?>){
            window.location = "index.php?action=operations&opt=del&id=<?php echo $op->id; ?>";
          }

        });
        </script>
      <?php endif; ?>
	</td>
	</tr>
	<?php endforeach;?>
	</table>
  </div>
  </div>
<?php else:?>
<p class="alert alert-danger">No hay Operaciones</p>
<?php endif; ?>

</div>
</div>
</div>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="newdeposit"):?>
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Nuevo Deposito</h1>
<div class="row">
<div class="col-md-8">
<form method="post" action="./?action=operations&opt=add">
<input type="hidden" name="kind" value="1">

  <div class="form-group">
    <label for="exampleInputEmail1">Cuenta</label>
    <select class="form-control" name="account_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(AccountData::getAll() as $a):?>
    	<option value="<?php echo $a->id; ?>"><?php echo $a->name; ?></option>
    <?php endforeach; ?>
    </select>
  </div>

<div class="row">
  <div class="col-md-3">
  <div class="form-group">
    <label for="exampleInputEmail1">Proyecto</label>

    <select class="form-control" name="project_id" required>
      <option value="">-- SELECCIONE --</option>
      <?php foreach(ProjectData::getAll() as $a):?>
      <option value="<?php echo $a->id; ?>"><?php echo $a->name; ?></option>
    <?php endforeach; ?>
    </select>

  </div>
  </div>

  <div class="col-md-3">
  <div class="form-group">
    <label for="exampleInputEmail1">Contacto</label>

    <select class="form-control" name="person_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(ContactData::getAll() as $a):?>
    	<option value="<?php echo $a->id; ?>"><?php echo $a->name." ".$a->lastname; ?></option>
    <?php endforeach; ?>
    </select>

  </div>
  </div>
    <div class="col-md-3">
  <div class="form-group">
    <label for="exampleInputEmail1">Categoria</label>
    <select class="form-control" name="category_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(TaxData::getCategories() as $a):?>
    	<option value="<?php echo $a->id; ?>"><?php echo $a->name; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  </div>

    <div class="col-md-3">
  <div class="form-group">
    <label for="exampleInputEmail1">Metodo de Pago</label>
    <select class="form-control" name="paymethod_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(TaxData::getPMs() as $a):?>
    	<option value="<?php echo $a->id; ?>"><?php echo $a->name; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  </div>
  </div>
  

  <div class="row">
  <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Fecha (yyyy-mm-dd)</label>
    <input type="date" name="date_at" required class="form-control"  >
  </div>
  </div>
    <div class="col-md-8">
  <div class="form-group">
    <label for="exampleInputEmail1">Concepto</label>
    <input type="text" name="concept" required class="form-control"  placeholder="Concepto">
  </div>
  </div>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Descripcion</label>
    <textarea class="form-control" name="description" placeholder="Descripcion"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Monto</label>
<div class="input-group">
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control"  placeholder="Monto $" name="amount">
</div>
  </div>
  <button type="submit" class="btn btn-primary">Agregar Deposito</button>
</form>
</div>
</div>

</div>
</div>
</div>

<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="newspend"):?>
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Nuevo Gasto</h1>
<div class="row">
<div class="col-md-8">
<form method="post" action="./?action=operations&opt=add">
<input type="hidden" name="kind" value="2">

  <div class="form-group">
    <label for="exampleInputEmail1">Cuenta</label>
    <select class="form-control" name="account_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(AccountData::getAll() as $a):?>
    	<option value="<?php echo $a->id; ?>"><?php echo $a->name; ?></option>
    <?php endforeach; ?>
    </select>
  </div>

<div class="row">
  <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Contacto</label>

    <select class="form-control" name="person_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(ContactData::getAll() as $a):?>
    	<option value="<?php echo $a->id; ?>"><?php echo $a->name." ".$a->lastname; ?></option>
    <?php endforeach; ?>
    </select>

  </div>
  </div>
    <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Categoria</label>
    <select class="form-control" name="category_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(TaxData::getCategories() as $a):?>
    	<option value="<?php echo $a->id; ?>"><?php echo $a->name; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  </div>

    <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Metodo de Pago</label>
    <select class="form-control" name="paymethod_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(TaxData::getPMs() as $a):?>
    	<option value="<?php echo $a->id; ?>"><?php echo $a->name; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  </div>
  </div>
  

  <div class="row">
  <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Fecha (yyyy-mm-dd)</label>
    <input type="date" name="date_at" required class="form-control"  >
  </div>
  </div>
    <div class="col-md-8">
  <div class="form-group">
    <label for="exampleInputEmail1">Concepto</label>
    <input type="text" name="concept" required class="form-control"  placeholder="Concepto">
  </div>
  </div>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Descripcion</label>
    <textarea class="form-control" name="description" placeholder="Descripcion"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Monto</label>
<div class="input-group">
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control"  placeholder="Monto $" name="amount">
</div>
  </div>
  <button type="submit" class="btn btn-primary">Agregar Gasto</button>
</form>
</div>
</div>

</div>
</div>
</div>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="edit"):
$x = OperationData::getById($_GET["id"]);
?>
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Editar Operacion</h1>
<div class="row">
<div class="col-md-8">
<form method="post" action="./?action=operations&opt=update">


  <div class="form-group">
    <label for="exampleInputEmail1">Cuenta</label>
    <select class="form-control" name="account_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(AccountData::getAll() as $a):?>
    	<option value="<?php echo $a->id; ?>" <?php if($x->account_id==$a->id){ echo "selected"; }?>><?php echo $a->name; ?></option>
    <?php endforeach; ?>
    </select>
  </div>

<div class="row">
  <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Contacto</label>

    <select class="form-control" name="person_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(ContactData::getAll() as $a):?>
    	<option value="<?php echo $a->id; ?>" <?php if($x->person_id==$a->id){ echo "selected"; }?>><?php echo $a->name." ".$a->lastname; ?></option>
    <?php endforeach; ?>
    </select>

  </div>
  </div>
    <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Categoria</label>
    <select class="form-control" name="category_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(TaxData::getCategories() as $a):?>
    	<option value="<?php echo $a->id; ?>" <?php if($x->category_id==$a->id){ echo "selected"; }?>><?php echo $a->name; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  </div>

    <div class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Metodo de Pago</label>
    <select class="form-control" name="paymethod_id" required>
    	<option value="">-- SELECCIONE --</option>
    	<?php foreach(TaxData::getPMs() as $a):?>
    	<option value="<?php echo $a->id; ?>" <?php if($x->paymethod_id==$a->id){ echo "selected"; }?>><?php echo $a->name; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  </div>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Fecha (yyyy-mm-dd)</label>
    <input type="date" name="date_at" value="<?php echo $x->date_at;?>" required class="form-control"  >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Concepto</label>
    <input type="text" name="concept" required  value="<?php echo $x->concept;?>"  class="form-control"  placeholder="Concepto">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descripcion</label>
    <textarea class="form-control" name="description" placeholder="Descripcion"><?php echo $x->description;?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Monto</label>
<div class="input-group">
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control" value="<?php echo $x->amount;?>"  placeholder="Monto $" name="amount">
</div>
  </div>
  <input type="hidden" name="id" value="<?php echo $x->id; ?>">
  <button type="submit" class="btn btn-success">Actualizar Operacion</button>
</form>
</div>
</div>

</div>
</div>
</div>

<?php endif;?>




