<div class="row">
	<div class="col-md-12">
<h1>Releases</h1>
<a href="./?view=newrelease" class="btn btn-default">Nuevo Release</a>
<br><br>
<form class="form-horizontal" role="form">
<input type="hidden" name="view" value="releases">
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
$sql = "select * from rel where ";


if($_GET["project_id"]!=""){

	$sql .= " project_id = ".$_GET["project_id"];
}
		$users = RelData::getBySQL($sql);

}else{
		$users = RelData::getAll();

}
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Fecha</th>
			<th>Version</th>
			<th>Titulo</th>
			<th>Proyecto</th>
			<th>Creacion</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				$project = null;
				if($user->project_id!=null){
				$project  = $user->getProject();
				}
				?>
				<tr>
				<td><?php echo $user->date_at; ?></td>
				<td><?php echo $user->tag; ?></td>
				<td><?php echo $user->title; ?></td>
				<td><?php if($project!=null ){ echo $project->name;} ?></td>
				<td><?php echo $user->created_at; ?></td>
				<td style="width:130px;">
				<a href="./?view=editrelease&id=<?php echo $user->id; ?>" class="btn btn-warning btn-xs">Editar</a>

				<?php if(Core::$user->kind==1):?>
				<a href="javascript:void" id="btn-<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				<script type="text/javascript">
				$("#btn-<?php echo $user->id;?>").click(function(){
					x<?php echo $user->id; ?> = confirm("Estas seguro que deseas eliminar ?");
					if(x<?php echo $user->id; ?>){
						window.location = "index.php?action=delrelease&id=<?php echo $user->id; ?>";
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
			echo "<p class='alert alert-danger'>No hay Releases</p>";
		}


		?>


	</div>
</div>