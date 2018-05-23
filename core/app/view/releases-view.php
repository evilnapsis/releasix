<?php
$up  =LicenseData::getByUP($_SESSION["user_id"],$_GET["project_id"]);
if(!$up){
	Core::alert("No tienes acceso!");
	Core::redir("./?view=licenses");
}
?>
<div class="row">
	<div class="col-md-12">
<h1>Releases</h1>
<br><br>


		<?php
		$sql = "select * from rel where project_id = $_GET[project_id]";

		$users = RelData::getBySQL($sql);


		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Fecha</th>
			<th>Version</th>
			<th>Descripcion</th>
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
				<td>
					<p><span class="badge">
										<?php if($project!=null ){ echo $project->name;} ?>
									</span>
								</p>

					<h3><?php echo $user->title; ?></h3>
<p><?php echo nl2br($user->changelog); ?></p>
<p>Descargar: <a href="<?php echo $user->downloadlink; ?>" target="_blank"><?php echo $user->downloadlink; ?></a></p>
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