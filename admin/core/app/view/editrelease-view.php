<?php
$rel = RelData::getById($_GET["id"]);
$pacients = ProjectData::getAll();
$medics = UserData::getClients();
?>

<div class="row">
<div class="col-md-10">
<h1>Editar Release</h1>
<form class="form-horizontal" role="form" method="post" action="./?action=updrelease">
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha</label>
    <div class="col-lg-6">
      <input type="date" name="date_at"  value="<?php echo $rel->date_at; ?>" required class="form-control" id="inputEmail1" placeholder="Fecha">
    </div>
  </div>




  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Proyecto</label>
    <div class="col-lg-6">
<select name="project_id" class="form-control">
<option value="">-- SELECCIONE --</option>
  <?php foreach($pacients as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$rel->project_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Version</label>
    <div class="col-lg-6">
      <input type="text" name="tag" value="<?php echo $rel->tag; ?>" required class="form-control" id="inputEmail1" placeholder="Version">
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-6">
      <input type="text" name="title"  value="<?php echo $rel->title; ?>" required class="form-control" id="inputEmail1" placeholder="Titulo">
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Lista de cambios</label>
    <div class="col-lg-6">
      <textarea name="changelog" class="form-control" required placeholder="Lista de cambios"><?php echo $rel->changelog; ?></textarea>
    </div>
  </div>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Link de descarga</label>
    <div class="col-lg-6">
      <input type="text" name="downloadlink"  value="<?php echo $rel->downloadlink; ?>" required class="form-control" id="inputEmail1" placeholder="Link de descarga">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Esta activo</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" <?php if($rel->is_active){ echo "checked"; }?>> 
    </label>
  </div>
    </div>
  </div>
<input type="hidden" name="id" value="<?php echo $rel->id; ?>">
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-success">Actualizar Release</button>
    </div>
  </div>
</form>

</div>
</div>