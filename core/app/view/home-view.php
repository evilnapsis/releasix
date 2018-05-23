
<div class="row">
<div class="col-md-12">
<h1>Bienvenido a Releasix</h1>

</div>
</div>


<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">


<div class="small-box bg-green">
            <div class="inner">
              <h3><?php 
    $sql = "select * from license where user_id=$_SESSION[user_id]";

 
              echo count(LicenseData::getBySQL($sql)); ?></h3>

              <p>Licencias</p>
            </div>
            <div class="icon">
              <i class="fa fa-clock-o"></i>
            </div>
            <a href="./?view=licenses" class="small-box-footer">Ver todo <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <!-- /.col -->

        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>


        <!-- /.col -->
      </div>
      <!-- /.row -->


