<?php

?>
<div class="row">
	<div class="col-md-12">
<h1>Licencias</h1>


		<?php
		$sql = "select * from license where user_id=$_SESSION[user_id] and is_active";

		$users = LicenseData::getBySQL($sql);

		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
				<th></th>
			<th>Fecha</th>
			<th>Usuario/Cliente</th>
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
				$category = null;
				if($user->user_id!=null){
				$category = $user->getUser();
				}
				?>
				<tr>
					<th>
						<a href="./?view=releases&project_id=<?php echo $project->id; ?>" class="btn btn-default btn-xs"><i class='fa fa-folder'></i> Abrir</a>
					</th>
				<td><?php echo $user->date_at; ?></td>
				<td><?php if($category!=null){ echo $category->name." ".$category->lastname; }?></td>
				<td><?php if($project!=null ){ echo $project->name;} ?></td>
				<td><?php echo $user->created_at; ?></td>
				<td style="width:130px;">

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