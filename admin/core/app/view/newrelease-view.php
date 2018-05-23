<?php
$pacients = ProjectData::getAll();
$medics = UserData::getClients();
?>

<div class="row">
<div class="col-md-10">
<h1>Nuevo Release</h1>
<form class="form-horizontal" role="form" method="post" action="./?action=addrelease">
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha</label>
    <div class="col-lg-6">
      <input type="date" name="date_at" value="<?php echo date('Y-m-d');?>" required class="form-control" id="inputEmail1" placeholder="Fecha">
    </div>
  </div>




  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Proyecto</label>
    <div class="col-lg-6">
<select name="project_id" class="form-control">
<option value="">-- SELECCIONE --</option>
  <?php foreach($pacients as $p):?>
    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Version</label>
    <div class="col-lg-6">
      <input type="text" name="tag" value="" required class="form-control" id="inputEmail1" placeholder="Version">
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-6">
      <input type="text" name="title" value="" required class="form-control" id="inputEmail1" placeholder="Titulo">
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Lista de cambios</label>
    <div class="col-lg-6">
      <textarea name="changelog" class="form-control" required placeholder="Lista de cambios"></textarea>
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Link de descarga</label>
    <div class="col-lg-6">
      <input type="text" name="downloadlink" value="" required class="form-control" id="inputEmail1" placeholder="Link de descarga">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" > 
    </label>
  </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Agregar Release</button>
    </div>
  </div>
</form>

</div>
</div>