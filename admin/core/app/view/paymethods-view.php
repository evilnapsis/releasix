<?php if(isset($_GET["opt"])  && $_GET["opt"]=="all"):?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Metodo de Pagos
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">

<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
	<a href="index.php?view=paymethods&opt=new" class="btn btn-default"><i class='fa fa-th-list'></i> Nuevo Metodo de Pago</a>
</div>
<div class="clearfix"></div>
<br>
		<?php

		$users = TaxData::getPMs();
		if(count($users)>0){
			// si hay usuarios
			?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Metodo de Pagos</h3>

  </div><!-- /.box-header -->
  <div class="box-body">

			<table class="table table-bordered datatable table-hover">
			<thead>
			<th></th>
			<th>Nombre</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td style="width:30px;"> 
				</td>
				<td><?php echo $user->name; ?></td>
				<td style="width:130px;"><a href="index.php?view=paymethods&opt=edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a> 


        <?php if(Core::$user->is_admin):?>
        <a href="javascript:void" id="btn-<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
        <script type="text/javascript">
        $("#btn-<?php echo $user->id;?>").click(function(){
          x<?php echo $user->id; ?> = confirm("Estas seguro que deseas eliminar ?");
          if(x<?php echo $user->id; ?>){
            window.location = "index.php?action=paymethods&opt=del&id=<?php echo $user->id; ?>";
          }

        });
        </script>
      <?php endif; ?>

				</tr>
				<?php

			}

?>
			</table>
  </div><!-- /.box-body -->
</div><!-- /.box -->
			
			<?php


		}else{
			echo "<p class='alert alert-danger'>No hay Metodo de Pagos</p>";
		}


		?>


	</div>
</div>
        </section><!-- /.content -->
<?php elseif(isset($_GET["opt"])  && $_GET["opt"]=="new"):?>
<section class="content">
<div class="row">
	<div class="col-md-12">
	<h1>Nueva Metodo de Pago</h1>
	<br>
  <div class="box box-primary">
  <table class="table">
  <tr><td>
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?action=paymethods&opt=add" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Metodo de Pago</button>
    </div>
  </div>
</form>
</td>
</tr>
</table>
</div>
	</div>
</div>
</section>

<?php elseif(isset($_GET["opt"])  && $_GET["opt"]=="edit"):?>

<section class="content">
<?php $user = TaxData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
	<h1>Editar Metodo de Pago</h1>
	<br>
  <div class="box box-primary">
  <table class="table">
  <tr><td>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=paymethods&opt=upd" role="form">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Metodo de Pago</button>
    </div>
  </div>
</form>
</td>
</tr>
</table>
</div>
	</div>
</div>
</section>
<?php endif; ?>