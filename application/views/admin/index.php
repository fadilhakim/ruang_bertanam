<?php 
    $dt_css = array("css" => $css);
    $dt_js = array("js" => $js)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Admin - <?=$title?> | Ruang Bertanam </title>

    <?php $this->load->view("admin/sections/css",$dt_css) ?>

</head>
<body class="sidebar-dark">
	<div class="main-wrapper">
        <?php $this->load->view("admin/sections/sidebar") ?>
        <div class="page-wrapper">

                <?php $this->load->view("admin/sections/navbar")?>
                <?=$content?>
             <?php $this->load->view("admin/sections/footer")?>
        </div>

    </div>
    <?php $this->load->view("admin/sections/js",$dt_js) ?>

</body>
</html>
