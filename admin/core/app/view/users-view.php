<?php

if(!Core::$user->kind==1){
	Core::redir("./?view=home");
}
?>
<div class="row">
	<div class="col-md-12">
		<h1>Lista de Usuarios</h1>
	<a href="index.php?view=newuser" class="btn btn-default"><i class='glyphicon glyphicon-user'></i> Nuevo Usuario</a>
<br>
<br>
		<?php
		/*
		$u = new UserData();
		print_r($u);
		$u->name = "Agustin";
		$u->lastname = "Ramos";
		$u->email = "evilnapsis@gmail.com";
		$u->password = sha1(md5("l00lapal00za"));
		$u->add();


		$f = $u->createForm();
		print_r($f);
		echo $f->label("name")." ".$f->render("name");
		*/
		?>
		<?php

		$users = UserData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Email</th>
			<th>Nickname</th>
			<th>Activo</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->username; ?></td>
				<td>
					<?php if($user->is_active):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td style="width:130px;">
				<a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>

				<a href="javascript:void" id="btn-<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				<script type="text/javascript">
				$("#btn-<?php echo $user->id;?>").click(function(){
					x<?php echo $user->id; ?> = confirm("Estas seguro que deseas eliminar ?");
					if(x<?php echo $user->id; ?>){
						window.location = "index.php?action=deluser&id=<?php echo $user->id; ?>";
					}

				});
				</script>

				</td>
				</tr>
				<?php

			}
			?>
			</table></div>
			<?php



		}else{
			// no hay usuarios
		}


		?>

	</div>
</div>