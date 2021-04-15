<?php 
    $dt_css = array("css" => $css);
    $dt_js = array("js" => $js)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <?php $this->load->view("admin/sections/css",$dt_css) ?>
</head>
<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <?=$content?>
        </div>
    </div>
    <?php $this->load->view("admin/sections/js",$dt_js) ?>
</body>
</html>

