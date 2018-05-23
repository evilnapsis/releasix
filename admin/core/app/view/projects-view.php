<div class="row">
	<div class="col-md-12">
		<h1>Proyectos</h1>
	<a href="index.php?view=newproject" class="btn btn-default"><i class='fa fa-th-list'></i> Nuevo Proyecto</a>
<br>
<br>
		<?php

		$users = ProjectData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<h3>Total: <?php echo count($users); ?></h3>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Inicio</th>
			<th>Fin</th>
			<th>Status</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
				<td><?php echo $user->start_at; ?></td>
				<td><?php echo $user->finish_at; ?></td>
				<td>
					<?php echo StatusData::getById($user->status_id)->name;?>
				</td>
				<td style="width:190px;"> <a href="index.php?view=editproject&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a> 


				<?php if(Core::$user->kind==1):?>
				<a href="javascript:void" id="btn-<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				<script type="text/javascript">
				$("#btn-<?php echo $user->id;?>").click(function(){
					x<?php echo $user->id; ?> = confirm("Estas seguro que deseas eliminar ?");
					if(x<?php echo $user->id; ?>){
						window.location = "index.php?view=delproject&id=<?php echo $user->id; ?>";
					}

				});
				</script>
			<?php endif; ?>				

				</tr>
				<?php
			}?>
			</table>
			</div>
			<?php



		}else{
			echo "<p class='alert alert-danger'>No hay Proyectos</p>";
		}


		?>


	</div>
</div>