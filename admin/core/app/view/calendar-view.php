<?php

$events = EventData::getEvery();
$thejson = array();
foreach($events as $event){

	$thejson[] = array("title"=>$event->title,"url"=>"./?view=editreservation&id=".$event->id,"start"=>$event->date_at."T".$event->time_at);

}
// print_r(json_encode($thejson));
  $dateB = new DateTime(date('Y-m-d')); 
  $dateA = $dateB->sub(DateInterval::createFromDateString('30 days'));
  $sd= strtotime(date_format($dateA,"Y-m-d"));
  $ed = strtotime(date("Y-m-d"));
  //
  $sd= strtotime(date_format($dateB,"Y-m-01"));
  $ed = strtotime(date_format($dateB,"Y-m-30"));
//  echo "Fecha Inicial: ".date_format($dateB,"Y-m-01")." Fecha Final: ".date_format($dateB,"Y-m-30");

  $ntot = 0;
  $nsells = 0;
for($i=$sd;$i<=$ed;$i+=(60*60*24)){
  $operations = OperationData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),1);
  $res = OperationData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),2);
  $sr = $res[0]->tot!=null?$res[0]->tot:0;
  $sl = $operations[0]->tot!=null?$operations[0]->tot:0;
  $ntot+=($sl-($sr));
  $nsells += $operations[0]->c;
}
?>
<script>


	$(document).ready(function() {

		$('#calendar').fullCalendar({
      lang:"es",
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
//			defaultDate: '2015-08-12',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo json_encode($thejson); ?>
		});
		
	});

</script>
<div class="row">
<div class="col-md-12">
<h1>Dashboard</h1>

</div>
</div>


<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">


<div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count(TaskData::getPendings()); ?></h3>

              <p>Tareas Pendientes</p>
            </div>
            <div class="icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <a href="./?view=tasks" class="small-box-footer">Ver todo <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
<div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count(ProjectData::getAll()); ?></h3>

              <p>Proyectos</p>
            </div>
            <div class="icon">
              <i class="fa fa-flask"></i>
            </div>
            <a href="./?view=projects" class="small-box-footer">Ver todo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
<div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo count(EventData::getAll()); ?></h3>

              <p>Proximos Eventos</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="./?view=reservations" class="small-box-footer">Ver todo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">

<div class="small-box bg-yellow">
            <div class="inner">
              <h3>$ <?php echo number_format($ntot,2,".",",");?></h3>

              <p>Balance del Mes</p>
            </div>
            <div class="icon">
              <i class="fa fa-area-chart"></i>
            </div>
            <a href="./?view=operations&opt=all" class="small-box-footer">Ver todo <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<div class="row">
<div class="col-md-4">
<?php
$tasks = TaskData::getPendingsL(10);
if(count($tasks)>0){
			?>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th></th>
			<th>Titulo</th>
			<th>Proyecto</th>
			</thead>
			<?php
			foreach($tasks as $user){
				$project = null;
				if($user->project_id!=null){
				$project  = $user->getProject();
				}
				?>
				<tr>
				<td style="width:30px">
					<form id="frm-<?php echo $user->id; ?>">
						<input type="checkbox" name="is_done" <?php if($user->is_done){ echo "checked"; }?> id="check-<?php echo $user->id; ?>">
						<input type="hidden" name="task_id" value="<?php echo $user->id; ?>">
					</form>
					<script type="text/javascript">
					$("#check-<?php echo $user->id; ?>").click(function(){
						$.get("./?action=dotask",$("#frm-<?php echo $user->id; ?>").serialize(),function(data){
						});
					});
					</script>
				</td>
				<td><?php echo $user->title; ?></td>
				<td><?php if($project!=null ){ echo $project->name;} ?></td>
				</tr>
				<?php
			}?>
			</table>
			</div>
			<?php
		}else{
			echo "<p class='alert alert-danger'>No hay Tareas</p>";
		}
		?>


</div>
<div class="col-md-4">
<?php
$tasks = NoteData::getAllL(5);
if(count($tasks)>0){
			?>
			<div class="box box-primary">
			<table class="table table-bordered table-hover">
			<thead>
			<th>Titulo</th>
			<th>Proyecto</th>
			</thead>
			<?php
			foreach($tasks as $user){
				$project = null;
				if($user->project_id!=null){
				$project  = $user->getProject();
				}
				?>
				<tr>
				<td><?php echo $user->title; ?></td>
				<td><?php if($project!=null ){ echo $project->name;} ?></td>
				</tr>
				<?php
			}?>
			</table>
			</div>
			<?php
		}else{
			echo "<p class='alert alert-danger'>No hay Tareas</p>";
		}
		?>
</div>

<div class="col-md-4">
<div class="box box-primary">
<div class="box-body">
<div id="calendar"></div>
</div>
</div>
</div>
</div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Balance de los ultimos 30 dias</strong>
                  </p>









<?php 
  $dateB = new DateTime(date('Y-m-d')); 
  $dateA = $dateB->sub(DateInterval::createFromDateString('30 days'));
  $sd= strtotime(date_format($dateA,"Y-m-d"));
  $ed = strtotime(date("Y-m-d"));

?>
<div id="graph" class="animate" data-animate="fadeInUp" ></div>
<script>

<?php 
echo "var c=0;";
echo "var dates=Array();";
echo "var data=Array();";
echo "var total=Array();";
for($i=$sd;$i<=$ed;$i+=(60*60*24)){
  $operations = OperationData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),1);
  $res = OperationData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),2);
//  echo $operations[0]->t;
  $sr = $res[0]->tot!=null?$res[0]->tot:0;
  $sl = $operations[0]->tot!=null?$operations[0]->tot:0;
  echo "dates[c]=\"".date("Y-m-d",$i)."\";";
  echo "data[c]=".($sl-($sr)).";";
  echo "total[c]={x: dates[c],y: data[c]};";
  echo "c++;";
}
?>
// Use Morris.Area instead of Morris.Line
Morris.Area({
  element: 'graph',
  data: total,
  xkey: 'x',
  ykeys: ['y',],
  labels: ['Y']
}).on('click', function(i, row){
  console.log(i, row);
});
</script>














                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- 
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">Ventas de hoy</span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">Ventas ayer</span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">Ventas del mes</span>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">Ventas totales</span>
                  </div>
                </div>
              </div>
            </div>
            -->

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->