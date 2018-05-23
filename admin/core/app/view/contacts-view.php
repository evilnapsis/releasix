<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=newcontact" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Contacto</a>
<!--<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/medicss-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div> -->
</div>
		<h1>Contactos</h1>
<br>
		<?php

		$users = ContactData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<h3>Total: <?php echo count($users); ?></h3>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Direccion</th>
			<th>Email</th>
			<th>Telefono</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->address; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->phone; ?></td>
				<td style="width:130px;">
				<a href="index.php?view=editcontact&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<?php if(Core::$user->is_admin):?>
				<a href="javascript:void" id="btn-<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				<script type="text/javascript">
				$("#btn-<?php echo $user->id;?>").click(function(){
					x<?php echo $user->id; ?> = confirm("Estas seguro que deseas eliminar ?");
					if(x<?php echo $user->id; ?>){
						window.location = "index.php?view=delcontact&id=<?php echo $user->id; ?>";
					}

				});
				</script>
			<?php endif; ?>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			<?php
		}else{
			echo "<p class='alert alert-danger'>No hay Contactos</p>";
		}


		?>


	</div>
</div>