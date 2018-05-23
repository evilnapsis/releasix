<?php
$products = AccountData::getAll();
$stocks = TaxData::getCategories();
$operations = OperationData::getAll();
if(count($operations)>0){ echo "SON: ".count($operations);}
?>
<section class="content">
<div class="row">
	<div class="col-md-12">
		<h1>Reporte de Operaciones</h1>
		<form>
			<input type="hidden" name="view" value="reports">
			<div class="row">
				<div class="col-md-2">
				<select name="account_id" required class="form-control">
					<option value="">-- CUENTAS --</option>
					<?php foreach($products as $p):?>
						<option value="<?php echo $p->id;?>" <?php if(isset($_GET["account_id"]) && $_GET["account_id"]==$p->id){ echo "selected"; }?>><?php echo $p->name;?></option>
					<?php endforeach; ?>
				</select>
				</div>
				<div class="col-md-3">
				<select name="category_id" class="form-control">
					<option value="">--  CATEGORIAS --</option>
					<?php foreach($stocks as $p):?>
						<option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>
					<?php endforeach; ?>
				</select>
				</div>
				<div class="col-md-3">
					<input type="date" name="sd" value="<?php if(isset($_GET["sd"])){ echo $_GET["sd"]; }?>" class="form-control">
				</div>
				<div class="col-md-3">
					<input type="date" name="ed" value="<?php if(isset($_GET["ed"])){ echo $_GET["ed"]; }?>" class="form-control">
				</div>
				<div class="col-md-1">
					<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-file-text"></i>Bus </button>
				</div>
			</div>
		</form>
	</div>
</div>
<br><!--- -->
<div class="row">
	<div class="col-md-12">
		<?php if(isset($_GET["sd"]) && isset($_GET["ed"]) ):?>
			<?php if($_GET["sd"]!=""&&$_GET["ed"]!=""):?>
				<?php 
				$operations = array();
				if($_GET["category_id"]==""){
					$operations = OperationData::getReportByA($_GET["account_id"],$_GET["sd"],$_GET["ed"]);
				}
				else{
					$operations = OperationData::getReportByAC($_GET["account_id"],$_GET["category_id"],$_GET["sd"],$_GET["ed"]);
				} 
				?>
				<?php if(count($operations)>0):?>
					<a onclick="thePDF()" id="makepdf" class="btn btn-default" class="">PDF (.pdf)</a>
					<br><br>
					<div class="box box-primary">
					<div class="box-body">
					<table class="table table-bordered table-hover datatable ">
						<thead>
							<th>Id</th>
							<th>Concepto</th>		
							<th>Descripcion</th>		
							<th>Monto</th>		
						  	<th>Tipo</th>    
							<th>Fecha</th>
						</thead>
						<?php foreach($operations as $op):?>
							<tr>
							<td><?php echo $op->id;?></td>
							<td><?php echo $op->concept;?></td>		
							<td><?php echo $op->description;?></td>		
							<td>$ <?php echo $op->amount;?></td>		
						  	<td><?php if($op->kind==1){echo "Entrada";}else{ echo "Salida"; }?></td>    
							<td><?php echo $op->date_at;?></td>		
							</tr>
						<?php endforeach;?>
					</table>
					<?php
					$total=0;
					foreach($operations as $op){
						if($op->kind==1){ $total+=$op->amount; }
						else 
							if($op->kind==2){ $total-=$op->amount; }
					}
					echo "<h1>Balance = $ $total</h1>";
					?>
					</div>
					</div>
<!--
Aqui iba el javascript
-->
				<?php else:
				// si no hay operaciones
				?>
					<script>
						$("#wellcome").hide();
					</script>
					<div class="jumbotron">
						<h2>No hay operaciones</h2>
						<p>El rango de fechas seleccionado no proporciono ningun resultado de operaciones.</p>
					</div>
				<?php endif; ?>
			<?php else:?>
				<script>
					$("#wellcome").hide();
				</script>
				<div class="jumbotron">
					<h2>Fecha Incorrectas</h2>
					<p>Puede ser que no selecciono un rango de fechas, o el rango seleccionado es incorrecto.</p>
				</div>
			<?php endif;?>
		<?php endif; ?>


<?php if(count($operations)>0){?>
	<a onclick="thePDF()" id="makepdf" class="btn btn-default" class="">PDF (.pdf)</a>
	<br><br>
	<div class="box box-primary">
	<div class="box-body">
	<table class="table table-bordered table-hover datatable ">
		<thead>
			<th>Id</th>
			<th>Concepto</th>		
			<th>Descripcion</th>		
			<th>Monto</th>		
		  	<th>Tipo</th>    
			<th>Fecha</th>
		</thead>
		<?php foreach($operations as $op):?>
			<tr>
			<td><?php echo $op->id;?></td>
			<td><?php echo $op->concept;?></td>		
			<td><?php echo $op->description;?></td>		
			<td>$ <?php echo $op->amount;?></td>		
		  	<td><?php if($op->kind==1){echo "Entrada";}else{ echo "Salida"; }?></td>    
			<td><?php echo $op->date_at;?></td>		
			</tr>
		<?php endforeach;?>
	</table>
	<?php
	$total=0;
	foreach($operations as $op){
		if($op->kind==1){ $total+=$op->amount; }
		else 
			if($op->kind==2){ $total-=$op->amount; }
	}
	echo "<h1>Balance = $ $total</h1>";
}?>



	</div>
</div>

<br><br><br><br>
</section>

<script type="text/javascript">
        function thePDF() {
var doc = new jsPDF('p', 'pt');
        doc.setFontSize(26);
        doc.text("<?php echo ConfigurationData::getByPreffix("company_name")->val;?>", 40, 65);
        doc.setFontSize(15);
        doc.text("REPORTE DE OPERACIONES", 40, 85);
        doc.setFontSize(10);
        doc.text("Usuario: <?php echo Core::$user->name." ".Core::$user->lastname; ?>  -  Fecha: <?php echo date("d-m-Y h:i:s");?> ", 40, 100);
var columns = [
    {title: "Id", dataKey: "id"}, 
    {title: "Concepto", dataKey: "concept"}, 
    {title: "Monto", dataKey: "q"}, 
    {title: "Tipo de operacion", dataKey: "operation_type"}, 
    {title: "Cuenta", dataKey: "cuenta"}, 
    {title: "Fecha", dataKey: "date_at"}, 
];
var rows = [
  <?php foreach($operations as $product):
  ?>
    {
      "id": "<?php echo $product->id; ?>",
      "concept": "<?php echo $product->concept; ?>",
      "q": "<?php echo $product->amount; ?>",
      "operation_type": "<?php if($product->kind==1){echo "Entrada";}else{ echo "Salida"; }?>",
      "cuenta": "<?php echo $product->getAccount()->name; ?>",
      "date_at": "<?php echo $product->date_at; ?>",
      },
 <?php endforeach; ?>
];
doc.autoTable(columns, rows, {
    theme: 'grid',
    overflow:'linebreak',
    styles: { 
        fillColor: <?php echo Core::$pdf_table_fillcolor;?>
    },
    columnStyles: {
        id: {fillColor: <?php echo Core::$pdf_table_column_fillcolor;?>}
    },
    margin: {top: 110},
    afterPageContent: function(data) {
    }
});
doc.setFontSize(12);
doc.text("<?php echo Core::$pdf_footer;?>", 40, doc.autoTableEndPosY()+25);
<?php 
$con = ConfigurationData::getByPreffix("report_image");
if($con!=null && $con->val!=""):
?>
var img = new Image();
img.src= "storage/configuration/<?php echo $con->val;?>";
img.onload = function(){
doc.addImage(img, 'JPG', 495, 20, 60, 60,'mon');	
doc.save('operations-<?php echo date("d-m-Y h:i:s",time()); ?>.pdf');
}
<?php else:?>
doc.save('operations-<?php echo date("d-m-Y h:i:s",time()); ?>.pdf');
<?php endif; ?>
}
</script>