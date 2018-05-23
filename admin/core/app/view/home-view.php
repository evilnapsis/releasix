
<div class="row">
<div class="col-md-12">
<h1>Dashboard</h1>

</div>
</div>


<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">


<div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count(LicenseData::getAll()); ?></h3>

              <p>Licencia</p>
            </div>
            <div class="icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <a href="./?view=licenses" class="small-box-footer">Ver todo <i class="fa fa-arrow-circle-right"></i></a>
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


        <!-- /.col -->
      </div>
      <!-- /.row -->


