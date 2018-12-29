<!doctype html>
<html lang="en">
<head>
  <title><?= $page_name?> - Pusdiklat BSSN</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/material-icon.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-tagsinput.css">
  <!-- fontawesome min -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert/sweetalert2.min.css">
  <!-- Material Dashboard CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/material-dashboard.css?v=2.1.0">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-standalone-datepicker.css">

</head>
<body>
  <div class="content">
    <div class="row" style="margin:2em">
      <div class="col-md-3 col-xs-3">
        <div class="row">
          <div class="col-md-3">
            <img src="<?php echo site_url('assets/img/'.$profil->logo1) ?>" alt="" width="100%">
          </div>
          <div class="col-md-3">
            <img src="<?php echo site_url('assets/img/'.$profil->logo2) ?>" alt="" width="100%">

          </div>
          <div class="col-md-3">
            <img src="<?php echo site_url('assets/img/'.$profil->logo3) ?>" alt="" width="100%">

          </div>
          <div class="col-md-3">
            <img src="<?php echo site_url('assets/img/'.$profil->logo4) ?>" alt="" width="100%">

          </div>
        </div>
      </div>
      <div class="col-md-8 col-xs-8 text-center" style="font-size:200%">
        <strong><?php echo $profil->title ?></strong>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">

      </div>
      <div class="col-md-2">
        <i id="lamp0" class="material-icons">fiber_manual_record</i>
        <?php echo $sensors[0]->label ?>
      </div>
      <div class="col-md-2">
        <i id="lamp1" class="material-icons">fiber_manual_record</i>
        <?php echo $sensors[1]->label ?>
      </div>
      <div class="col-md-2">
        <i id="lamp2" class="material-icons">fiber_manual_record</i>
        <?php echo $sensors[2]->label ?>
      </div>
      <div class="col-md-2">
        <i id="lamp3" class="material-icons">fiber_manual_record</i>
        <?php echo $sensors[3]->label ?>
      </div>
      <div class="col-md-2">

      </div>
    </div>
    <div class="row" style="height:200px;background-color:#212121">

    </div>
    <div class="row">
      <div class="col-md-2">

      </div>
      <div class="col-md-2">
        <i id="lamp4" class="material-icons">fiber_manual_record</i>
        <?php echo $sensors[4]->label ?>
      </div>
      <div class="col-md-2">
        <i id="lamp5" class="material-icons">fiber_manual_record</i>
        <?php echo $sensors[5]->label ?>
      </div>
      <div class="col-md-2">
        <i id="lamp6" class="material-icons">fiber_manual_record</i>
        <?php echo $sensors[6]->label ?>
      </div>
      <div class="col-md-2">
        <i id="lamp7" class="material-icons">fiber_manual_record</i>
        <?php echo $sensors[7]->label ?>
      </div>
      <div class="col-md-2">

      </div>
    </div>
    <div class="row" style="margin:1em">
      <div class="col-md-12">
        <h3>LIVE SENSOR</h3>
        <table class="table" style="background-color:#fff">
          <tbody class="text-center">
            <tr>
              <td style="font-weight:bold">Sensor</td>
              <?php foreach ($sensors as $sensor): ?>
                <td> <a class="btn btn-info btn-block" href="#" data-toggle="modal" data-target="#exampleModal">

                  <?php echo $sensor->label ?></td>
                </a>
              <?php endforeach; ?>
            </tr>
            <tr>
              <td style="font-weight:bold">On/Off</td>
              <?php foreach ($sensors as $sensor): ?>
                <td><?php echo $sensor->status==1 ? 'On' : 'Off'?></td>
              <?php endforeach; ?>
            </tr>
            <tr>
              <td style="font-weight:bold">Pengukuran</td>
              <?php $i=0; foreach ($sensors as $sensor): ?>
                <td id="data<?php echo $i ?>">-</td>
              <?php $i++; endforeach; ?>
            </tr>
            <tr>
              <td style="font-weight:bold">Status</td>
              <?php $i=0; foreach ($sensors as $sensor): ?>
                <td id="status<?php echo $i ?>">-</td>
              <?php $i++; endforeach; ?>
            </tr>
          </tbody>
        </table>
      </div>
      <input id="threshold0" type="number" name="" value="">
      <input id="threshold1" type="number" name="" value="">
      <input id="threshold2" type="number" name="" value="">
      <input id="threshold3" type="number" name="" value="">
      <input id="threshold4" type="number" name="" value="">
      <input id="threshold5" type="number" name="" value="">
      <br>
      <div class="row">
        <!-- <div id="chartContainer" ></div> -->
      </div>
    </div>
  </div>
</body>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/canvasjs.min.js"></script>
<script src="<?php echo base_url();?>assets/js/core/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/core/popper.min.js"></script>
<!-- <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script> -->
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/js/core/bootstrap-material-design.min.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="<?php echo base_url();?>assets/js/plugins/bootstrap-notify.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="<?php echo base_url();?>assets/js/plugins/chartist.min.js"></script>
<!-- Plugin for Scrollbar documentation here: https://github.com/utatti/perfect-scrollbar -->
<script src="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Demo init -->
<script src="<?php echo base_url();?>assets/demo/demo.js"></script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="<?php echo base_url();?>assets/js/material-dashboard.js?v=2.1.0"></script>
<script src="<?php echo base_url();?>assets/js/sweetalert/sweetalert2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-tagsinput.js"></script>
<!-- END ROW -->
<?php $this->load->view($t_foot); ?>
<!-- END CONTAINER -->
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Disposisi Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
      </div>
    </div>
  </div>
</div>
