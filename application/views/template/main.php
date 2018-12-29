<!doctype html>
<html lang="en">
<head>
  <title><?= $page_name?> - Pusdiklat BSSN</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <?php $this->load->view('template/header') ?>
</head>
<body>
  <?php $this->load->view('template/sidebar') ?>
  <!-- content -->
  <?php $this->load->view($content) ?>
  <img src="<?php echo base_url()?>assets/img/round_logo_bssn.png" alt="" class="dashboard-img">
  <!-- content -->
</div>
</div>
<!-- footer -->
<?php $this->load->view('template/footer') ?>
<!-- footer -->

<?php $this->load->view($t_foot); ?>
</body>
</html>
