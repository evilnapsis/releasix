<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Proyecto</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproject" action="index.php?view=addproject" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-8">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Inicio*</label>
    <div class="col-md-3">
      <input type="date" name="start_at" required class="form-control" id="start_at" placeholder="Inicio">
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Fin*</label>
    <div class="col-md-3">
      <input type="date" name="finish_at" required class="form-control" id="start_at" placeholder="Fin">
    </div>
  </div>



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Status</label>
    <div class="col-lg-3">
<select name="status_id" required class="form-control">
  <?php foreach(StatusData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-lg-3">
<select name="kind" class="form-control">
    <option value="2">Privado</option>
    <option value="1">Publico</option>
</select>
    </div>
  </div>



  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Proyecto</button>
    </div>
  </div>
</form>
	</div>
</div>