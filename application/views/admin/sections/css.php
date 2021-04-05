<link rel="stylesheet" href="<?=base_url("admin_assets/vendors/core/core.css")?>">
<!-- endinject -->

<!-- plugin css for this page -->
<?php !isset($css) || empty($css) ? "" : $this->load->view($css)?>
<!-- end plugin css for this page -->

<!-- inject:css -->
<link rel="stylesheet" href="<?=base_url("admin_assets/fonts/feather-font/css/iconfont.css")?>">
<link rel="stylesheet" href="<?=base_url("admin_assets/vendors/flag-icon-css/css/flag-icon.min.css")?>">
<link rel="stylesheet" href="<?=base_url("admin_assets/vendors/select2/select2.min.css")?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- endinject -->

<!-- Layout styles -->
<link rel="stylesheet" href="<?=base_url("admin_assets/css/demo_1/style.css")?>">
<!-- End layout styles -->

<link rel="icon" type="image/png" href="<?=base_url("assets/images/ruang_bertanam.png")?>"/>
<style>

    .card-header-title {
        width:80%;
        float:left;
    }

    .card-tools {
        display:inline;
        width:20%;
        float:"right"
    }

    .name {
      text-align: right;
      min-width:150px;
    }
</style>
