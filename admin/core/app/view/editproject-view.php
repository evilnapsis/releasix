<?php $user = ProjectData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Proyecto</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateproject" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-8">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Inicio*</label>
    <div class="col-md-3">
      <input type="date" name="start_at" value="<?php echo $user->start_at; ?>" required class="form-control" id="start_at" placeholder="Inicio">
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Fin*</label>
    <div class="col-md-3">
      <input type="date" name="finish_at" value="<?php echo $user->finish_at; ?>" required class="form-control" id="start_at" placeholder="Fin">
    </div>
  </div>



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Status</label>
    <div class="col-lg-3">
<select name="status_id" required class="form-control">
  <?php foreach(StatusData::getAll() as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if($p->id==$user->status_id){ echo "selected"; }?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
    </div>
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
    <div class="col-lg-3">
<select name="kind" class="form-control">
    <option value="2" <?php if(2==$user->kind){ echo "selected"; }?>>Privado</option>
    <option value="1" <?php if(1==$user->kind){ echo "selected"; }?>>Publico</option>
</select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
    </div>
  </div>
</form>
	</div>
</div>