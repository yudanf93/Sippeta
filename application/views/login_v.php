<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link id="favicon" rel="shortcut icon" href="https://sevenpion.net/portofolio/sippeta/assets/images/logo.png" type="image/png" />

  <title>  Login SIP PETA </title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="https://getbootstrap.com/docs/4.1/examples/floating-labels/floating-labels.css" rel="stylesheet">
</head>
<body>
   
    <form action="<?php echo site_url('login') ?>" method="post" class="form-signin">
        <div class="text-center mb-4">
          <img src="<?php echo base_url('assets/images/favicon.png')?>" alt="logo" class="rounded-circle coba mb-2" width="60%">
          
          <h1 class="h3 mb-3 font-weight-normal">Login SIP Peta</h1>
          <?php
          if ($this->session->flashdata('notifikasi')) {
            echo "<br>";
            echo "<div class='alert'><center>";
            echo $this->session->flashdata('notifikasi');
            echo "</center></div>";
        } 
        ?>
    </div>   

    <div class="form-label-group">
      <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus name="email_user">
      <label for="inputEmail">Email</label>
  </div>

  <div class="form-label-group">
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="passsword_user">
      <label for="inputPassword">Password</label>
  </div>    

  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p> -->
</form>


</body>  
</html>   