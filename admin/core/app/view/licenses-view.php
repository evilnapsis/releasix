<div class="row">
	<div class="col-md-12">
<h1>Licencias</h1>
<a href="./?view=newlicense" class="btn btn-default">Nueva Licencia</a>
<br><br>
<form class="form-horizontal" role="form">
<input type="hidden" name="view" value="licenses">
        <?php
$pacients = ProjectData::getAll();
        ?>

  <div class="form-group">

    <div class="col-lg-3">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-flask"></i></span>
<select name="project_id" class="form-control">
<option value="">PROYECTO</option>
  <?php foreach($pacients as $p):?>
    <option value="<?php echo $p->id; ?>" <?php if(isset($_GET["project_id"]) && $_GET["project_id"]==$p->id){ echo "selected"; } ?>><?php echo $p->name; ?></option>
  <?php endforeach; ?>
</select>
		</div>
    </div>

    <div class="col-lg-3">
    <button class="btn btn-primary btn-block">Buscar</button>
    </div>

  </div>
</form>

		<?php
$users= array();
if(isset($_GET["project_id"])   && ($_GET["project_id"]!="" ) ) {
$sql = "select * from license where ";


if($_GET["project_id"]!=""){

	$sql .= " project_id = ".$_GET["project_id"];
}

		$users = LicenseData::getBySQL($sql);

}else{
		$users = LicenseData::getAll();

}
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Fecha</th>
			<th>Usuario/Cliente</th>
			<th>Email</th>
			<th>Proyecto</th>
			<th>Creacion</th>
			<th>Activo</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				$project = null;
				if($user->project_id!=null){
				$project  = $user->getProject();
				}
				$category = null;
				if($user->user_id!=null){
				$category = $user->getUser();
				}
				?>
				<tr>
				<td><?php echo $user->date_at; ?></td>
				<td><?php if($category!=null){ echo $category->name." ".$category->lastname; }?></td>
				<td><?php echo $category->email; ?></td>
				<td><?php if($project!=null ){ echo $project->name;} ?></td>
				
				<td><?php echo $user->created_at; ?></td>
<td>
	<?php if($user->is_active):?>
		<i class="fa fa-check">
		<?php endif; ?>
</td>
				<td style="width:230px;">
<a href="./?action=licenseswitchactive&id=<?php echo $user->id; ?>" class="btn btn-success btn-xs">Activar/Desactivar</a>
				<?php if(Core::$user->kind==1):?>
				<a href="javascript:void" id="btn-<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				<script type="text/javascript">
				$("#btn-<?php echo $user->id;?>").click(function(){
					x<?php echo $user->id; ?> = confirm("Estas seguro que deseas eliminar ?");
					if(x<?php echo $user->id; ?>){
						window.location = "index.php?action=dellicense&id=<?php echo $user->id; ?>";
					}

				});
				</script>
			<?php endif; ?>
				</td>
				</tr>
				<?php

			}?>
			</table>
			</div>
			<?php
		}else{
			echo "<p class='alert alert-danger'>No hay Licencias</p>";
		}


		?>


	</div>
</div>