<!doctype html>
<html lang="en">
<head>
  <title>Selamat Datang di Mail Management</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/material-icon.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mail-org.css">
  <!-- fontawesome min -->

  <!-- Material Dashboard CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/material-dashboard.css?v=2.1.0">

</head>
<body>
  <div class="content">
    <div class="row justify-content-center">
      <div class="col-md-4" id="login-card">
        <div class="card card-profile">
          <div class="card-avatar">
            <img class="img" src="<?php echo base_url();?>assets/img/round_logo_bssn.png" />
          </div>
          <div class="card-body">
            <div class="title-app">
              <p class="h3">Badan Siber dan Sandi Negara</p>
              <p class="h4">Pusat pendidikan dan pelatihan</p>
              <p class="h4">Sistem Informasi Bagian Umum Pusdiklat BSSN</p>
            </div>
            <div class="card-description">
              <div id="response"></div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="text" class="form-control" name="username" id="usernameLogin" placeholder="Username Anda">
              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock</i>
                  </span>
                </div>
                <input type="password" class="form-control" name="password" id="passLogin" placeholder="Password Anda">
              </div>
              <br>
              <button class="btn btn-primary pull-right" id="login">
                Masuk
                <i class="material-icons">forward</i>
              </button>
            </div>
            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url();?>assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/core/bootstrap-material-design.min.js"></script>
  <!-- SweetAlert -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert/sweetalert2.min.css">
  <script src="<?php echo base_url();?>assets/js/sweetalert/sweetalert2.min.js"></script>
  <!-- SweetAlert -->
  <script type="text/javascript">
  $(document).ready(function(){
    $('#passLogin,#usernameLogin').on('keypress',function (e) {
      if (e.which == 13) {
        $('#login').trigger('click');
      }
    });

    $('#login').on('click',function(){
      var username = $('#usernameLogin').val();
      var password = $('#passLogin').val();
      document.getElementById('login').innerHTML = 'Verifikasi Data . . .';
      document.getElementById('login').setAttribute('disabled','true');
      dataSend = {
        username : username,
        password : password
      };
      $.ajax({
        type:"POST",
        url: "<?php echo base_url()?>user/penggunaMasuk",
        data: dataSend,
        datatype: 'json',
        success: function(data){
          if(data == 1){
            location.href = '<?php echo site_url('dashboard'); ?>';
          }else{
            document.getElementById('login').innerHTML = 'Masuk <i class="material-icons">forward</i>';
            document.getElementById('login').removeAttribute('disabled');
            document.getElementById('response').innerHTML = '<span class="text-danger">Username atau password anda salah!</span>';
          }
        }, error:function(error){
          console.log(error)
        }
      });
    });
  })
  // </script>
</body>
</html>
