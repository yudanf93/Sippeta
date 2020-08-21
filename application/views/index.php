<!-- slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url(); ?>frontend/assets/images/slider.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <?php
        if ($this->session->flashdata('notifikasi')) {
          echo "<br>";
          echo "<div class='alert alert-success alert-dismissible fade show'><center>";
          echo $this->session->flashdata('notifikasi');
          echo "</center><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button></div>";
        }
          ?>
        <h2 class="title-slider">SISTEM PELAYANAN PEMELIHARAAN DATA <br> DAN PENDAFTARAN TANAH</h2>
        <a href="#konten"><button type="button" class="btn btn-warning sippeta">Detail</button></a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url(); ?>frontend/assets/images/slider.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url(); ?>frontend/assets/images/slider.jpg" alt="Third slide">
    </div>
  </div>
</div>

<!-- konten -->
<section id="konten">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-5">
        <img class="img-fluid" src="<?php echo base_url(); ?>frontend/assets/images/kantor-sippeta.jpg" alt="SIP PETA">
      </div>
      <div class="col-lg-4 col-md-7">
        <h3 class="title-description">SISTEM PELAYANAN PEMELIHARAAN DATA DAN PENDAFTARAN TANAH</h3>
        <p class="description">Project based strategy of all focus areas to produce quality and reach your business target stay updated with the latest trends and digital news by reading our articles written by specialists in their industry.</p>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="fanspage">
          <h4 class="sidebar">Facebook</h4>
          <hr class="line-sidebar">
          <div class="table-responsive">
            <div class="fb-page" data-href="http://facebook.com/kantahkotasorongpapua" data-tabs="timeline" data-width="300" data-height="120" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="http://facebook.com/kantahkotasorongpapua" class="fb-xfbml-parse-ignore"><a href="https://facebook.com/kantahkotasorongpapua">Kantah Kota Sorong</a></blockquote></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>