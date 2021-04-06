<?php
    $dt_css = array("css" => $css);
    $dt_js = array("js" => $js)

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Ruang Bertanam - Decorative Plants Informations Care</title>
<link rel="shortcut icon" href="<?=base_url("assets/images/ruang_bertanam.png")?>" />

 <?php $this->load->view($css,$dt_css) ?>

</head>

<body>
<div id="main-wrapper">

  <!-- Top Toolbar -->
  <div class="toolbar">
    <div class="uou-block-1a blog">
      <div class="container">
        <a href="#" class="email-us">
          Email Us : planting.ruang_bertanam@gmail.com
        </a>
        <ul class="social">
          <li>
            <a href="#">
              <img src="<?=base_url("assets/images/icons/instagram.png")?>" alt="">
              <p>@ruang_bertanam</p>
            </a>

          </li>
          <li></li>
        </ul>
        <!-- <ul class="authentication">
          <li><a href="#">Login</a></li>
          <li><a href="#">Register</a></li>
        </ul> -->
      </div>
    </div>
    <!-- end .uou-block-1a -->
  </div>
  <!-- end toolbar -->

  <div class="box-shadow-for-ui">
    <div class="uou-block-2b">
      <div class="container">
        <a href="#" class="logo">
          <img src="<?=base_url("assets/images/Ruang-Bertanam-logo-Web.png")?>" alt="Logo Ruang Bertanam">
        </a>
        <a href="#" class="mobile-sidebar-button mobile-sidebar-toggle">
          <span></span>
        </a>
        <style media="screen">
           .asu {
             color: #000;
           }
        </style>
        <nav class="nav">
          <ul class="sf-menu">
            <li>
              <a href="<?= base_url('home') ?>">
                Home
              </a>
            </li>
            <li>
              <a href="<?= base_url('tentang-kami') ?>">
                About Us
              </a>
            </li>
            <li>
              <a href="<?= base_url('plant-library') ?>">Plant Library</a>
            </li>

          </ul>
        </nav>
      </div>
    </div>
    <!-- end .uou-block-2b -->
  </div>

  <?php // ====================== CONTENT GOES HERE ================== ?>
  <?=$content?>
  <?php // ====================== END CONTENT ======================== ?>
</div>

<!-- Footer -->

<footer>

    <div class="fotop">
      <div class="container">

      </div>
    </div>
    <div class="container">
      <div class="fobtm row">
        <div class="col-md-12 cl-md-ipad-12 col-lg-6 col-xl-12 order-mobile-cp">
          <p>Copyright © 2019 Ruang Bertanam All Rights Reserved</p>
        </div>
      </div>
    </div>


</footer>

<!-- end footer -->
<?php $this->load->view($js,$dt_js) ?>

</body>
</html>
